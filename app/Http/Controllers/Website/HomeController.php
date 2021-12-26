<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\InterfacePostRepository;
use App\Http\Requests\PostRequest;
use App\Services\PostService;

class HomeController extends Controller
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
        $posts= $this->postRepository->getAll();
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
         $this->postService->store($postRequest);
        return redirect()->route('website.index');
    }

}

