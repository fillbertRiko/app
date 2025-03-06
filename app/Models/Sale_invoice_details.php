<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Sale_invoice_details extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sale_invoice_details';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sale_invoice_details_sale_invoice', 'sale_invoice_details_product', 'sale_invoice_details_quantity', 'sale_invoice_details_price', 'sale_invoice_details_total'
    ];
    public function saleInvoice()
    {
        return $this->belongsTo('App\Models\Sale_invoice', 'sale_invoice_details_sale_invoice', 'id');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\Products', 'sale_invoice_details_product', 'id');
    }
}
