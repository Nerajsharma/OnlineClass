<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;
    protected $fillable = [
        'batch_name',
        'batch_cource',
        'batch_duration',
        'formvalid',
        'custom_fields',
    ];

    protected $casts = [
        'custom_fields' => 'array',
    ];
    // public function users()
    // {
    //     return $this->belongsToMany(User::class);
    // }
    public function customfields()
    {
        return $this->hasMany(CustomField::class, 'batch_id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'custom_fields', 'batch_id', 'user_id');
    }


}
