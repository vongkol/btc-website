@extends('layouts.front')
@section('content')

<link href="{{asset('front/css/page.css')}}" rel="stylesheet">
<link href="{{asset('front/css/sidebar.css')}}" rel="stylesheet">
<link href="{{asset('front/css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <ul class="list-unstyled components ">
                <li>
                    <a href="#" class="text-white"> 
                        <i class="fa fa-briefcase"></i>
                        About
                    </a>
                </li>
                <li>
                    <a href="#" class="text-white"> 
                        <i class="fa fa-image"></i>
                        Portfolio
                    </a>
                </li>
                <li>
                    <a href="#" class="text-white"> 
                        <i class="fa fa-question"></i>
                        FAQ
                    </a>
                </li>
                <li>
                    <a href="#" class="text-white"> 
                        <i class="fa fa-paper-plane"></i>
                        Contact
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

        <button type="button" id="sidebarCollapse" class="btn btn-dark">
            <i class="fa fa-bars"></i>
            <span>Dashbord</span>
        </button>
        <p></p>
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-white bg-dark mb-3">
                        <div class="card-header"><span class="text-db">Total Investment</span>  <i class="fa fa-money fa-2x float-right"></i> </div>
                        <div class="card-body">
                            <small>Some quick</small>
                            <div>
                                <span class="text-db"><i class="fa fa-usd"></i> 0</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-dark mb-3">
                        <div class="card-header"><span class="text-db">Total Investment</span>  <i class="fa fa-money fa-2x float-right"></i> </div>
                        <div class="card-body">
                            <small>Some quick</small>
                            <div>
                                <span class="text-db"><i class="fa fa-usd"></i> 0</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-dark mb-3">
                        <div class="card-header"><span class="text-db">Total Investment</span>  <i class="fa fa-money fa-2x float-right"></i> </div>
                        <div class="card-body">
                            <small>Some quick</small>
                            <div>
                                <span class="text-db"><i class="fa fa-usd"></i> 0</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('front/js/jquery-3.3.1.slim.min.js')}}"></script>
    <!-- Popper.JS -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
@endsection