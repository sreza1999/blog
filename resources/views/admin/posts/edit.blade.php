@extends('layouts.admin');
@section('content')

    @if($post->photo)
        <div class="col-lg-3">
            <img src="{{asset('images/'.$post->photo->file)}}" style="height: 200px" alt="#"
                 class="img-responsive img-rounded">
        </div>
    @else
        <div class="col-sm-3">

            <img src="http://placehold.it/400x400" alt="#"
                 class="img-responsive img-rounded">
        </div>
    @endif
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-6">
                        <h1>Create Post</h1>
                        <form action="{{route('posts.update',$post->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group  ">
                                <lable for="title"><h4> title</h4></lable>
                                <input type="text" name="title" class="form-control" value="{{$post->title}}">
                            </div>
                            <select name="category_id" id="" class="form-group">
                                <option value="">Category</option>
                                @if($categories)
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <div class="form-group">
                                <lable for="photo_id"><h4>image</h4></lable>
                                <input type="file" name="photo_id">
                            </div>
                            <div class="form-group">
                                <lable for="tags"><h4> tags</h4></lable>
                                <input type="text" name="tags" class="form-control" value="{{$post->tags}}">
                            </div>
                            <div class="form-group ">
                                <lable for="body"><h4> content</h4></lable>
                                <textarea name="body" class="form-control" id="" cols="30"
                                          rows="10 ">{{$post->body}}</textarea>
                            </div>
                            <div class="form-group col-xs-12">
                                <input type="submit" name="Update" value="Update" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
                @include('includes.form_error')
            </div>
        </div>
    </div>
@endsection

