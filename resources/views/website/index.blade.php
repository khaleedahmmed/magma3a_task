@extends('website.layouts.master')
@section('title','home')
@section('content')
<main>

    <div class="main-wrapper pt-80">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 order-1 order-lg-2">


    <!-- share box start -->
    <div class="card card-small">
        <div class="share-box-inner">
            <!-- profile picture end -->
            <div class="profile-thumb">
                <a href="#">
                    <figure class="profile-thumb-middle">
                        <img src="{{ url('/Images/Avatar/avatar.png') }}" alt="profile picture">
                    </figure>
                </a>
            </div>
            <!-- profile picture end -->

            <!-- share content box start -->
            <div class="share-content-box w-100">
                <form class="share-text-box">
                    <textarea name="share" class="share-text-field" aria-disabled="true" placeholder="Say Something" data-toggle="modal" data-target="#textbox" id="email"></textarea>
                </form>
            </div>
            <!-- share content box end -->

            <!-- Modal start -->
            <div class="modal fade" id="textbox" aria-labelledby="textbox">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Share Your Mood</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="modal-body custom-scroll">
                            <textarea name="content" class="share-field-big custom-scroll" placeholder="Say Something"></textarea>
                            <input type="file" name="postImages[]" id="" multiple>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="post-share-btn" data-dismiss="modal">cancel</button>
                            <button type="submit" class="post-share-btn">post</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal end -->
        </div>
    </div>
    <!-- share box end -->
        @foreach ($posts as $post)
                    <!-- post status start -->
                    <div class="card">
                        <!-- post title start -->
                        <div class="post-title d-flex align-items-center">
                            <!-- profile picture end -->
                            <div class="profile-thumb">
                                <a href="#">
                                    <figure class="profile-thumb-middle">
                                        <img src="{{ url('/Images/Avatar/avatar.png') }}" alt="profile picture">
                                    </figure>
                                </a>
                            </div>
                            <!-- profile picture end -->

                            <div class="posted-author">
                                <h6 class="author">{{$post->user->name}}</h6>
                                <span class="post-time">{{$post->created_at->toDateTimeString()}}</span>
                            </div>

                        </div>
                        <!-- post title start -->
                        <div class="post-content">
                            <p class="post-desc">
                                {{$post->content}}
                            </p>
                            <div class="post-thumb-gallery img-gallery">
                                <div class="row no-gutters">
                                    @if(!$post->images->isEmpty())

                                    <div class="col-8">
                                        <figure class="post-thumb">
                                            <a class="gallery-selector" href="{{ url('/Images/Posts/'.$post->images[0]->image) }}">
                                                <img src="{{ url('/Images/Posts/'.$post->images[0]->image) }}" alt="post image">
                                            </a>
                                        </figure>
                                    </div>
                                    @endif
                                    @foreach ($post->images as $img)
                                    @if ($loop->first) @continue @endif
                                    <div class="col-4">
                                        <div class="row">
                                            <div class="col-12">
                                                <figure class="post-thumb">
                                                    <a class="gallery-selector" href="{{ url('/Images/Posts/'.$img->image) }}">
                                                        <img src="{{ url('/Images/Posts/'.$img->image) }}" alt="post image">
                                                    </a>
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- post status end -->
        @endforeach


                </div>


            </div>
        </div>
    </div>

</main>
@endsection
