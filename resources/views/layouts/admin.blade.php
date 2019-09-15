<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CMS Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('css/sb-admin.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
@yield('style')
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">CMS Admin</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{Auth::user()->name}}
                <b
                    class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>
                <li class="divider"></li>
                <li>


                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        @csrf
                    </form>
                    <a href="#" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                            class="fa fa-fw fa-power-off"></i>{{ __('Logout') }}
                    </a>
                </li>
            </ul>
        </li>
        <li><a href="../../../app/view/index.php">Back Site</a></li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="{{route('dashboard.index')}}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#post_dropdown"><i
                        class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="post_dropdown" class="collapse">
                    <li>
                        <a href="{{route('posts.index')}}"> Show all posts</a>
                    </li>
                    <li>
                        <a href="{{route('posts.create')}}"> Add post</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{route('category.index')}}"><i class="fa fa-fw fa-wrench"></i> Categories Page</a>
            </li>
            <li class="active">
                <a href="{{route('comment.index')}}"><i class="fa fa-fw fa-file"></i> Comments</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-user"></i> Users <i
                        class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo" class="collapse">
                    <li>
                        <a href="{{route('users.index')}}"> Show Users</a>
                    </li>
                    <li>
                        <a href="{{route('users.create')}}">Add user</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#media"><i class="fa fa-fw fa-wrench"></i>
                    Media <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="media" class="collapse">
                    <li>
                        <a href="{{route('media.index')}}"> Show Media</a>
                    </li>
                    <li>
                        <a href="{{route('media.create')}}">Upload File</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> Profile </a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
<div class="row">
    <div id="page-wrapper">

        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome To Admin Cms
                    <small>s.reza</small>
                </h1>
                <div id="wrapper">
                    @yield('content')
                </div>
            </div>
        </div>

        <!-- /.row -->
    </div>

    <!-- /.container-fluid -->

</div>


<!-- /#wrapper -->

<!-- jQuery -->
<script src="{{asset('js/jquery.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
@yield('script')
</body>

</html>
