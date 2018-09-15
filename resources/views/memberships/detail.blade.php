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
                            <div class="form-group row">
                                <label for="" class="col-sm-3">Country</label>
                                <div class="col-sm-9">
                                    : {{$member->country}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3">City</label>
                                <div class="col-sm-9">
                                    : {{$member->city}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3">Zipcode</label>
                                <div class="col-sm-9">
                                    : {{$member->postal_code}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3">Username</label>
                                <div class="col-sm-9">
                                    : {{$member->username}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3">Earning</label>
                                <div class="col-sm-9">
                                    : $ {{$member->score}}
                                    <a href="{{url('/admin/membership/edit-score/'.$member->id)}}" class="btn btn-link">Edit Earning</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <strong>Apply KYC</strong>
                            <p></p>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <body>
                                  
                                @if($kyc!=null)
                                    <tr>
                                        <td>{{$kyc->first_name}}</td>
                                        <td>{{$kyc->last_name}}</td>
                                        <td>{{$kyc->phone}}</td>
                                        <td>{{$kyc->current_address}}</td>
                                        <td>
                                            {{$kyc->approved==1?'Approved':'Pending'}}
                                        </td>
                                        <td>
                                            <a href="{{url('/document/delete?id='.$member->id.'&dc='.$kyc->id)}}" class="btn btn-link text-danger" onclick="return confirm('You want to delete?')">Delete</a>
                                            @if($kyc->approved==0)
                                            <a href="{{url('/document/approve?id='.$member->id.'&dc='.$kyc->id)}}" class="btn btn-link">Approve</a>
                                            @else
                                                <a href="{{url('/document/deapprove?id='.$member->id.'&dc='.$kyc->id)}}" class="btn btn-link text-warning">De-approve</a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">
                                            <p>
                                                <strong>ID / Passport Front </strong>
                                                <a href="{{asset($kyc->file_name)}}">{{$kyc->file_name}}</a>
                                            </p>
                                            <p>
                                                <strong>ID / Passport Back </strong>
                                                <a href="{{asset($kyc->file_name1)}}">{{$kyc->file_name}}</a>
                                            </p>
                                        </td>
                                    </tr>
                                @endif
                                
                                </body>
                            </table>
                            @if($kyc==null)
                                <p class="text-danger">No KYC applied!</p>
                            @endif
                        </div>
                    </div>
                    </form>
                    <p>&nbsp;</p>
                    <strong class="text-danger">Order History</strong>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Order Date</th>
                                <th>Plan Name</th>
                                <th>Amount</th>
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
                    <p>&nbsp;</p>
                    <strong class="text-success">Payment Request History</strong>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Request Date</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($payments as $p)
                            <tr>
                                <td>{{$p->id}}</td>
                                <td>{{$p->request_date}}</td>
                                <td>$ {{$p->score}}</td>
                                <td>
                                    {{$p->status==1?'Approved':'Pending'}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p class="text-primary">
                        @if(count($payments)<=0)
                            You don't have any payment request yer!
                        @endif
                    </p>
                    <p>&nbsp;</p>
                    <strong class="text-info">Down Line</strong>
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