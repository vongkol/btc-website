@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Edit Member&nbsp;&nbsp;
                    <a href="{{url('/admin/membership/')}}" class="btn btn-link btn-sm">
                        Back
                    </a>
                </div>
                <div class="card-block">
                       
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
                    <form action="{{url('admin/member/update')}}" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$m->id}}">
                        <div class="form-group row">
                            <label for="" class="control-label col-sm-2">First Name <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="first_name" 
                                value="{{$m->first_name}}" required name="first_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="control-label col-sm-2">Last Name <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="last_name" 
                                value="{{$m->last_name}}" required name="last_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="control-label col-sm-2">Gender</label>
                            <div class="col-sm-8">
                                <select name="gender" id="gender" class="form-control">
                                    <option value="Male" {{$m->gender=='Male'?'selected':''}}>Male</option>
                                    <option value="Female" {{$m->gender=='Female'?'selected':''}}>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="control-label col-sm-2">Email <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="email" 
                                value="{{$m->email}}" required name="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="control-label col-sm-2">Country</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="country" 
                                value="{{$m->country}}"  name="country">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="control-label col-sm-2">City</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="city" 
                                value="{{$m->city}}"  name="city">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="control-label col-sm-2">Zipcode</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="postal_code" 
                                value="{{$m->postal_code}}" name="postal_code">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="control-label col-sm-2">Username <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="username" 
                                value="{{$m->username}}" required name="username">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="control-label col-sm-2">Earning <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="score" 
                                value="{{$m->score}}" required name="score">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="control-label col-sm-2">Password</label>
                            <div class="col-sm-8">
                                <span>Leave this field blank to keep the old password.</span>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="control-label col-sm-2">&nbsp;</label>
                            <div class="col-sm-8">
                               <button class="btn btn-primary" type="submit">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection