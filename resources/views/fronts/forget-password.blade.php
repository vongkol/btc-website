@extends('layouts.front')
@section('content')
    <link href="{{asset('front/css/page.css')}}" rel="stylesheet">
    <!-- ***** Contact Us Area Start ***** -->
    <section class="footer-contact-area section_padding_100 clearfix" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <!-- Heading Text  -->
                    <div class="wellcome-heading">
                        <h2>Account Recovery</h2>
                        <div class="line-shape"></div><br>
                        <p>Enter the email you using with this Bill-Trade</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12">
                    @if(Session::has('sms'))
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div>
                                    {{session('sms')}}
                                </div>
                            </div>
                        @endif
                        @if(Session::has('sms1'))
                            <div class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div>
                                    {{session('sms1')}}
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="contact_from">
                        <form action="{{url('membership/recovery')}}" method="post" accept-charset="UTF-8">
                            {{csrf_field()}}
                            <div class="contact_input_area">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h4 class="text-white">Email</h4>
                                            <input type="email" class="form-control" value="{{old('email')}}" name="email" id="email" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn submit-btn  btn-warning">Send</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
 
    @endsection
