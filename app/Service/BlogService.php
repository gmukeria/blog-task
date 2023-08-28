<?php

namespace App\Service;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BlogService

{
    public function getAll() {
        return Blog::with('user', 'comments')
            ->when((Auth::user()->hasRole('editor')), function ($q)  {
                return $q->where('user_id', Auth::id());
            })
            ->orderBy('id', 'desc')
            ->paginate(5);
    }

    public function getList() {
        return Blog::with('user', 'comments')
            ->where('published_at', '<=',  Carbon::now()->toDateTimeString())
            ->orderBy('id', 'desc')
            ->paginate(3);
    }

    public function getOne(int $blogId) {
        return Blog::with( 'comments.user')->findOrFail($blogId);
    }

    public function store(array $data): Blog {
        return Blog::create([
              'published_at' => data_get($data, 'published_at', Carbon::now()),
              'image_middle' => $data['image_middle'],
              'image_large' => $data['image_large'],
              'title' => $data['title'],
              'desc' => $data['desc'],
              'text' => $data['text'],
        ]);
    }

    public function update(int $blogId, array $data): Blog {
        $blog = Blog::findOrFail($blogId);
        $blog->image_large = $data['image_large'];
        $blog->image_middle = $data['image_middle'];
        $blog->title = $data['title'];
        $blog->desc = $data['desc'];
        $blog->text = $data['text'];
        $blog->save();
        return $blog;
    }

    public function delete(int $blogId):bool {
        $blog = Blog::findOrFail($blogId);
        return $blog->delete();
    }

    public function storeComment(array $data, int $blogId): Comment {

        return Comment::create([
            'text' => $data['comment'],
            'blog_id' => $blogId,
        ]);
    }

    public function deleteComment(int $commentId): bool {
        $comment = Comment::findOrFail($commentId);
        return $comment->delete();
    }
}
