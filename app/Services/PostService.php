<?php


namespace App\Services;

use App\Models\Post;
use App\Repositories\Interfaces\InterfacePostRepository;
use App\Traits\FileManagement;
use Illuminate\Http\Request;

class PostService
{
    use FileManagement;

    protected $postRepository;

    public function __construct(InterfacePostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function store(Request $request) {
        $post = new Post($request->validated());
        if ($request->image)
        // upload image
           //  $post->image = $this->uploadImage($request->image,'uploads/tool');
        $this->postRepository->save($post);
        return $post;
    }

}
