<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBlogs extends Model
{
    use HasFactory;

    protected $fillable = ['blog_name','blog'];
}
