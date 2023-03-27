<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = ['title', 'author', 'content', 'image', 'date'];




    /**  Start relations **/

    protected function comments()
    {
        return $this->hasMany(Comment::class,'post_id');
    }

    /**  End relations **/

}

// end of class
