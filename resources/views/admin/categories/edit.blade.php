@extends('layouts.admin');
@section('content')
    <div class="col-sm-4">
        <form action="{{route('category.update',$category->id)}}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <lable for="name"><h3>Category Name</h3></lable>
                <input type="text" class="form-control" name="name" value="{{$category->name}}">
            </div>
            <div class="form-group">
                <input type="submit" name="create" class="btn btn-primary" value="Create">
            </div>
        </form>
    </div>
@endsection
