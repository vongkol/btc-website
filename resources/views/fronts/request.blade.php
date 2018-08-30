@extends('layouts.user')
@section('content')
<style>
    p, div{
        color: #000;
    }
</style>
<button type="button" id="sidebarCollapse" class="btn btn-dark">
    <i class="fa fa-bars mr-8"></i> 
    <span>Request Payment</span>
</button>
<hr>
<div class="row">
    <div class="col-sm-12">
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
        <form action="{{url('/request/submit')}}" method="POST" class="form-horizontal">
            {{csrf_field()}}
            <div class="form-group row">
                <label for="" class="col-sm-3">Your Total Earning</label>
                <div class="col-sm-9 text-danger">
                    <strong>$ {{$user->score}}</strong>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3">Request Amount <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    <input type="number" name="score" id='score' required>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3" title="The address to recieve your payment.">BTC Address <span class="text-danger">*</span></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="address" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3">&nbsp;</label>
                <div class="col-sm-9">
                    <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
  
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $("#menu>li").removeClass('active');
            $("#menu_earning").addClass('active');
        });
    </script>
@endsection