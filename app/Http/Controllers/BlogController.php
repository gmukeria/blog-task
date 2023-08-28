<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBlogRequest;
use App\Http\Requests\CreateCommentRequest;
use App\Http\Requests\DeleteBlogRequest;
use App\Http\Requests\DeleteCommentRequest;
use App\Http\Requests\EditBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Service\BlogService;
use Illuminate\Http\Request;

class BlogController
{
    public function __construct(
        protected BlogService $blogService,
    ) {}

    public function index(Request $request)
    {
        $data = $this->blogService->getAll();
        return view('pages.blog.index')
            ->with('request', $request)
            ->with('data', $data);
    }

    public function list(Request $request)
    {
        $data = $this->blogService->getList();
        return view('pages.blog.list')
            ->with('request', $request)
            ->with('data', $data);
    }

    public function show(int $id, Request $request)
    {
        $data = $this->blogService->getOne($id);
        $comments = data_get($data, 'comments');
        $data->incrementViewsCount($id, $request);

        return view('pages.blog.show')
            ->with('comments', $comments)
            ->with('data', $data);
    }

    public function create() {

        return view('pages.blog.create');
    }

    public function store(CreateBlogRequest $request) {
        $data = $this->blogService->store($request->all());

        return redirect()->route('blog.edit', $data->getAttribute('id'));
    }

    public function edit($id, EditBlogRequest $request) {
        $data = $this->blogService->getOne($id);

        return view('pages.blog.edit')
            ->with('data', $data);
    }

    public function update($id, UpdateBlogRequest $request) {
        $data = $this->blogService->update($id, $request->all());
        return redirect()->route('blog.edit', $data->getAttribute('id'));
    }

    public function delete($id, DeleteBlogRequest $request) {
        $data = $this->blogService->delete($id);
        return redirect()->route('blog.list');
    }


    public function storeComment(int $blogId, CreateCommentRequest $request) {
        $this->blogService->storeComment($request->all(), $blogId);
        return redirect(route('blog.show', $blogId).'/#add_comment');
    }

    public function deleteComment(int $blogId, int $commentId, DeleteCommentRequest $request) {
        $this->blogService->deleteComment($commentId);
        return redirect(route('blog.show', $blogId).'/#add_comment');
    }
}
