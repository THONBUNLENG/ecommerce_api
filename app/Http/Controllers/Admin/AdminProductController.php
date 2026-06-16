<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query()->with(['category', 'images']);

        if ($request->boolean('trashed')) {
            $query->onlyTrashed();
        }

        if ($request->boolean('incomplete')) {
            $query->where(function ($q) {
                $q->where('is_active', false)
                    ->orWhereNull('price')
                    ->orWhere('stock_quantity', '<', 1);
            });
        }

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('sku', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($categoryId = $request->input('category_id')) {
            $query->where('category_id', $categoryId);
        }

        if ($stockStatus = $request->input('stock_status')) {
            $query->where('stock_status', $stockStatus);
        }

        if ($request->boolean('active_only')) {
            $query->where('is_active', true);
        } elseif ($request->boolean('inactive_only')) {
            $query->where('is_active', false);
        }

        $products = $query->orderByDesc('created_at')->paginate(15)->appends($request->query());

        $categories = Category::orderBy('name')->get();
        $colors = Color::orderBy('name')->get();
        $sizes = Size::orderBy('name')->get();

        $stats = [
            'total' => Product::count(),
            'active' => Product::where('is_active', true)->count(),
            'inactive' => Product::where('is_active', false)->count(),
            'trashed' => Product::onlyTrashed()->count(),
            'low_stock' => Product::where('stock_quantity', '<', 10)->where('stock_status', '!=', 'out_of_stock')->count(),
            'incomplete' => Product::where('is_active', false)
                ->orWhereNull('price')
                ->orWhere('stock_quantity', '<', 1)
                ->count(),
        ];

        return view('admin.products.index', compact('products', 'categories', 'colors', 'sizes', 'stats'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'nullable|string|max:100|unique:products,sku',
            'category_id' => 'required|exists:categories,id',
            'manufacturer' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'original_price' => 'nullable|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'dim_l' => 'nullable|numeric|min:0',
            'dim_w' => 'nullable|numeric|min:0',
            'dim_h' => 'nullable|numeric|min:0',
            'weight' => 'nullable|numeric|min:0',
            'stock_status' => 'nullable|string',
            'description' => 'nullable|string|max:500',
            'long_description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:60',
            'meta_description' => 'nullable|string|max:160',
            'extended_specs' => 'nullable|string',
            'images' => 'nullable|array|max:4',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'exemptions' => 'nullable|array',
            'sizes' => 'nullable|array',
            'sizes.*' => 'string',
            'waist_sizes' => 'nullable|array',
            'waist_sizes.*' => 'numeric',
            'colors' => 'nullable|array',
            'colors.*' => 'string',
            'is_popular' => 'boolean',
            'is_latest_drop' => 'boolean',
            'tier_qty' => 'nullable|array',
            'tier_price' => 'nullable|array',
        ]);
        $validated['stock_status'] = $request->input('stock_quantity') > 0 ? 'in_stock' : 'out_of_stock';

        $productData = [
            'name' => $validated['name'],
            'slug' => $this->generateUniqueSlug($validated['name']),
            'sku' => $validated['sku'],
            'description' => $validated['description'],
            'long_description' => $validated['long_description'],
            'price' => $validated['price'],
            'original_price' => $validated['original_price'],
            'discount_price' => $validated['discount_price'],
            'category_id' => $validated['category_id'],
            'stock_quantity' => $validated['stock_quantity'],
            'stock_status' => $validated['stock_quantity'] > 0 ? 'in_stock' : 'out_of_stock',
            'user_id' => auth()->id(),
            'is_popular' => $request->boolean('is_popular', false),
            'is_latest_drop' => $request->boolean('is_latest_drop', false),
            'is_active' => $request->boolean('is_active', true),
            'meta_title' => $validated['meta_title'],
            'meta_description' => $validated['meta_description'],
            'sizes' => $validated['sizes'] ?? [],
            'colors' => $validated['colors'] ?? [],
        ];

        $product = Product::create($productData);
        if ($request->hasFile('images')) {
            $firstPath = null;
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('products', 'public');
                if ($index === 0) {
                    $firstPath = $path;
                }

                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                    'is_primary' => $index === 0,
                    'sort_order' => $index,
                ]);
            }

            if ($firstPath) {
                $product->update(['image_url' => $firstPath]);
            }
        }

        return redirect()->route('panel.products.index')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        // UI uses AJAX engine to pull data object for the Side-drawer mapping context
        $product = Product::with(['category', 'images'])->findOrFail($id);
        $images = $product->images()->orderBy('sort_order')->get();

        $response = $product->toArray();
        $response['images_count'] = $images->count();
        $response['images_meta_string'] = $images->map(fn ($img) => basename($img->image_path))->join(', ');

        // Ensure explicit structure synchronization with Blade Form Field mappings
        $response['is_active'] = (bool) $product->is_active;
        $response['is_featured'] = (bool) $product->is_featured;
        $response['free_shipping'] = (bool) $product->free_shipping;
        $response['b2b_only'] = (bool) $product->b2b_only;
        $response['pre_order'] = (bool) $product->pre_order;

        return response()->json($response);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'nullable|string|max:100|unique:products,sku,' . $product->id,
            'category_id' => 'required|exists:categories,id',
            'manufacturer' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'original_price' => 'nullable|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'dim_l' => 'nullable|numeric|min:0',
            'dim_w' => 'nullable|numeric|min:0',
            'dim_h' => 'nullable|numeric|min:0',
            'weight' => 'nullable|numeric|min:0',
            'stock_status' => 'nullable|string',
            'description' => 'nullable|string|max:500',
            'long_description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:60',
            'meta_description' => 'nullable|string|max:160',
            'extended_specs' => 'nullable|string',
            'images' => 'nullable|array|max:4',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',

            'exemptions' => 'nullable|array',
            'sizes' => 'nullable|array',
            'sizes.*' => 'string',
            'waist_sizes' => 'nullable|array',
            'waist_sizes.*' => 'numeric',
            'colors' => 'nullable|array',
            'colors.*' => 'string',
            'is_popular' => 'boolean',
            'is_latest_drop' => 'boolean',
            'tier_qty' => 'nullable|array',
            'tier_price' => 'nullable|array',
        ]);

        $validated['stock_status'] = $request->input('stock_quantity') > 0 ? 'in_stock' : 'out_of_stock';

        $productData = [
            'name' => $validated['name'],
            'slug' => $this->generateUniqueSlug($validated['name'], $product->id),
            'sku' => $validated['sku'],
            'description' => $validated['description'],
            'long_description' => $validated['long_description'],
            'price' => $validated['price'],
            'original_price' => $validated['original_price'],
            'discount_price' => $validated['discount_price'],
            'category_id' => $validated['category_id'],
            'stock_quantity' => $validated['stock_quantity'],
            'stock_status' => $validated['stock_quantity'] > 0 ? 'in_stock' : 'out_of_stock',
            'is_popular' => $request->boolean('is_popular', $product->is_popular),
            'is_latest_drop' => $request->boolean('is_latest_drop', $product->is_latest_drop),
            'is_active' => $request->boolean('is_active', $product->is_active),
            'meta_title' => $validated['meta_title'],
            'meta_description' => $validated['meta_description'],
            'sizes' => $validated['sizes'] ?? [],
            'colors' => $validated['colors'] ?? [],
        ];

        $product->update($productData);

        if ($request->hasFile('images')) {
            $existingPrimary = $product->images()->where('is_primary', true)->first();
            $maxSort = $product->images()->max('sort_order') ?? -1;
            $firstPath = null;

            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('products', 'public');
                $sortOrder = $maxSort + $index + 1;

                if ($index === 0 && !$existingPrimary) {
                    $firstPath = $path;
                }

                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                    'is_primary' => !$existingPrimary && $index === 0,
                    'sort_order' => $sortOrder,
                ]);
            }

            if ($firstPath) {
                $product->update(['image_url' => $firstPath]);
            }
        }

        return redirect()->route('panel.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $productName = $product->name;
        $product->delete();

        return redirect()->route('panel.products.index')->with('success', "Product '{$productName}' has been moved to trash.");
    }

    public function toggleActive($id)
    {
        $product = Product::findOrFail($id);
        $product->update(['is_active' => !$product->is_active]);
        return response()->json(['success' => true, 'is_active' => $product->is_active]);
    }

    protected function generateUniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $count = 1;

        while (Product::withTrashed()->where('slug', $slug)->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }
}
