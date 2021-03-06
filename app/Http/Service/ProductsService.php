<?php
/**
 * Created by PhpStorm.
 * User: zhangyanan
 * Date: 2018/12/11
 * Time: 9:07 PM
 */

namespace App\Http\Service;

use App\Http\Requests\Request;
use App\Models\Product;

class ProductsService extends BaseService
{
    public function index(Request $request)
    {
        // 创建一个查询构造器
        $builder = Product::query()->where('on_sale', true);
        // 判断是否有提交search参数，如果有就赋值给 $search 变量
        // search 用来模糊搜索商品
        if ($search = $request->input('search', '')) {
            $like = '%' . $search . '%';
            // 模糊搜索商品标题、商品详情、SKU 标题、SKU 描述
            $builder->where(function ($query) use ($like) {
                $query->where('title', 'like', $like)
                      ->orWhere('description', 'like', $like)
                      ->orWhereHas('skus', function ($query) use ($like) {
                          $query->where('title', 'like', $like)
                                ->orWhere('description', 'like', $like);
                      });
            });
        }

        // 是否有提交 order 参数
        if ($order = $request->input('order', '')) {
            // 是否以 _asc 或者 _desc 结尾
            if (preg_match('/^(.+)_(asc|desc)$/', $order, $m)) {
                // 如果字符串的开头是这 3 个字符串之一，说明是一个合法的排序值
                if (in_array($m[1], ['price', 'sold_count', 'rating'])) {
                    //  根据传入的排序值来构造排序函数
                    $builder->orderBy($m[1], $m[2]);
                }
            }
        }
        $products = $builder->paginate(16);

        return compact('products', 'search', 'order');
    }
}
