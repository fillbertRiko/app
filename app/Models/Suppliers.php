<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Suppliers extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'suppliers';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'supplier_name', 'supplier_email', 'supplier_phone', 'supplier_address', 'supplier_status'
    ];
    public function supplierProduct()
    {
        return $this->hasMany('App\Models\Products', 'product_supplier', 'id');
    }
    public function supplierTransaction()
    {
        return $this->hasMany('App\Models\Transactions', 'transaction_supplier', 'id');
    }
}
