<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'file_path', 'batch_id', 'uploaded_by'];

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }
}
