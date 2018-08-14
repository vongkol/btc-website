@extends('layouts.user')
@section('content')
    <!-- ***** Contact Us Area Start ***** -->
<button type="button" id="sidebarCollapse" class="btn btn-dark">
    <i class="fa fa-bars mr-8"></i> 
    <span>Edit Profile</span>
</button>
<hr>
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
<form action="{{url('profile/update')}}" enctype="multipart/form-data"   method="post"  accept-charset="UTF-8" onsubmit="check(event)">
    {{csrf_field()}}
    <input type="hidden" name="id" value="{{$profile->id}}">
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group row">
                <label for="first_name" class="col-sm-3">First Name <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value="{{$profile->first_name}}" 
                        name="first_name" id="first_name" value="{{old('first_name')}}" placeholder="First Name" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="last_name" class="col-sm-3">Last Name <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value="{{$profile->last_name}}" 
                        name="last_name" id="last_name" value="{{old('last_name')}}" placeholder="Last Name" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="gender" class="col-sm-3">Gender <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    <select name="gender" class="form-control" id="gender">
                        <option value="Male"  {{$profile->gender=='Male'?'selected':''}}>Male</option>
                        <option value="Female"  {{$profile->gender=='Female'?'selected':''}}> Female </option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-3">Email <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" value="{{$profile->email}}" 
                        name="email" id="email"  value="{{old('email')}}" placeholder="E-mail" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="country" class="col-sm-3">country <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    <?php $countries = DB::table('apps_countries')->orderBy('name')->get();?>
                    <select name="country" id="country" class="form-control" required>
                        @foreach($countries as $c)
                            <option value="{{$c->name}}" {{$c->name==$profile->country?'selected':''}}>{{$c->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="city" class="col-sm-3">City</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="city" id="city" value="{{$profile->city}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="zipcode" class="col-sm-3">zipcode</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="zipcode" value="{{$profile->postal_code}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="username" class="col-sm-3">Username <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value="{{$profile->username}}" 
                        name="username" id="username"  value="{{old('username')}}"  required>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3">&nbsp;</label>
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary">Save Change</button>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <h4>Photo </h4>
                <input type="file" name="photo" accept="image/*" onchange="loadFile(event)" id="photo" class="form-control"><span class="text-danger">(120 x 120)</span><br>
            @if($profile->photo !== null)
                <img src="{{asset('/uploads/profiles/'.$profile->photo)}}" id="img" alt="" width="120">
            @else
                <img src="{{asset('/uploads/profiles/member.png')}}" id="img" alt="" width="120">
            @endif
        </div>
    </div>
</form>
    <script>
        function loadFile(e){
            var output = document.getElementById('img');
            output.src = URL.createObjectURL(e.target.files[0]);
        }
    </script>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $("#menu>li").removeClass('active');
            $("#menu_profile").addClass('active');
        });
    </script>
@endsection