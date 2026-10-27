<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ShopCatalog extends Component
{
    use WithPagination;

    #[Url(as: 'q', except: '')]
    public string $search = '';

    #[Url(except: '')]
    public string $categoryId = '';

    #[Url(except: 'newest')]
    public string $sort = 'newest';

    public string $minPrice = '';

    public string $maxPrice = '';

    protected string $priceColumn;

    public function boot(): void
    {
        // Keep the catalog usable before the additive base_price migration is applied.
        $this->priceColumn = Schema::hasColumn('products', 'base_price') ? 'base_price' : 'price';
    }

    public function updated(string $property): void
    {
        if (in_array($property, ['search', 'categoryId', 'sort', 'minPrice', 'maxPrice'], true)) {
            $this->resetPage();
        }
    }

    public function clearFilters(): void
    {
        $this->reset(['search', 'categoryId', 'sort', 'minPrice', 'maxPrice']);
        $this->sort = 'newest';
        $this->resetPage();
    }

    public function render()
    {
        $priceColumn = $this->priceColumn;

        $products = Product::query()
            ->where('is_active', true)
            ->with([
                'category',
                'images' => fn ($query) => $query->orderBy('sort_order'),
            ])
            ->when($this->categoryId !== '', fn (Builder $query) =>
                $query->where('category_id', $this->categoryId))
            ->when($this->search !== '', function (Builder $query): void {
                $search = trim($this->search);

                $query->where(function (Builder $query) use ($search): void {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('manufacturer', 'like', "%{$search}%")
                        ->orWhereHas('category', fn (Builder $categoryQuery) =>
                            $categoryQuery->where('name', 'like', "%{$search}%"));
                });
            })
            ->when(is_numeric($this->minPrice), fn (Builder $query) =>
                $query->where($priceColumn, '>=', (float) $this->minPrice))
            ->when(is_numeric($this->maxPrice), fn (Builder $query) =>
                $query->where($priceColumn, '<=', (float) $this->maxPrice));

        match ($this->sort) {
            'price_asc' => $products->orderBy($priceColumn),
            'price_desc' => $products->orderByDesc($priceColumn),
            default => $products->latest(),
        };

        return view('livewire.shop-catalog', [
            'categories' => Category::query()
                ->withCount(['products' => fn (Builder $query) => $query->where('is_active', true)])
                ->when(Schema::hasColumn('categories', 'sort_order'), fn (Builder $query) =>
                    $query->orderBy('sort_order'))
                ->orderBy('name')
                ->get(),
            'products' => $products->paginate(12),
        ]);
    }
}
