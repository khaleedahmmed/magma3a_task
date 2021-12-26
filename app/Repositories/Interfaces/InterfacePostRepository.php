<?php


namespace App\Repositories\Interfaces;


use App\Models\Post;

interface InterfacePostRepository
{
    public function save(Post $post);
    public function getAll();
    public function myPosts();
}
