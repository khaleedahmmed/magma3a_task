@extends('website.layouts.master')
@section('title','home')
@section('content')
<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token"/>

  <!-- Page Content -->
    <!-- Banner Starts Here -->
     <div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
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
    @foreach ($posts as $post)
    <div class="panel-body">
    <!-- Newsfeed Content -->
    <!--===================================================-->
    <div class="media-block">
     <div class="post">
      <a class="media-left" href="#"><img class="rounded-circle img-sm" alt="Profile Picture" src="https://bootdey.com/img/Content/avatar/avatar1.png"></a>
      <div class="media-body">
        <div class="mar-btm">
          <a href="#" class="btn-link text-semibold media-heading box-inline">{{$post->user->name}}</a>
          <p class="text-muted text-sm"> {{$post->created_at->toDateTimeString()}}</p>
        </div>
        <h2>{{$post->name}}</h2>
        {{$post->body}}
          <div class="pad-ver">
        </div>
      </div>
     </div>

     <div class="panel">
      <div class="panel-body">
        <textarea id="textarea_comment{{ $post->id }}" class="form-control" rows="2" placeholder="What do you think?"></textarea>
        <div class="mar-top clearfix">
          <a class="btn btn-sm btn-primary pull-right" onclick="addComment('{{ $post->id }}')"><i class="fa fa-comment fa-fw"></i> Comment</a>
        </div>
        <div id="err"></div>
      </div>
    </div>

    <!--===================================================-->
    <!-- End Newsfeed Content -->
  </div>
</div>


</div>

      @endsection
