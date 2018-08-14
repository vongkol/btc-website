@extends('layouts.user')
@section('content')
<button type="button" id="sidebarCollapse" class="btn btn-dark">
    <i class="fa fa-user mr-8"></i> 
    <span>Reset Password</span>
</button>
<hr>
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
        <form action="{{url('membership/change-password')}}" method="post" id="form_provider" accept-charset="UTF-8" onsubmit="check(event)">
            {{csrf_field()}}
            <div class="form-group row">
                <label for="" class="col-sm-3">New Password</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3">Confirm Password</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" name="cpassword" id="cpassword" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3">&nbsp;</label>
                <div class="col-sm-9">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
    @endsection
