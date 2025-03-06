<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Import_invoices_details extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $filltable =[
        'ImportInvoiceID',
        'ProductID',
        'Quantity',
        'Price',
        'Amount',
    ];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = [
        'ImportInvoiceID',
        'ProductID',
    ];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ImportInvoiceID',
        'ProductID',
        'Quantity',
        'Price',
        'Amount',
    ];
}
