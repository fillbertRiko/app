<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Sale_invoices extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sale_invoices';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sale_invoice_user', 'sale_invoice_date', 'sale_invoice_total', 'sale_invoice_status'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'sale_invoice_user', 'id');
    }
    public function saleInvoiceDetail()
    {
        return $this->hasMany('App\Models\Sale_invoice_details', 'sale_invoice_details_sale_invoice', 'id');
    }
}
