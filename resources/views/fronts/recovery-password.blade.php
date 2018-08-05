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
                        <h2>Reset Password</h2>
                        <div class="line-shape"></div><br>
                        <p>Reset new Password here!</p>
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
                        <form action="{{url('/membership/service/update')}}" method="post" id="form_provider" accept-charset="UTF-8" onsubmit="check(event)">
                        {{csrf_field()}}
                            <div class="contact_input_area">
                                <div class="row">
                                    <input type="hidden" id="id" name="id" value="{{$id}}"><br>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h4 class="text-white">New Password </h4>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="******" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h4 class="text-white">Confirm Password </h4>
                                            <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="******" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn submit-btn  btn-warning">Reset Password</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Message Input Area End -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script charset="utf-8" type="text/javascript">
            function check(event)
            {
                var password = document.getElementById("password").value;
                var confirm_password = document.getElementById("cpassword").value;
                    if( password != confirm_password) {
                        document.getElementById("cpassword").style.border="4px solid red";
                        alert("Your password and confirm password is not matched!")
                        event.preventDefault();
                    }
                    
                    if( password === confirm_password){
                        if(password.length < 6 ){
                            alert("Your password should be equal or max than 6 characters");
                            document.getElementById("password").style.border="4px solid red";
                            event.preventDefault();
                        } else {
                            document.getElementById("password").style.border="4px solid green";
                            document.getElementById("form_provider").submit();
                        }
                    }  
            }
        </script>
    </section>
 
    @endsection
