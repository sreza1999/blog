@extends('layouts.admin');
@section('content')
    <h1>Posts</h1>
    @if(Session::has('create_post'))
        <div class="alert alert-success" role="alert">
            <h5>Post successfully Send</h5>
        </div>
    @endif
    @if(Session::has('delete_post'))
        <div class="alert alert-success" role="alert">
            <h5>post successfully Delete</h5>
        </div>
    @endif
    @if(Session::has('edit_post'))
        <div class="alert alert-success" role="alert">
            <h5>post successfully Update</h5>
        </div>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">image</th>
            <th scope="col">title</th>
            <th scope="col">Author</th>
            <th scope="col">Category</th>
            <th scope="col">Caption</th>
            <th scope="col">tags</th>
            <th scope="col">Create at</th>
            <th scope="col">Update at</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <th>
                        @if($post->photo)
                            <img src="{{asset('images/'.$post->photo->file)}}" style="width: 200px" alt="#">

                        @else
                            <img style="height:50px" src="http://placehold.it/1000x400" alt="#"
                                 class="img-responsive   img-rounded">
                        @endif
                    </th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->user->name}}</td>
                    @if($post->category->name)
                        <td>{{$post->category->name}}</td>
                    @else
                        <td>No Category</td>
                    @endif

                    <td>{{$post->body}}</td>
                    <td>{{$post->tags}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                    <form action="{{route('posts.destroy',$post->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <td><input type="submit" value="Delete" class="btn btn-danger"></td>
                    </form>
                    <td><a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a></td>


                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$posts->render()}}
        </div>
    </div>
@endsection
