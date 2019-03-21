<?php

namespace App\Http\Controllers;

use App\Domain\Posts\Requests\CreateOrUpdatePostRequest;
use App\Domain\Posts\Actions\{CreatePost, DeletePost, UpdatePost};
use App\Domain\Posts\Post;

class PostController extends Controller
{
    public function show($id)
    {
        return Post::find($id);
    }

    public function create(CreateOrUpdatePostRequest $request, CreatePost $create)
    {
        $create->execute($request->postData());
    }

    public function update($id, CreateOrUpdatePostRequest $request, UpdatePost $update)
    {
        $update->execute(Post::find($id), $request->postData());
    }

    public function delete($id, DeletePost $delete)
    {
        $delete->execute(Post::find($id));
    }
}
