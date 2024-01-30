<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // use HasFactory;
    // make the table editable
    protected $fillable = ['title', 'content', 'created_at', 'updated_at'];

    // the created_at and updated_at are filled automatically
}
