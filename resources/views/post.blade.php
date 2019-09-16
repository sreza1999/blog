@extends('layouts.blog-post')
@section('content')
    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by {{$post->user->name}}
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{asset('images/'.$post->photo->file)}}" alt="">

    <hr>

    <!-- Post Content -->
    <p>{{$post->body}}</p>

    <hr>

    <!-- Blog Comments -->

    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>
        <form action="{{route('comment.store')}}" method="post">
            @csrf
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <div class="form-group">
                <lable for="name"><h5> Comment</h5></lable>
                <textarea class="form-control" rows="3" name="body"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Comment" class="btn btn-primary">
            </div>
            @include('includes.form_error')
        </form>
    </div>
    <hr>

    <!-- Posted Comments -->
    <!-- Comment -->
    @if($comment)
        @foreach($comment as $comments)
            <div class="media">
                <a class="pull-left" href="#">
                    @if($comments->photo)
                        <img src="{{asset('images/'.$comments->photo)}}" style="width: 100px" alt="#">
                    @else
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    @endif                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$comments->author}}
                        <small>{{$comments->created_at->diffForHumans()}}</small></h4>
                {{$comments->body}}
                <!-- Nested Comment -->
                    @if(count($comments->commentReplies)>0)
                        @foreach($comments->commentReplies as $reply)
                            @if($reply->is_active==1)
                                <div class="media">
                                    <a class="pull-left" href="#">
                                        @if($reply->photo)
                                            <img src="{{asset('images/'.$reply->photo)}}" style="width: 200px" alt="#">
                                        @else
                                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                                        @endif
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$reply->author}}
                                            <small>{{$reply->created_at}}</small>
                                        </h4>
                                        {{$reply->body}}
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                    <form action="" method="get">
                        <input type="hidden" name="reply" value="{{$comments->id}}">
                        <input type="submit" name="" value="reply" class="btn btn-info">
                    </form>
                    @if(request()->reply ==$comments->id)
                        <div class="well">
                            <h4>Leave a Comment:</h4>
                            <form action="{{route('replies.store')}}" method="post">
                                @csrf
                                <input type="hidden" name="comment_id" value="{{$comments->id}}">
                                <div class="form-group">
                                    <lable for="name"><h5> Comment</h5></lable>

                                    <textarea class="form-control" rows="3" name="body"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" value="Comment" class="btn btn-primary">
                                </div>
                                @include('includes.form_error')
                            </form>
                        @endif
                        <!-- End Nested Comment -->
                        </div>
                </div>
        @endforeach

    @endif
@endsection
