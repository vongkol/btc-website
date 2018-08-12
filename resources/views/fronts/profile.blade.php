@extends('layouts.user')
@section('content')
<button type="button" id="sidebarCollapse" class="btn btn-dark">
    <i class="fa fa-user mr-8"></i> 
    <span>My Profile</span>
</button>
<hr>
<div class="row">
    <div class="col-sm-8">
        <div class="form-group row">
            <label for="" class="col-sm-3">Full Name</label>
            <div class="col-sm-9">
               : {{$profile->first_name}} {{$profile->last_name}}

            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-3">Gender</label>
            <div class="col-sm-9">
                : {{$profile->gender}}
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-3">Email</label>
            <div class="col-sm-9">
                : {{$profile->email}}
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-3">Country</label>
            <div class="col-sm-9">
                : {{$profile->country}}
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-3">City</label>
            <div class="col-sm-9">
                : {{$profile->city}}
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-3">Country Code</label>
            <div class="col-sm-9">
                : {{$profile->postal_code}}
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-3">Username</label>
            <div class="col-sm-9">
                : {{$profile->username}}
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <p>
            <strong class="text-primary">Photo</strong>
        </p>
        @if($profile->photo !== null)
            <img src="{{asset('/uploads/profiles/'.$profile->photo)}}" id="img" alt="" width="120">
        @else
            <img src="{{asset('/uploads/profiles/member.png')}}" id="img" alt="" width="120">
        @endif
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
            <h4 class="text-success">Referal Link</h4>
                 
            <input type="text" class="form-control" readonly value="{{url('/')}}?ref={{md5($profile->id)}}">
              <p></p>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
            
        <a href="{{url('profile/edit/'.$profile->id)}}">
            <button type="submit" class="btn submit-btn  btn-success">Edit Profile</button>
        </a>
        <a href="{{url('membership/reset-password')}}">
            <button type="submit" class="btn submit-btn btn-danger">Reset Password</button>
        </a>
    </div>
    
</div>
   
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $("#menu>li").removeClass('active');
            $("#menu_profile").addClass('active');
        });
    </script>
@endsection