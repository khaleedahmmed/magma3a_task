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
}
