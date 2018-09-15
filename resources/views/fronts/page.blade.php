@extends('layouts.front')
@section('content')
    @if($page->url == '/page/1')
    <link href="{{asset('front/css/page.css')}}" rel="stylesheet">
    <!-- ***** Contact Us Area Start ***** -->
    <section class="footer-contact-area section_padding_100 clearfix" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <!-- Heading Text  -->
                    <div class="wellcome-heading">
                        <h2>{{$page->title}}</h2>
                        <div class="line-shape"></div>
                    </div>
                    <div class="footer-text">
                        <p>{!!$page->description!!}</p>
                    </div>
                   <p>
                        If you have any problem or question, please send to this email: <a href="mailto:bt-team@bill-trade.com">bt-team@bill-trade.com</a>
                    </p>
                </div>
                <div class="col-md-6">
                    <!-- Form Start-->
                    
                </div>
            </div>
        </div>
    </section>
    @else 
         <!-- ***** Wellcome Area Start ***** -->
    <section class="wellcome_area section_padding_100" id="home">
        <div class="container">
            <div class="row h-100 align-items-center">
                <div class="col-md-12 section_padding_100">
                    <div class="wellcome-heading">
                        <h2>{{$page->title}}</h2>
                        <h4>Bill-Trade.</h4>
                        <p>{!!$page->description!!}</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Welcome thumb -->
        <div class="welcome-thumb wow fadeInDown" data-wow-delay="0.5s">
            <img src="{{asset('front/img/trade.png')}}" alt="">
        </div>
    </section>
    @endif
@endsection
