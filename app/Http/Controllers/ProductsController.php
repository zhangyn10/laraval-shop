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

    public function show(Product $product, Request $request)
    {
        // 判断商品是否已下架，如果没有上架则抛出异常
        if (!$product->on_sale) {
            throw new InvalidRequestException('商品未上架');
        }

        return view('products.show', ['product' => $product]);
    }
}
