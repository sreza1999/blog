@extends('layouts.admin')
@section('content')

    <h1>Media</h1>

    @if($photos)

        <table class="table text-center">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">image</th>
                <th scope="col">create at</th>
            </tr>
            </thead>
            <tbody>
            @foreach($photos as $photo)
                <tr>
                    <th scope="row">{{$photo->id}}</th>
                    <th>
                        <img src="{{asset('images/'.$photo->file)}}" style="width: 300px" alt="#">
                    </th>
                    <th scope="col">{{$photo->created_at->diffForHumans()}}</th>


                    <form action="{{route('media.destroy',$photo->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <td><input type="submit" value="Delete" class="btn btn-danger"></td>
                    </form>
                </tr>
            @endforeach
            </tbody>
        </table>

    @endif
    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$photos->render()}}
        </div>
    </div>
@endsection
