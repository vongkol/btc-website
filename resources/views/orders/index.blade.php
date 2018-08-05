@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Order List
                  
                </div>
                <div class="card-block">

                    <table class="tbl">
                        <thead>
                            <tr>
                                <th>&numero;</th>
                                <th>Order Date</th>
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                                <th>Plan Name</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $pagex = @$_GET['page'];
                                if(!$pagex)
                                $pagex = 1;
                                $i = 18 * ($pagex - 1) + 1;
                            ?>
                            @foreach($orders as $o)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>
                                        <a href="{{url('/admin/order/detail/'.$o->id)}}">{{$o->order_date}}</a>
                                    </td>
                                    <td>{{$o->first_name}} {{$o->last_name}}</td>
                                    <td>{{$o->cmail}}</td>
                                    <td>{{$o->name}}</td>
                                    <td>$ {{$o->price}}</td>
                                    <td>{{$o->status==0?'Pending':'Approved'}}</td>
                                    <td>
                                        <a href="{{url('/admin/order/delete/'.$o->id)}}" class="text-danger" onclick="return confirm('You want to delete?')">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table><br>
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection