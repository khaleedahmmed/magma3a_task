@extends('website.layouts.master')
@section('title','home')
@section('content')

  <!-- Page Content -->
    <!-- Banner Starts Here -->
     <div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-10">
              <div class="text-content">
                <h4>Magma'a Task</h4>
                <h2>Here You Can Find The Posts</h2>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
      <!-- Banner Ends Here -->


<div class="container bootdey">

<div class="col-md-12 bootstrap snippets">
    <div class="panel">
        <div class="panel-body">
            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
          <textarea name="content" id="" cols="30"  placeholder="What do you think?"></textarea>
          <div class="mar-top clearfix">
            <input type="file" name="postImages[]" id="" multiple>
            <button type="submit" class="btn btn-sm btn-primary pull-right"><i class="fa fa-send fa-fw"></i> post</button>
          </div>
          <div id="err"></div>
            </form>
        </div>
      </div>
</div>
<div class="col-md-12 bootstrap snippets">
    <div class="panel">
    @foreach ($posts as $post)
    <div class="panel-body">
    <!-- Newsfeed Content -->
    <!--===================================================-->
    <div class="media-block">
     <div class="article">
      <a class="media-left" href="#"><img class="rounded-circle img-sm" alt="Profile Picture" src="{{ url('/Images/Avatar/avatar.png') }}"></a>
      <div class="media-body">
        <div class="mar-btm">
          <h2>{{$post->user->name}}</h2>
          <p class="text-muted text-sm"> {{$post->created_at->toDateTimeString()}}</p>
        </div>
        {{$post->content}}
          <div class="pad-ver">
        </div>
      </div>
     </div>

    <!-- End Newsfeed Content -->
  </div>
</div>
@endforeach

       </div>
     </div>
   </div>
      @endsection
