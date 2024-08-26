<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    # specify table name
    protected $table = 'posts';
    protected $fillable = [
        'title',
        'postedBy',
        'description',
        'createdAt',
    ];
    
}
