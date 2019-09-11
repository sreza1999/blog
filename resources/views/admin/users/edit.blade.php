@extends('layouts.admin');
@section('content')


    <h3>Edit User : <small>{{$user->name}}</small></h3>
    @if($user->photo)
        <div class="col-sm-3">
            <img src="{{asset('images/'.$user->photo->file)}}" style="height: 200px" alt="#"
                 class="img-responsive img-rounded">
        </div>
    @else
        <div class="col-sm-3">

            <img src="http://placehold.it/400x400" alt="#"
                 class="img-responsive img-rounded">
        </div>
    @endif
    <div id="page-wrapper">

        <div class="container">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-6">
                    <form action="{{route('users.update',$user->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <lable for="username">username</lable>
                            <input type="text" name="username" class="form-control" value="{{$user->username}}">
                        </div>
                        <div class="form-group">
                            <lable for="name">Name</lable>
                            <input type="text" name="name" class="form-control" value="{{$user->name}}">
                        </div>
                        <div class="form-group ">
                            <lable for="role_id">Role</lable>
                            <select name="role_id" id="">
                                @if($roles)
                                    <option value=''>Choose</option>
                                    @foreach($roles as $role)
                                        <option value={{$role->id}}>{{$role->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <lable for="is_active">Activity</lable>
                            <select name="is_active" id="">
                                <option value=''>Choose</option>
                                <option value=1>Active</option>
                                <option value=0>Deactivate</option>

                            </select>
                        </div>
                        <div class="form-group ">
                            <lable for="email">email</lable>
                            <input type="email" name="email" class="form-control" value="{{$user->email}}">
                        </div>

                        <div class="form-group ">
                            <lable for="image">image</lable>
                            <br>
                            <input type="file" name="image">
                        </div>
                        <div class="form-group col-xs-12">
                            <input type="submit" name="create" value="Update" class="btn btn-primary">
                        </div>

                    </form>
                </div>
            </div>
            @include('includes.form_error')
        </div>

        @endsection
    </div>

