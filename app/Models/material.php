<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = ['material_name', 'material_file', 'material_cource', 'file_size', 'uploaded_by'];

    protected $casts = [
        'material_cource' => 'array',
    ];
}

