<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomField extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'batch_id',
        'custom_field',
        'status', // Add status field to fillable attributes
    ];

    protected $casts = [
        'custom_field' => 'array', // Automatically cast JSON to PHP array
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }
}
