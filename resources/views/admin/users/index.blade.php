@extends('layouts.admin');
@section('content')
    @if(Session::has('create_user'))
        <div class="alert alert-success" role="alert">
            <h5>User successfully create</h5>
        </div>
        <h1>Users</h1>
    @endif
    @if(Session::has('delete_user'))
        <div class="alert alert-success" role="alert">
            <h5>User successfully Delete</h5>
        </div>
        <h1>Users</h1>
    @endif
    @if(Session::has('edit_user'))
        <div class="alert alert-success" role="alert">
            <h5>User successfully Update</h5>
        </div>
        <h1>Users</h1>
    @endif
    <div class="col-lg-12 ">
        <table class="table table-bordered table-hover table-responsive">
            <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Image</th>
                <th class="text-center">Username</th>
                <th class="text-center">Role</th>
                <th class="text-center">Active</th>
                <th class="text-center">Name</th>
                {{--                                <th class="text-center">last name</th>--}}
                <th class="text-center">Email</th>
                <th class="text-center">Create</th>
                <th class="text-center">Update</th>
            </tr>
            </thead>
            <tbody>
            @if($users)
                @foreach($users as $user)
                    <tr class="text-center">
                        <td>{{$user->id}}</td>
                        <td>
                            @if($user->photo)
                                <img src="{{asset('images/'.$user->photo->file)}}" style="width: 100px" alt="#">

                            @else
                                <img style="height:50px" src="http://placehold.it/1000x400" alt="#"
                                     class="img-responsive   img-rounded">
                            @endif</td>
                        <td>{{$user->username}}</td>
                        @if($user->role->name)
                            <td>{{$user->role->name}}</td>
                        @else
                            <td>No Role</td>
                        @endif
                        <td>{{$user->is_active == 1 ? 'Active':'Not Active'}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td>{{$user->updated_at->diffForHumans()}}</td>
                        <form action="{{route('users.destroy',$user->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <td><input type="submit" value="Delete" class="btn btn-danger"></td>
                        </form>
                        <td><a href="{{route('users.edit',$user->id)}}" class="btn btn-primary">Edit</a></td>

                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>

    </div>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$users->render()}}
        </div>
    </div>
@endsection
