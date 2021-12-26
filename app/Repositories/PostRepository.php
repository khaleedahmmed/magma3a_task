<?php


namespace App\Repositories;

use App\Models\Post;
use App\Repositories\Interfaces\InterfacePostRepository;

class PostRepository implements InterfacePostRepository
{
    public function save(Post $post)
    {
        return $post->save();
    }

    public function getAll()
    {
        return Post::get();
    }
    public function myPosts()
    {
        return Post::where('user_id', auth()->user()->id )->get();
    }
}
