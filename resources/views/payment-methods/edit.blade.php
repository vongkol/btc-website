@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Edit Payment Method&nbsp;&nbsp;
                    <a href="{{url('/admin/payment-method')}}" class="btn btn-link btn-sm">Back To List</a>
                </div>
                <div class="card-block">
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

                    <form 
                    	action="{{url('/admin/payment-method/update')}}" 
                    	class="form-horizontal" 
                        method="post"
                        charset="UTF-8"
                    >
                        {{csrf_field()}}
                        <input type="hidden" name="id" id="id" value="{{$pay->id}}">
                        <div class="form-group row">
                            <label for="bank" class="control-label col-lg-1 col-sm-2">
                            	Bank <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-8 col-sm-8">
                                <input 
                                    type="text" 
                                    required 
                                    autofocus 
                                    name="bank" 
                                    id="bank" 
                                    class="form-control"
                                    value="{{$pay->bank}}"
                                >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bank" class="control-label col-lg-1 col-sm-2">
                            	Crypto <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-8 col-sm-8">
                                <input 
                                    type="text" 
                                    required 
                                    name="crypto" 
                                    id="crypto" 
                                    class="form-control"
                                    value="{{$pay->crypto}}"
                                >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-lg-1 col-sm-2">&nbsp;</label>
                            <div class="col-lg-6 col-sm-8">
                                <button class="btn btn-primary" type="submit">Save Change</button>
                                <button class="btn btn-danger" type="reset">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection