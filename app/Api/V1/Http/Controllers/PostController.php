<?php

namespace App\Api\V1\Http\Controllers;

use League\Fractal\{Manager, Serializer\DataArraySerializer, Resource\Item, Resource\Collection, Pagination\IlluminatePaginatorAdapter};
use App\Domain\Posts\Requests\CreateOrUpdatePostRequest;
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
        $resource = new Item(Post::findOrFail($id), new PostTransformer);

        return $this->manager->createData($resource)->toArray();
    }

    public function create(CreateOrUpdatePostRequest $request, CreatePost $create)
    {
        $created = $create->execute(PostData::fromRequest($request));
        $resource = new Item($created, new PostTransformer);

        return $this->manager->createData($resource)->toArray();
    }

    public function update($id, CreateOrUpdatePostRequest $request, UpdatePost $update)
    {
        $updated = $update->execute(Post::findOrFail($id), PostData::fromRequest($request));
        $resource = new Item($updated, new PostTransformer);
        
        return $this->manager->createData($resource);
    }

    public function delete($id, DeletePost $delete)
    {
        $delete->execute(Post::findOrFail($id));
        
        return response(204, null);
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