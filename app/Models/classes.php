<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classes extends Model
{
    use HasFactory;
    protected $table = 'classes';

    protected $fillable = [
        'classlink',
        'link_batch',
        'starttime',
        'endtime', // Include the nullable endtime field
        'status',
    ];

    // Default values for attributes
    protected $attributes = [
        'status' => 'active', // Default status to inactive
    ];

    // Cast attributes to appropriate data types
    protected $casts = [
        'starttime' => 'datetime',
        'endtime' => 'datetime',
    ];
}
