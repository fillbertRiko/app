<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    // Define the table associated with the model
    protected $table = 'reports';

    // Specify the primary key for the table
    protected $primaryKey = 'id';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'title', 'description', 'created_at', 'updated_at'
    ];

    // Disable timestamps if not needed
    public $timestamps = true;
}