@extends('layouts.admin');
@section('content')
    <div class="col-sm-4">
        <form action="{{route('category.store')}}" method="post">
            @csrf
            <div class="form-group">
                <lable for="name"><h3>Category Name</h3></lable>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <input type="submit" name="create" class="btn btn-primary" value="Create">
            </div>
        </form>
    </div>

    <div class="col-sm-6">
        <table class=" text-center table table-responsive table-hover table-bordered">
            <thead>
            <tr>
                <th class="text-center"> Id</th>
                <th class="text-center"> Title</th>
                <th class="text-center">create at</th>
            </tr>
            </thead>
            <tbody>
            @if($categories)
                @foreach($categories as $category)


                    <tr>

                        <td scope="row">{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        @if($category->created_at)
                            <td>{{$category->created_at->diffForHumans()}}</td>

                        @else
                            <td></td>
                        @endif
                        <form action="{{route('category.destroy',$category->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <td><input type="submit" value="Delete" class="btn btn-danger"></td>
                        </form>
                        <td><a href="{{route('category.edit',$category->id)}}" class="btn btn-primary">Edit</a></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>


    </div>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$categories->render()}}
        </div>
    </div>
@endsection
