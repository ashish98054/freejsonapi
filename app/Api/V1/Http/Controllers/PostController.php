<?php

namespace App\Api\V1\Http\Controllers;

use League\Fractal\{Manager, Serializer\DataArraySerializer, Resource\Item, Resource\Collection, Pagination\IlluminatePaginatorAdapter};
use App\Domain\Posts\Policies\PostPolicy;
use App\Domain\Posts\Requests\CreateUpdatePostRequest;
use App\Domain\Posts\Actions\{CreatePost, DeletePost, UpdatePost};
use App\Domain\Posts\Post;
use App\Domain\Posts\DataObjects\PostData;
use App\Api\V1\Http\Transformers\PostTransformer;
use App\Api\V1\Http\Transformers\PostCommentTransformer;

class PostController extends Controller
{
    private $manager;

    public function __construct(Manager $manager)
    {
        $this->middleware(['auth:api'])->only('create', 'delete', 'update');

        $this->manager = $manager->setSerializer(new DataArraySerializer);
        $this->manager->parseIncludes(isset($_GET['include']) ? $_GET['include'] : '');
    }

    public function index()
    {
        $posts = Post::latest()->paginate();
        
        $resource = new Collection($posts, new PostTransformer);
        $resource->setPaginator(new IlluminatePaginatorAdapter($posts));

        return $this->manager->createData($resource)->toArray();
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        $resource = new Item($post, new PostTransformer);

        return $this->manager->createData($resource)->toArray();
    }

    public function create(CreateUpdatePostRequest $request, CreatePost $create)
    {
        $created = $create->execute(PostData::fromRequest($request));

        $resource = new Item($created, new PostTransformer);

        return $this->manager->createData($resource)->toArray();
    }

    public function update($id, CreateUpdatePostRequest $request, UpdatePost $update)
    {
        $post = Post::findOrFail($id);

        $this->authorize(PostPolicy::UPDATE, $post);
        $updated = $update->execute(Post::findOrFail($id), PostData::fromRequest($request));
        $resource = new Item($updated, new PostTransformer);
        
        return $this->manager->createData($resource);
    }

    public function delete($id, DeletePost $delete)
    {
        $post = Post::findOrFail($id);

        $this->authorize(PostPolicy::DELETE, $post);
        $delete->execute($post);
        
        return response(null, 204);
    }

    public function comments($id)
    {
        $post = Post::findOrFail($id);
        $comments = $post->commentsRelation()->paginate();
        $resource = new Collection($comments, new PostCommentTransformer);
        $resource->setPaginator(new IlluminatePaginatorAdapter($comments));

        return $this->manager->createData($resource)->toArray();
    }
}