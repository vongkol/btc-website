@extends('layouts.user')
@section('content')
<style>
    p, div{
        color: #000;
    }
</style>
<button type="button" id="sidebarCollapse" class="btn btn-dark">
    <i class="fa fa-dollar mr-8"></i> 
    <span>My Earning</span>
</button>
<hr>
<div class="row">
    <div class="col-sm-9">
        <div class="form-group row">
            <label for="" class="col-sm-3">Total Earning</label>
            <div class="col-sm-9">
                <strong>: $ {{$user->score}}</strong>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-3">&nbsp;</label>
            <div class="col-sm-9">
                <a href="{{url('/request')}}" class="btn btn-primary btn-sm">Request Payment</a>
            </div>
        </div>
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