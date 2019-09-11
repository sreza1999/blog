@extends('layouts.admin')
@section('content')
    <h1>Comments</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Author</th>
            <th scope="col">email</th>
            <th scope="col">Caption</th>
            <th scope="col">Create at</th>
            <th scope="col">Update at</th>
        </tr>
        </thead>
        <tbody>
        @if($comments)
            @foreach($comments as $comment)
                <tr>
                    <th scope="row">{{$comment->id}}</th>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{$comment->body}}</td>
                    <td>{{$comment->created_at->diffForHumans()}}</td>
                    <td>{{$comment->updated_at->diffForHumans()}}</td>
                    <form action="{{route('comment.destroy',$comment->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <td><input type="submit" value="Delete" class="btn btn-danger"></td>
                    </form>
                    @if($comment->is_active ==1)
                        <form action="{{route('comment.update',$comment->id)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="is_active" value="0">
                            <td><input type="submit" value="Un Approve" class="btn btn-info"></td>
                        </form>
                    @endif
                    @if($comment->is_active ==0)
                        <form action="{{route('comment.update',$comment->id)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="is_active" value="1">
                            <td><input type="submit" value="Approve" class="btn btn-success"></td>
                        </form>
                    @endif
                    <td><a href="{{route('replies.show',$comment->id)}}" class="btn btn-primary">Replies</a></td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$comments->render()}}
        </div>
    </div>
@endsection
