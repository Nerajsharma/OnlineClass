<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'uploader_id', 'projectname', 'projectlang', 'project_file','projectmode'];

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploader_id');
    }

}
