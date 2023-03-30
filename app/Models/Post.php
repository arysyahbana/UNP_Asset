<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Post extends Model
{
    use HasFactory, HasApiTokens;

    public function rCategory()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function rUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
