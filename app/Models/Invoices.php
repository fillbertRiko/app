<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    // Table name
    protected $table = 'invoices';

    // Primary key
    protected $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;

    // Fillable fields
    protected $fillable = [
        'invoice_number',
        'customer_id',
        'amount',
        'status',
        'due_date'
    ];

    // Relationships
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }
}