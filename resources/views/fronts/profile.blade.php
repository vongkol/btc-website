@extends('layouts.front')
@section('content')
    <link href="{{asset('front/css/page.css')}}" rel="stylesheet">
    <!-- ***** Contact Us Area Start ***** -->
    <section class="footer-contact-area section_padding_100 clearfix" id="contact">
        <div class="container">
            <h2 class="text-white">My Profile</h2>
        </div>
    </section>
    <section>
        <div class="container" style="margin-top: 54px">
            <div class="row">
                <div class="col-md-6">
                        <h2>{{$profile->first_name}} {{$profile->last_name}}</h2>
                        <hr>
                        
                        <div>
                            Email: {{$profile->email}}
                        </div>
                        <div>
                            Gender: {{$profile->gender}}
                        </div>
                        <div>
                            Username: {{$profile->username}}
                        </div>
                        <p></p>
                   
                    <a href="{{url('profile/edit/'.$profile->id)}}">
                        <button type="submit" class="btn submit-btn  btn-success">Edit Profile</button>
                    </a>
                    <a href="{{url('membership/reset-password')}}">
                        <button type="submit" class="btn submit-btn btn-danger">Reset Password</button>
                    </a>
                </div>
                <div class="col-md-6">
                  <h4 class="text-success">Referal Link</h4>
                 
                  <input type="text" class="form-control" readonly value="{{url('/')}}?ref={{md5($profile->id)}}">
                    <p></p>
                  <h4 class="text-success">My Score</h4>
                    <strong>
                        {{$profile->score}} BTs
                    </strong>
                </div>
            </div>
        </div>
        <p>&nbsp;</p>
        <hr>
    </section>
    <script>
        function loadFile(e){
            var output = document.getElementById('img');
            output.width = 120;
            output.src = URL.createObjectURL(e.target.files[0]);
        }
    </script>
@endsection