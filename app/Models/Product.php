<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'featured_image',
        'category',
        'deleted_at',
    ];
}
