@extends('layouts.app')

@section('content')

  <!-- Page Header -->
  {{-- <header class="masthead inicio img-fluid"  style="background-image: url('{{ asset('/storage/images/logos/inicio.png') }}'); ">
    {{-- <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Clean Blog</h1>
            <span class="subheading">A Blog Theme by Start Bootstrap</span>
          </div>
        </div>
      </div>
    </div>
  {{-- </header>  --}}

<div class="col-sm-12 ">
  <img class="img-fluid" width="100%"   src="{{ asset('/storage/images/logos/contactos.png') }}" >

</div>




<div class="card">
  <!-- Main Content -->
  <div class="container ">
    <div class="row">

        @foreach ($posts as $post)

        <div class="col-md-4 col-lg-3">
          <img class="img-thumbnail mt-4" width="100%" src="{{ asset('/storage/images/posts_images/'.$post['image_url']) }}" alt="post_image">
        </div>
        <div class="col-lg-8 col-md-8 mx-auto">
        <div class="post-preview">
          <a href="/home/{{ $post['id']}} ">
            <h2 class="post-title">
              {{ $post['title']}}
            </h2>
            <h3 class="post-subtitle">
              {!!getShorterString($post['content'],200) !!}
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#">  {{ $post->user['name']}}</a>
           on {{ $post['created_at'] }}</p>
        </div>
      </div>
        <hr>
        @endforeach

        <!-- Pager -->
        {{ $posts->links()}}
      </div>
    </div>
  </div>

  <hr>
  @endsection
