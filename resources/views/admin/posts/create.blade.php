@extends('layouts.admin');
@section('content')
    <div id="wrapper">
        <div id="page-wrapper">
            @include('includes.tiny-editor')
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-6">
                        <h1>Create Post</h1>
                        <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group  ">
                                <lable for="title"><h4> title</h4></lable>
                                <input type="text" name="title" class="form-control">
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
                                <input type="text" name="tags" class="form-control">
                            </div>
                            <div class="form-group ">
                                <lable for="body"><h4> content</h4></lable>
                                <textarea name="body" class="form-control" cols="30" rows="10 "></textarea>
                            </div>
                            <div class="form-group col-xs-12">
                                <input type="submit" name="create_post" value="Post" class="btn btn-primary">
                            </div>

                        </form>
                    </div>
                </div>
                @include('includes.form_error')
            </div>
        </div>
    </div>
@endsection

