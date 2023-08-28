<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SetAuthorTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Blog extends Model
{
    use SetAuthorTrait;
    use HasFactory;

    protected $table = 'blogs';

    protected $fillable = [
        'published_at',
        'image_middle',
        'image_large',
        'user_id',
        'views',
        'title',
        'desc',
        'text',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class,'blog_id','id');
    }

    public function incrementViewsCount(int $id, Request $request): void {
        $now = time();
        $key = 'blog-'.$id;

        if (!$request->session()->has($key) || ($now - $request->session()->get($key)) > 600) {
            $request->session()->put($key, $now);
            $this->increment('views');
            $this->save();
        }
    }

    protected function PublishedAt(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Carbon::parse($value)->format('F d, Y')
        );
    }
}
