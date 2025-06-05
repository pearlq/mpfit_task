<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class ProductController extends Controller
{
    public function getProductPage(): Factory|View|Application
    {
        $products = Product::all();
        $categories = Category::all();

        return view('product.index', ['products' => $products], ['categories' => $categories]);
    }

    public function getEditProductPage(Request $request): Factory|View|Application
    {
        $product = Product::where('id', $request->get('id'))->first();
        $categories = Category::all();

        return view('product.edit', ['product' => $product], ['categories' => $categories]);
    }

    public function getInfoProductPage(Request $request): Factory|View|Application
    {
        $product = Product::where('id', $request->get('id'))->first();

        return view('product.info', ['product' => $product]);
    }

    public function addProduct(AddProductRequest $request): Redirector|Application|RedirectResponse
    {
        try {
            $product = Product::withTrashed()
                ->where('name', $request->get('name'))
                ->first();

            if ($product and $product->trashed()) {
                $product->restore();
                $product->update([
                    'category_id' => $request->get('category_id'),
                    'price' => $request->get('price'),
                    'description' => $request->get('description'),
                ]);
                $product->save();

            } else {
                Product::create([
                    'name' => $request->get('name'),
                    'price' => $request->get('price'),
                    'category_id' => $request->get('category_id'),
                    'description' => $request->get('description'),
                ]);

            }
            return redirect('/')->with('success', 'Товар успешно добавлен!');
        } catch (\Throwable $th) {
            return redirect('/')->with('error', 'Не удалось добавить товар');
        }
    }

    public
    function editProduct(Request $request): Redirector|Application|RedirectResponse
    {
        try {
            $product = Product::find($request->get('id'));
            $product->update([
                'name' => $request->get('name'),
                'price' => $request->get('price'),
                'category_id' => $request->get('category_id'),
                'description' => $request->get('description'),
            ]);
            $product->save();

            return redirect('/')->with('success', 'Товар успешно обновлен!');
        } catch (\Throwable $th) {
            return redirect('/')->with('error', 'Не удалось обновить товар');
        }
    }

    public
    function deleteProduct(Request $request)
    {
        try {
            $product = Product::find($request->get('id'));
            $product->delete();

            return redirect('/')->with('success', 'Товар успешно удален!');
        } catch (\Throwable $th) {
            return redirect('/')->with('error', 'Не удалось удалить товар');
        }
    }
}
