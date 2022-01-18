<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['nazov', 'autor', 'uvodny_obrazok', 'slug','kontent','uvodny_text','category_id'];
}
