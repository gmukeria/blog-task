<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
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

    protected function CreatedAt(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Carbon::parse($value)->format('F d, Y H:m')
        );
    }

}
