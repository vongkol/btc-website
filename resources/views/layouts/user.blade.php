<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bill-Trade</title>

    <link rel="icon" href="img/core-img/favicon.ico">
    <link href="{{asset('front/style.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/page.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/sidebar.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <style>
        div#btc1>div>div:last-child{
            display: none;
        }
        div#btc2>div>div:last-child{
            display: none;
        }
    </style>
</head>
<body>
    <!-- ***** Header Area Start ***** -->
    <header class="header_area animated">
        <div class="container-fluid">
            <div class="row align-items-center">
                <!-- Menu Area Start -->
                <div class="col-md-9">
                    <div class="menu_area">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <!-- Logo -->
                            <a class="navbar-brand" href="{{url('/')}}">Bill-<span class="text-yellow">Trade</span></a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ca-navbar" aria-controls="ca-navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                            <!-- Menu Area -->
                            <div class="collapse navbar-collapse" id="ca-navbar">
                                <ul class="navbar-nav ml-auto" id="nav">
                                    <?php 
                                        $menus = DB::table('main_menus')->where('active',1)->orderBy('order_number')->get();
                                    ?>
                                    @foreach($menus as $m)
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{$m->url}}">{{$m->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="btn-group d-lg-none">
                                    <button type="button" class="btn btn-warning btn-member-left text-white btn-member dropdown-toggle" data-toggle="dropdown">
                                    {{session('membership')->first_name}} {{session('membership')->last_name}}
                                    </button>
                                
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item text-warning" href="{{url('/dashboard')}}">Dashboard</a>
                                        <a class="dropdown-item text-danger" href="{{url('membership/sign-out')}}">Sign Out</a>
                                    </div>
                                
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                <!-- Signup btn -->
                @if(Session::has('membership'))
                <div class="col-sm-3">
                    <div class="row">
                        <div class="sing-up-button d-none d-lg-block">
                            <div class="btn-group">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-warning btn-member-left text-white btn-member dropdown-toggle" data-toggle="dropdown">
                                    {{session('membership')->first_name}} {{session('membership')->last_name}}
                                    </button>
                                   
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item text-warning" href="{{url('/dashboard')}}">Dashboard</a>
                                        <a class="dropdown-item text-danger" href="{{url('membership/sign-out')}}">Sign Out</a>
                                    </div>
                                </div>
                                </div>
                        </div>
                    </div>
                </div>
                @else 
                <div class="col-sm-3">
                    <div class="row">
                        <div class="sing-up-button d-none d-lg-block">
                            <a href="{{url('sign-in')}}">Sign In</a>
                        </div>
                        <div class="sing-up-button d-none d-lg-block">
                            <a href="{{url('sign-up')}}">Sign Up</a>
                        </div>
                    </div>
                </div>
               
                @endif
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
    <div class="wrapper">
        <nav id="sidebar">
            <ul class="list-unstyled components" id="menu">
                <li id='menu_dashboard'>
                    <a href="{{url('/dashboard')}}" class="text-white">
                        <i class="fa fa-dashboard text-warning"></i> 
                        Dashboard
                    </a>
                </li>
                <li id='menu_profile'>
                    <a href="{{url('/profile')}}" class="text-white"> 
                        <i class="fa fa-user text-warning"></i>
                        Profile
                    </a>
                </li>
                <li id='menu_investment'>
                    <a href="{{url('/investment')}}" class="text-white"> 
                        <i class="fa fa-dollar text-warning"></i>
                        Investment
                    </a>
                </li>
                <li id='menu_earning'>
                    <a href="{{url('/earning')}}" class="text-white"> 
                        <i class="fa fa-th text-warning"></i>
                        Earning
                    </a>
                </li>
                <li id='menu_transaction'>
                    <a href="{{url('/transaction')}}" class="text-white"> 
                        <i class="fa fa-paper-plane text-warning"></i>
                        Transaction
                    </a>
                </li>
                <li id='menu_network'>
                    <a href="{{url('/downline')}}" class="text-white"> 
                        <i class="fa fa-globe text-warning"></i>
                        Network
                    </a>
                </li>
                <li id="menu_signout">
                    <a href="{{url('/membership/sign-out')}}" class="text-white">
                    <i class="fa fa-sign-out text-warning"></i> Sign Out</a>
                </li>
            </ul>
        </nav>

        <div id="content">
            @yield('content')
        </div>
    </div>


    <!-- ***** Footer Area Start ***** -->
    <footer class="footer-social-icon text-center section_padding_70">
        <!-- footer logo -->
        <div class="footer-text">
            <h2>Bill-<span class="text-yellow">Trade</span></h2>
        </div>
        <!-- social icon-->
        <?php $socials = DB::table('socials')->orderBy('order_number', 'asc')->where('active',1)->get();?>
        <div class="footer-social-icon">
            @foreach($socials as $social)
                <a href="{{$social->url}}"><img src="{{asset('uploads/socials/'.$social->icon)}}" width="40"></a>
            @endforeach
        </div>

        <?php $pages = DB::table('pages')->orderBy('id','desc')->where('active',1)->get();?>
        <div class="footer-menu">
            <nav>
                <ul>
                    @foreach($pages as $page)
                    <li><a href="{{url($page->url)}}">{{$page->title}}</a></li> 
                    @endforeach
                </ul>
            </nav>
        </div>
    </footer>
    <!-- ***** Footer Area Start ***** -->

    <!-- Jquery-2.2.4 JS -->
    <script src="{{asset('front/js/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('front/js/popper.min.js')}}"></script>
    <!-- Bootstrap-4 Beta JS -->
    <script src="{{asset('front/js/bootstrap.min.js')}}"></script>
    <!-- All Plugins JS -->
    <script src="{{asset('front/js/plugins.js')}}"></script>
    
    <!-- Active JS -->
    <script src="{{asset('front/js/active.js')}}"></script>
    <script src="{{asset('front/js/jquery-3.3.1.slim.min.js')}}"></script>
    <!-- Popper.JS -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    @yield('js')
</body>

</html>
