<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\UserAddress;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * 创建订单
     *
     * @param \App\Http\Requests\OrderRequest $request
     * @param \App\Services\OrderService      $orderService
     * @return mixed
     */
    public function store(OrderRequest $request, OrderService $orderService)
    {
        $user = $request->user();
        $address = UserAddress::find($request->input('address_id'));

        return $orderService->store($user, $address, $request->input('remark'), $request->input('items'));
    }

    /**
     * 列表页
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $orders = Order::query()// 使用 with 方法预加载，避免 N + 1 问题
                       ->with(['items.product', 'items.productSku'])
                       ->where('user_id', $request->user()->id)
                       ->orderBy('created_at', 'desc')
                       ->paginate();

        return view('orders.index', ['orders' => $orders]);
    }

    public function show(Order $order, Request $request)
    {
        $this->authorize('own', $order);

        return view('orders.show', [
            'order' => $order->load([
                'items.productSku',
                'items.product',
            ]),
        ]);
    }
}
