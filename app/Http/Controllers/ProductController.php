<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProductPage(): Factory|View|Application
    {
        $products = Product::all();

        $categories = Category::all();

        return view('product.index', ['products' => $products], ['categories' => $categories]);
    }

    public function getProductUpdatePage()
    {

    }

    /**
     * @throws \Throwable
     */
    public function addProduct(Request $request)
    {
        try {
            Product::create([
                'name' => $request->get('name'),
                'price' => $request->get('price'),
                'category_id' => $request->get('category_id'),
                'description' => $request->get('description'),
            ]);

            return redirect('/')->with('success', 'Товар успешно добавлен!');
        } catch (\Throwable $th) {
            return redirect('/')->with('error', 'Не удалось добавить товар');
        }
    }

    public function updateProduct()
    {

    }

    public function deleteProduct()
    {

    }
}
