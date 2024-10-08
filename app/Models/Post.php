<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Specify the attributes that are mass assignable
    protected $fillable = ['title', 'content']; // Exclude '_token'
}

