<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\InterfacePostRepository;
use App\Services\PostService;

class ProfileController extends Controller
{

    protected $postService, $postRepository;

    public function __construct(PostService $postService, InterfacePostRepository $postRepository)
    {
        $this->postService = $postService;
        $this->postRepository = $postRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts= $this->postRepository->myPosts();

        return view('website.index',compact('posts'));
    }


}

