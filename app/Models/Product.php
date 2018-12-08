<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class Product
 *
 * @package App\Models
 */
class Product extends Model
{

    protected $fillable = [
        'title',
        'description',
        'image',
        'on_sale',
        'rating',
        'sold_count',
        'review_count',
        'price',
    ];

    protected $casts = [
        'on_sale' => 'boolean',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function skus()
    {
        return $this->hasMany(ProductSku::class);
    }

    public function getImageUrlAttribute()
    {
        // 如果image已经是完整链接，则直接返回
        if (Str::startsWith($this->attributes['image'], ['https://', 'http://'])) {
            return $this->attributes['image'];
        }

        return \Storage::disk('public')->url($this->attributes['image']);
    }
}
