<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Materials extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'materials';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'material_name', 'material_description', 'material_price', 'material_quantity', 'material_image', 'material_category', 'material_status'
    ];
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'material_category', 'id');
    }
    public function order()
    {
        return $this->hasMany('App\Models\Order', 'order_material', 'id');
    }
    public function orderDetail()
    {
        return $this->hasMany('App\Models\OrderDetail', 'order_detail_material', 'id');
    }
    public function materialImage()
    {
        return $this->hasMany('App\Models\MaterialImage', 'material_image_material', 'id');
    }
    public function materialReview()
    {
        return $this->hasMany('App\Models\MaterialReview', 'material_review_material', 'id');
    }
    public function materialWishlist()
    {
        return $this->hasMany('App\Models\MaterialWishlist', 'material_wishlist_material', 'id');
    }
    public function materialCart()
    {
        return $this->hasMany('App\Models\MaterialCart', 'material_cart_material', 'id');
    }   
}
