<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Import_invoices extends Model
{
    
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = [
        'ImportID',
        'SupplierID',
    ];
    /* *
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ImportID',
        'SupplierID',
        'ImportDate',
        'Total',
    ];
}