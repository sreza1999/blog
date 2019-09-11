@extends('layouts.admin')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">

@endsection
@section('content')
    <h1>Upload Media</h1>
    <br>
    <form action="{{route('media.store')}}" class="dropzone" method="post">
        @csrf
    </form>
@endsection

@section('script')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js'></script>
@endsection
