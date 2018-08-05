@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Order Detail&nbsp;&nbsp;
                    <a href="{{url('/admin/order')}}" class="btn btn-link btn-sm">
                        Back
                    </a>
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-sm-6">
                            <h5 class="text-primary">Order Information</h5>
                            <table class="table">
                                <tr>
                                    <td style="width:150px">Order Date</td>
                                    <td>: {{$order->order_date}}</td>
                                </tr>
                                <tr>
                                    <td>Customer Name</td>
                                    <td>: {{$customer->first_name}} {{$customer->last_name}}</td>
                                </tr>
                                <tr>
                                    <td>Customer Email</td>
                                    <td>: {{$customer->email}}</td>
                                </tr>
                                <tr>
                                    <td>Order Status</td>
                                    <td>: {{$order->status==0?'Pending':'Approved'}}</td>
                                </tr>
                                <tr>
                                    <td>Payment Type</td>
                                    <td>: {{$order->payment_type}}</td>
                                </tr>
                                <tr>
                                    <td>Plan Name</td>
                                    <td>: {{$plan->name}}</td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td>: $ {{$plan->price}}</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Description</td>
                                </tr>
                                <tr>
                                    <td colspan="2">{!!$plan->description!!}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <h5 class="text-primary">Approve Order</h5>
                            <hr>
                            @if($order->status>0)
                                <p class="text-success">This order is already approved!</p>
                            @else
                                <a href="{{url('/admin/order/approve/'.$order->id)}}" onclick="return confirm('You wanto approve?')" class="btn btn-success">Approve This Order</a>
                            @endif
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection