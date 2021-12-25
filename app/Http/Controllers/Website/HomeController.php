<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Services\PostService;

class HomeController extends Controller
{

    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts   = Post::get();

        return view('website.index',compact('posts'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest $postRequest
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $postRequest)
    {
        $post = $this->postService->store($postRequest);
        return redirect()->route('website.index');
    }

}

