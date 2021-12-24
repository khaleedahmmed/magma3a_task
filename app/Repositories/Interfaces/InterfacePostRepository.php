<?php


namespace App\Repositories\Interfaces;


use App\Models\Post;

interface InterfacePostRepository
{
    public function save(Post $post);
}
