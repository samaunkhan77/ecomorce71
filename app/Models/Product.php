<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'brand_id',
        'user_id',
        'product_name',
        'short_description',
        'long_description',
        'product_price',
        'product_discount',
        'product_selling_price',
        'product_quantity',
        'product_thumbnail',
        'product_image_1',
        'product_image_2',
        'product_image_3',
        'product_image_4',
        'product_image_5',
        'product_status',
        'product_view_count',
        'product_slug',
        'product_code',
        'product_weight',
        'product_availability',
        'sale_category_id',
        'sub_category_id',
    ];

    protected $attributes = [
        'product_status' => 'Pending',
        'product_view_count' => '0',
        'product_availability' => 'InStock',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class , 'brand_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function saleCategory()
    {
        return $this->belongsTo(SaleCategory::class, 'sale_category_id', 'id');
    }

}
