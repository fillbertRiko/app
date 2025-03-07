<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Customers extends Model
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'CustomerID', 'CustomerName', 'Phone', 'Address',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'CustomerID', 'CustomerName', 'Phone', 'Address',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'CustomerID' => 'integer',
        'CustomerName' => 'string',
        'Phone' => 'string',
        'Address' => 'string',
    ];
}
