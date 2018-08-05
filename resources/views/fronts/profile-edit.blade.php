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
                        <h2>Edit Profile</h2>
                        <div class="line-shape"></div><br>
                        <p>Edit Profile here!</p>
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
                        <form action="{{url('profile/update')}}" enctype="multipart/form-data"   method="post"  accept-charset="UTF-8" onsubmit="check(event)">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$profile->id}}">
                            <div class="contact_input_area">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h4 class="text-white">First Name </h4>
                                            <input type="text" class="form-control" value="{{$profile->first_name}}" name="first_name" id="first_name" value="{{old('first_name')}}" placeholder="First Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h4 class="text-white">Last Name </h4>
                                            <input type="text" class="form-control" value="{{$profile->last_name}}" name="last_name" id="last_name"  value="{{old('last_name')}}"  placeholder="Last Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h4 class="text-white">Gender</h4>
                                            <select name="gender" class="form-control" id="gender">
                                                <option value="Male"  {{$profile->gender=='Male'?'selected':''}}>Male</option>
                                                <option value="Female"  {{$profile->gender=='Female'?'selected':''}}> Female </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h4 class="text-white">Email </h4>
                                            <input type="email" class="form-control" value="{{$profile->email}}" name="email" id="email"  value="{{old('email')}}" placeholder="E-mail" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                            <div class="form-group">
                                                <h4 class="text-white">Username </h4>
                                                <input type="text" class="form-control" value="{{$profile->username}}" name="username" id="username"  value="{{old('username')}}"  required>
                                            </div>
                                        </div>
                                    <div class="col-md-12">
                                        <h4 class="text-white">Photo </h4>
                                        <input type="file" name="photo" accept="image/*" onchange="loadFile(event)" id="photo" class="form-control"><span class="text-danger">(120 x 120)</span><br>
                                        @if($profile->photo !== null)
                                        <img src="{{asset('/uploads/profiles/'.$profile->photo)}}" id="img" alt="" width="120">
                                        @else
                                        <img src="{{asset('/uploads/profiles/member.png')}}" id="img" alt="" width="120">
                                        @endif
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="pd10">
                                            <button type="submit" class="btn submit-btn  btn-success-c">Save Change</button>
                                            <a href="{{url('/profile')}}"><button type="button" class="btn submit-btn  btn-danger-c">Back to Profile</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function loadFile(e){
            var output = document.getElementById('img');
            output.src = URL.createObjectURL(e.target.files[0]);
        }
    </script>
@endsection
