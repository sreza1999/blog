@extends('layouts.admin');
@section('content')


    <h1>User Create</h1>
    <div id="page-wrapper">

        <div class="container">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-6">
                    <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <lable for="username">username</lable>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <lable for="password">password</lable>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <lable for="name">Name</lable>
                            <input type="text" name="name" class="form-control">
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
                        <div class="form-group ">
                            <lable for="email">email</lable>
                            <input type="email" name="email" class="form-control">
                        </div>

                        <div class="form-group ">
                            <lable for="image">image</lable>
                            <br>
                            <input type="file" name="image">
                        </div>
                        <div class="form-group col-xs-12">
                            <input type="submit" name="create" value="Create" class="btn btn-primary">
                        </div>

                    </form>
                </div>
            </div>
            @include('includes.form_error')
        </div>

        @endsection
    </div>
