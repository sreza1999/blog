@extends('layouts.admin')
@section('content')
    <h1>Reply Comments</h1>
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
        @if($replies)
            @foreach($replies as $reply)
                <tr>
                    <th scope="row">{{$reply->id}}</th>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>{{$reply->body}}</td>
                    <td>{{$reply->created_at->diffForHumans()}}</td>
                    <td>{{$reply->updated_at->diffForHumans()}}</td>
                    <form action="{{route('replies.destroy',$reply->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <td><input type="submit" value="Delete" class="btn btn-danger"></td>
                    </form>
                    @if($reply->is_active ==1)
                        <form action="{{route('replies.update',$reply->id)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="is_active" value="0">
                            <td><input type="submit" value="Un Approve" class="btn btn-info"></td>
                        </form>
                    @endif
                    @if($reply->is_active ==0)
                        <form action="{{route('replies.update',$reply->id)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="is_active" value="1">
                            <td><input type="submit" value="Approve" class="btn btn-success"></td>
                        </form>
                    @endif
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

@endsection
