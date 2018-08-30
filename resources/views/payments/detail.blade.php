@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Payment Request Detail&nbsp;&nbsp;
                    <a href="{{url('/admin/payment')}}" class="btn btn-link btn-sm">
                        Back
                    </a>
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-sm-6">
                            <h5 class="text-primary">Payment Request Information</h5>
                            <table class="table">
                                <tr>
                                    <td style="width:150px">Request Date</td>
                                    <td>: {{$payment->request_date}}</td>
                                </tr>
                                <tr>
                                    <td>Customer Name</td>
                                    <td>: {{$payment->first_name}} {{$payment->last_name}}</td>
                                </tr>
                                <tr>
                                    <td>Customer Email</td>
                                    <td>: {{$payment->email}}</td>
                                </tr>
                                <tr>
                                    <td>Request Status</td>
                                    <td>: {{$payment->status==0?'Pending':'Approved'}}</td>
                                </tr>
                                
                                <tr>
                                    <td>Request Amount</td>
                                    <td>: {{$payment->score}}</td>
                                </tr>
                                <tr>
                                    <td>Payment Address</td>
                                    <td>: {{$payment->payment_address}}</td>
                                </tr>
                                
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <h5 class="text-primary">Approve Payment</h5>
                            <hr>
                            @if($payment->status>0)
                                <p class="text-success">This request is already approved!</p>
                            @else
                                <a href="{{url('/admin/payment/approve/'.$payment->id)}}" onclick="return confirm('You wanto approve?')" class="btn btn-success">Approve This Order</a>
                            @endif
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection