<?php


namespace App\Services;

use App\Models\Post;
use App\Models\PostImage;
use App\Repositories\Interfaces\InterfacePostRepository;
use App\Traits\FileManagement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostService
{
    use FileManagement;

    protected $postRepository;

    public function __construct(InterfacePostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function store(Request $request) {

        DB::transaction(function () use($request) {
        $post = new Post($request->validated());
        $post->user_id = $request->user()->id;
        $this->postRepository->save($post);

     if ($request->postImages){
            foreach($request->postImages as $postImage){
                $image = $this->uploadFile($postImage,'Images/Posts');
                $post->images()->create(['image' => $image]);
            }
        }
        return $post;
      });
    }

}
