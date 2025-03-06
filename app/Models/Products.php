<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Products extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_name', 'product_description', 'product_price', 'product_quantity', 'product_image', 'product_category', 'product_status'
    ];
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'product_category', 'id');
    }
    public function order()
    {
        return $this->hasMany('App\Models\Order', 'order_product', 'id');
    }
    public function orderDetail()
    {
        return $this->hasMany('App\Models\OrderDetail', 'order_detail_product', 'id');
    }
    public function productImage()
    {
        return $this->hasMany('App\Models\ProductImage', 'product_image_product', 'id');
    }
    public function productReview()
    {
        return $this->hasMany('App\Models\ProductReview', 'product_review_product', 'id');
    }
    public function productWishlist()
    {
        return $this->hasMany('App\Models\ProductWishlist', 'product_wishlist_product', 'id');
    }
    public function productCart()
    {
        return $this->hasMany('App\Models\ProductCart', 'product_cart_product', 'id');
    }
}
