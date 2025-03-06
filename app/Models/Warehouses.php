<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Warehouses extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'warehouses';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'warehouse_name', 'warehouse_address', 'warehouse_status'
    ];
    public function warehouseProduct()
    {
        return $this->hasMany('App\Models\Products', 'product_warehouse', 'id');
    }
    public function warehouseTransaction()
    {
        return $this->hasMany('App\Models\Transactions', 'transaction_warehouse', 'id');
    }
}
