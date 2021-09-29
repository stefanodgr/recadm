@extends('admin.layouts.dashboard')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>         
@endif
<!-- container-fluid -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row py-lg-2">
      <div class="col-md-6">
          <h2>Editar Post </h2>
      </div>
  
    </div>
  </div>
  <!-- /container-fluid -->
  
<div class="card shadow mb-4">
    <div class="card-body">  
        <form  method="POST"   action="/posts/{{ $post->id }}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf()
            
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title..." value="{{ $post->title}}">
            </div>
            <label for="">Select Image</label>
            <input type="file" name="image" class="form-control-file" id="image" value="{{$post->image}}" >
            <div class="row">
                <img src="{{ asset('/storage/images/posts_images/'.$post->image_url) }}" class="img-trumbnail mx-auto" alt="{{ $post->image_url }}" width="250">

            </div>
            <div class="form-group">
                <label for="content">Inset Content</label>
                <textarea  name="post_content" id="content" >{{ $post->content}}</textarea>
            
            </div>
            <div class="form-group row">
                <div class="form-group  col-sm-6 ">
                    <button type="submit" class="btn btn-success btn-block"><i class="fa fa-send-o"></i>Modificar</button>
                </div> 
                <div class="form-group col-sm-6">
                    <a href="{{route('danger','posts.index')}}" name="danger" type="button" class="btn btn-danger btn-block">Cancelar</a>
                </div>
            </div>
        </form>
<script>
    CKEDITOR.replace( 'post_content');
</script>
    
@endsection