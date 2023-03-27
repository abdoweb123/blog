<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = ['post_id', 'user_id', 'content'];





    /**  Start relations **/

    protected function post()
    {
        return $this->belongsTo(Post::class,'post_id');
    }


    protected function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    /**  End relations **/

}
// end of class
