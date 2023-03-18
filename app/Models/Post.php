<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function rCategory()
    {
        return $this->belongsTo(Category::class);
    }
    public function rUser()
    {
        return $this->belongsTo(User::class);
    }
}
