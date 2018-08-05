@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Member Detail &nbsp;&nbsp;
                    <a href="{{url('/admin/membership/')}}" class="btn btn-link btn-sm">
                        Back
                    </a>
                </div>
                <div class="card-block">
                    <form class="form-horizontal">
                    <div class="row">
                        <div class="col-sm-6">
                            <strong>Member Information</strong>
                            <hr>
                            <div class="form-group row">
                                <label for="" class="control-label col-sm-3">Member ID</label>
                                <div class="col-sm-9">
                                    : {{$member->id}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="control-label col-sm-3">Full Name</label>
                                <div class="col-sm-9">
                                    : {{$member->first_name}} {{$member->last_name}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3">Gender</label>
                                <div class="col-sm-9">
                                    : {{$member->gender}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3">Email</label>
                                <div class="col-sm-9">
                                    : {{$member->email}}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <strong>Score: {{$member->score}}</strong>
                            <hr>
                            <a href="{{url('/admin/membership/edit-score/'.$member->id)}}" class="btn btn-warning">Edit Score</a>
                        </div>
                    </div>
                    </form>
                    <p></p>
                    <strong class="text-danger">Order History</strong>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Order Date</th>
                                <th>Plan Name</th>
                                <th>Price</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <body>
                            @foreach($orders as $d)
                                <tr>
                                    <td>{{$d->id}}</td>
                                    <td>
                                        <a href="{{url('/admin/order/detail/'.$d->id)}}">
                                            {{$d->order_date}}
                                        </a>
                                    </td>
                                    <td>{{$d->name}}</td>
                                    <td>$ {{$d->price}}</td>
                                    <td>{{$d->status==0?'Pending':'Approved'}}</td>
                                </tr>
                            @endforeach
                        </body>
                    </table>
                    <p></p>
                    <hr>
                    <strong class="text-success">Payment Request History</strong>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Request Date</th>
                                <th>Score</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                    </table>
                    <p class="text-primary">
                        @if(count($payments)<=0)
                            You don't have any payment request yer!
                        @endif
                    </p>
                    <p></p>
                    <strong class="text-success">Down Line</strong>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Gender</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lowers as $d)
                                <tr>
                                    <td>{{$d->id}}</td>
                                    <td>
                                        <a href="{{url('/admin/membership/detail/'.$d->id)}}">
                                            {{$d->first_name}} {{$d->last_name}}
                                        </a>
                                    </td>
                                    <td>
                                        {{$d->gender}}
                                    </td>
                                    <td>{{$d->email}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p class="text-warning">
                        @if(count($lowers)<=0)
                            You don't have any downline yet!
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection