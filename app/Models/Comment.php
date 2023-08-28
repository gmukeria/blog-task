<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SetAuthorTrait;

class Comment extends Model
{
    use SetAuthorTrait;

    protected $table = 'comments';

    protected $fillable = [
        'user_id',
        'blog_id',
        'text',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

}
