@extends('layouts.front')
@section('content')
    <link href="{{asset('front/css/page.css')}}" rel="stylesheet">
    <section class="footer-contact-area wellcome_area section_padding_100 ">
        <div class="container">
        <h1 class="text-white">Register</h1>
        </div>
    </section>
    <p></p>
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
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
                <form action="{{url('sign-up/save')}}" method="post" id="form_provider" onsubmit="check(event)">
                    {{csrf_field()}}
                    <div class="form-group row">
                        <label for="" class="col-sm-3">Sponsor ID</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{$ref}}" name="ref">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-3">First Name <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="first_name" class="form-control" value="{{old('first_name')}}" required>
                        </div>
                        
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-3">Last Name <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="last_name" value="{{old('last_name')}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-3">Gender</label>
                        <div class="col-sm-9">
                            <select name="gender" class="form-control">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-3">Email <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" id="m1" value="{{old('email')}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-3">Repeat Email <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="remail" id="remail"  value="{{old('email')}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-3">Country <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select name="country" id="country" class="form-control">
                                @foreach($countries as $c)
                                    <option value="{{$c->name}}">{{$c->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-3">City <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="city" class="form-control" required value="{{old('city')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-3">Zipcode <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="zipcode" class="form-control" required value="{{old('postal_code')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-3">Username <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="username" id="username"  value="{{old('username')}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-3">Password <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password" id="pass" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-3">Confirm Password <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="cpassword" id="cpass" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-3">Terms <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                                <label>
                                    <input type="checkbox" id="term" > 
                                    I accept the terms and conditions of Bil-Trade.
                                    <a href="{{asset(url('/page/3'))}}" target="_blank">View terms and conditions</a>
                                </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-3">&nbsp;</label>
                        <div class="col-sm-9">
                            <button class="btn submit-btn">Sign Up</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

        {{-- <div class="container" style="margin-top: 54px">
            <div class="row">
                <div class="col-sm-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <p class="text-white" id="text-white"> 
                                        
                                    </p>
                                </div>
                            </div>
                           
                            <div class="col-12">
                                <button type="submit" class="btn submit-btn">Sign Up</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}

    <script charset="utf-8" type="text/javascript">
        function check(event)
        {
            var password = document.getElementById("pass").value;
            var confirm_password = document.getElementById("cpass").value;
            var term = document.getElementById("term").checked;
            var m = document.getElementById("m1").value;
            var m1 = document.getElementById('remail').value;
             
            if(m!=m1)
            {
                document.getElementById("remail").style.border = "4px solid red";
                alert("Email and repeat email is not mached!");
                event.preventDefault();
            }
                if( password != confirm_password) {
                   
                    document.getElementById("cpassword").style.border="4px solid red";
                    alert("Your password and confirm password is not matched!")
                    event.preventDefault();
                } 
                if (password == confirm_password && term === false){
                    alert("Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy!")
                    event.preventDefault();
                }
                
                if( password === confirm_password && term === true){
                    if(password.length < 6 ){
                        alert("Your password should be equal or max than 6 characters");
                        document.getElementById("password").style.border="4px solid red";
                        event.preventDefault();
                    } else {
                        document.getElementById("form_provider").submit();
                    }
                }  
        }
    </script>
    @endsection
