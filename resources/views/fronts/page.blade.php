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
                    <div class="address-text">
                        <p><span>Address :</span> 40 Baria Sreet 133/2 NewYork City, US</p>
                    </div>
                    <div class="phone-text">
                        <p><span>Phone :</span> +11-225-888-888-66</p>
                    </div>
                    <div class="email-text">
                        <p><span>Email :</span> info.deercreative@gmail.com</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Form Start-->
                    <div class="contact_from">
                        <form action="#" method="post">
                            <!-- Message Input Area Start -->
                            <div class="contact_input_area">
                                <div class="row">
                                    <!-- Single Input Area Start -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" required>
                                        </div>
                                    </div>
                                    <!-- Single Input Area Start -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Your E-mail" required>
                                        </div>
                                    </div>
                                    <!-- Single Input Area Start -->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Your Message *" required></textarea>
                                        </div>
                                    </div>
                                    <!-- Single Input Area Start -->
                                    <div class="col-12">
                                        <button type="submit" class="btn submit-btn">Send Now</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Message Input Area End -->
                        </form>
                    </div>
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