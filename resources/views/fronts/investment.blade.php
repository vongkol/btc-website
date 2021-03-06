@extends('layouts.user')
@section('content')
<style>
    p, div{
        color: #000;
    }
</style>
<button type="button" id="sidebarCollapse" class="btn btn-dark">
    <i class="fa fa-bars mr-8"></i> 
    <span>My Investment</span>
</button>
<hr>
<div class="row">
    <div class="col-sm-9">
        @if($plan!=null)
        <div class="form-group row">
            <label for="" class="col-sm-3">Plan Name</label>
            <div class="col-sm-9">
                <strong>{{$plan->name}}</strong>
            </div>
        </div>
       
        <div class="form-group row">
            <label for="" class="col-sm-3">Invest Amount</label>
            <div class="col-sm-9">
                <strong>$ {{$plan->amount}}</strong>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-3">Order Date</label>
            <div class="col-sm-9">
                <strong>{{$plan->order_date}}</strong>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-3">Status</label>
            <div class="col-sm-9">
                <strong>{{$plan->status==1?'Approved':'Pending'}}</strong>
            </div>
           
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-3"><strong>Description</strong></label>
          
        </div>
        <div class="form-group row">
            <div class="col-sm-12">
                {!!$plan->description!!}
            </div>
        </div>
        @else
            <h5 class="text-danger">You don't have an investment yet!</h5>
            <a href="{{url('/plan')}}" class="btn btn-warning btn-sm">New Investment</a>
        @endif
    </div>
</div>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $("#menu>li").removeClass('active');
            $("#menu_investment").addClass('active');
        });
    </script>
@endsection