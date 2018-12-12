<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use App\Http\Service\ProductsService;
use App\Models\Product;
use App\Exceptions\InvalidRequestException;

class ProductsController extends Controller
{
    /**
     * @param \App\Http\Requests\Request        $request
     * @param \App\Http\Service\ProductsService $productsService
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request, ProductsService $productsService)
    {
        list('products' => $products, 'search' => $search, 'order' => $order) = $productsService->index($request);

        return view('products.index', [
            'products' => $products,
            'filters'  => [
                'search' => $search,
                'order'  => $order,
            ],
        ]);
    }

    /**
     * @param \App\Models\Product        $product
     * @param \App\Http\Requests\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \App\Exceptions\InvalidRequestException
     */
    public function show(Product $product, Request $request)
    {
        // 判断商品是否已下架，如果没有上架则抛出异常
        if (!$product->on_sale) {
            throw new InvalidRequestException('商品未上架');
        }

        $favored = false;
        // 用户未登录时返回 null，已登陆时返回的对象是对应的用户对象
        if ($user = $request->user()) {
            // 从当前用户已收藏的商品中搜索 ID 为当前商品 id 的商品
            // boolval() 函数用于把值转化为布尔值
            $favored = boolval($user->favoriteProducts()->find($product->id));
        }

        return view('products.show', ['product' => $product, 'favored' => $favored]);
    }

    /**
     * 收藏
     * @param \App\Models\Product        $product
     * @param \App\Http\Requests\Request $request
     * @return array
     */
    public function favor(Product $product, Request $request)
    {
        $user = $request->user();
        if ($user->favoriteProducts()->find($product->id)) {
            return [];
        }
        $user->favoriteProducts()->attach($product);

        return [];
    }

    /**
     * @param \App\Models\Product        $product
     * @param \App\Http\Requests\Request $request
     * @return array
     */
    public function disfavor(Product $product, Request $request)
    {
        $user = $request->user();
        $user->favoriteProducts()->detach($product);

        return [];
    }
}
