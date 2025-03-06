<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Unit_of_measurements extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'unit_of_measurements';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'unit_name', 'unit_description', 'unit_status'
    ];
    public function unitProduct()
    {
        return $this->hasMany('App\Models\Products', 'product_unit', 'id');
    }
    public function unitTransaction()
    {
        return $this->hasMany('App\Models\Transactions', 'transaction_unit', 'id');
    }
}
