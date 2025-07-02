<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddToOrderRequest;
use App\Http\Requests\ChangeOrderStatusRequest;
use App\Http\Requests\сhangeOrderStatusRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class OrderController extends Controller
{
    public function getOrderPage(): Factory|View|Application
    {
        $orders = Order::all();
        return view('order.index', ['orders' => $orders]);
    }

    public function getAddToOrderPage(Request $request): Factory|View|Application
    {
        $product = Product::withTrashed()
            ->where('id', $request->get('product_id'))
            ->first();

        return view('order.add_to_order', ['product' => $product]);
    }

    public function getInfoOrderPage(Request $request): Factory|View|Application
    {
        $order = Order::where('id', $request->get('order_id'))
            ->with([
                'product' => function ($query) {
                    $query->withTrashed();
                }
            ])
            ->first();
        return view('order.info', ['order' => $order]);
    }

    public function addToOrder(AddToOrderRequest $request): Redirector|Application|RedirectResponse
    {
        try {
            $product_price = Product::where('id', $request->get('product_id'))
                ->pluck('price')
                ->first();

            Order::create([
                'product_id' => $request->get('product_id'),
                'customer_full_name' => $request->get('customer_full_name'),
                'customer_comment' => $request->get('customer_comment'),
                'product_count' => $request->get('product_count'),
                'total_price' => $product_price * $request->get('product_count')
            ]);

            return redirect('/')->with('success', 'Заказ успешно создан!');
        } catch (\Throwable $th) {
            return redirect('/')->with('error', 'Не удалось создать заказ');
        }
    }

    public function changeStatus(ChangeOrderStatusRequest $request): Redirector|Application|RedirectResponse
    {
        try {
            $order = Order::find($request->get('id'));
            $order->update([
                'status' => 'Выполнен'
            ]);
            $order->save();

            return redirect('/order')->with('success', "Заказ № $order->id выполнен");
        } catch (\Throwable $th) {
            return redirect('/order')->with('error', 'Не удалось выполнить заказ');
        }
    }
}
