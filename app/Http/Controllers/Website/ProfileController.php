<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Services\PostService;
use App\Traits\FileManagement;

class ProfileController extends Controller
{
    use FileManagement;

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
        $posts   = Post::where('user_id', auth()->user()->id)->get();

        return view('website.profile',compact('posts'));
    }


}

