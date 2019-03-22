<?php

namespace App\Api\V1\Http\Controllers;

use App\Domain\Posts\Requests\CreateOrUpdatePostRequest;
use App\Domain\Posts\Actions\{CreatePost, DeletePost, UpdatePost};
use App\Domain\Posts\Post;
use App\Api\V1\Http\Resources\User as UserResource;

class PostController extends Controller
{
    public function show($id)
    {
        return UserResource::make(Post::findOrFail($id));
    }

    public function create(CreateOrUpdatePostRequest $request, CreatePost $create)
    {
        $create->execute($request->postData());
    }

    public function update($id, CreateOrUpdatePostRequest $request, UpdatePost $update)
    {
        $update->execute(Post::findOrFail($id), $request->postData());
    }

    public function delete($id, DeletePost $delete)
    {
        $delete->execute(Post::findOrFail($id));
    }
}