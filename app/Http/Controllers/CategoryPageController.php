<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryPageController extends Controller
{
    public function index(Request $request, $categoryId = null)
    {
        return $this->renderCategoryPage('category-pages.left-sidebar', $categoryId);
    }

    public function rightSidebar(Request $request, $categoryId = null)
    {
        return $this->renderCategoryPage('category-pages.right-sidebar', $categoryId);
    }

    public function noSidebar(Request $request, $categoryId = null)
    {
        return $this->renderCategoryPage('category-pages.no-sidebar', $categoryId);
    }

    public function threeColumn(Request $request, $categoryId = null)
    {
        return $this->renderCategoryPage('category-pages.three-column', $categoryId);
    }

    public function fourColumn(Request $request, $categoryId = null)
    {
        return $this->renderCategoryPage('category-pages.four-column', $categoryId);
    }

    private function renderCategoryPage(string $view, $categoryId = null)
    {
        $categories = Category::withCount([
            'products' => function ($query) {
                $query->where('is_active', true);
            },
        ])->orderBy('name')->get();

        $selectedCategory = null;

        $query = Product::query()
            ->where('is_active', true)
            ->with('category');

        if ($categoryId) {
            $selectedCategory = Category::findOrFail($categoryId);
            $query->where('category_id', $selectedCategory->id);
        }

        $products = $query
            ->orderByDesc('created_at')
            ->paginate(12)
            ->withQueryString();

        return view($view, compact('categories', 'products', 'selectedCategory'));
    }
}
