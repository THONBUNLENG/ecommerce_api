<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query()->with('category');

        if ($request->boolean('trashed')) {
            $query->onlyTrashed();
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
        $stats = [
            'total' => Product::count(),
            'active' => Product::where('is_active', true)->count(),
            'inactive' => Product::where('is_active', false)->count(),
            'trashed' => Product::onlyTrashed()->count(),
            'low_stock' => Product::where('stock_quantity', '<', 10)->where('stock_status', '!=', 'out_of_stock')->count(),
        ];

        return view('admin.products.index', compact('products', 'categories', 'stats'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'nullable|string|max:100|unique:products,sku',
            'description' => 'nullable|string|max:500',
            'long_description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'original_price' => 'nullable|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'stock_status' => 'required|in:in_stock,out_of_stock,on_backorder',
            'category_id' => 'required|exists:categories,id',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_active' => 'boolean',
            'is_popular' => 'boolean',
            'is_latest_drop' => 'boolean',
            'meta_title' => 'nullable|string|max:60',
            'meta_description' => 'nullable|string|max:160',
        ]);

        if ($request->hasFile('image_url')) {
            $validated['image_url'] = $request->file('image_url')->store('products', 'public');
        }

        $validated['slug'] = Str::slug($validated['name']);
        $validated['user_id'] = auth()->id();
        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['is_popular'] = $request->boolean('is_popular', false);
        $validated['is_latest_drop'] = $request->boolean('is_latest_drop', false);

        Product::create($validated);

        return redirect()->route('panel.products.index')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return response()->json($product);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'nullable|string|max:100|unique:products,sku,' . $product->id,
            'description' => 'nullable|string|max:500',
            'long_description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'original_price' => 'nullable|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'stock_status' => 'required|in:in_stock,out_of_stock,on_backorder',
            'category_id' => 'required|exists:categories,id',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_active' => 'boolean',
            'is_popular' => 'boolean',
            'is_latest_drop' => 'boolean',
            'meta_title' => 'nullable|string|max:60',
            'meta_description' => 'nullable|string|max:160',
        ]);

        if ($request->hasFile('image_url')) {
            if ($product->image_url) {
                Storage::disk('public')->delete($product->image_url);
            }
            $validated['image_url'] = $request->file('image_url')->store('products', 'public');
        }

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->boolean('is_active', $product->is_active);
        $validated['is_popular'] = $request->boolean('is_popular', $product->is_popular);
        $validated['is_latest_drop'] = $request->boolean('is_latest_drop', $product->is_latest_drop);

        $product->update($validated);

        return redirect()->route('panel.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $productName = $product->name;
        $product->delete();

        return redirect()->route('panel.products.index')->with('success', "Product '{$productName}' has been moved to trash.");
    }

    public function bulkDeactivate(Request $request)
    {
        $ids = $request->input('ids', []);
        Product::whereIn('id', $ids)->update(['is_active' => false]);

        return redirect()->route('panel.products.index')->with('success', count($ids) . ' product(s) deactivated.');
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids', []);
        $count = Product::whereIn('id', $ids)->count();
        Product::whereIn('id', $ids)->delete();

        return redirect()->route('panel.products.index')->with('success', $count . ' product(s) moved to trash.');
    }

    public function bulkRestore(Request $request)
    {
        $ids = $request->input('ids', []);
        $count = Product::onlyTrashed()->whereIn('id', $ids)->count();
        Product::onlyTrashed()->whereIn('id', $ids)->restore();

        return redirect()->route('panel.products.index')->with('success', $count . ' product(s) restored.');
    }

    public function bulkForceDelete(Request $request)
    {
        $ids = $request->input('ids', []);
        $count = 0;
        foreach (Product::onlyTrashed()->whereIn('id', $ids)->get() as $product) {
            if ($product->image_url) {
                Storage::disk('public')->delete($product->image_url);
            }
            $product->forceDelete();
            $count++;
        }

        return redirect()->route('panel.products.index', ['trashed' => 1])->with('success', $count . ' product(s) permanently deleted.');
    }

    public function forceDelete($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $productName = $product->name;
        if ($product->image_url) {
            Storage::disk('public')->delete($product->image_url);
        }
        $product->forceDelete();

        return redirect()->route('panel.products.index')->with('success', "Product '{$productName}' permanently deleted.");
    }

    public function restore($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $productName = $product->name;
        $product->restore();

        return redirect()->route('panel.products.index')->with('success', "Product '{$productName}' restored successfully.");
    }

    public function toggleActive($id)
    {
        $product = Product::findOrFail($id);
        $product->update(['is_active' => !$product->is_active]);

        return response()->json(['success' => true, 'is_active' => $product->is_active]);
    }
}
