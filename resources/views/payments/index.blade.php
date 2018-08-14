@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Payment List
                  
                </div>
                <div class="card-block">

                    <table class="tbl">
                        <thead>
                            <tr>
                                <th>&numero;</th>
                                <th>Request Date</th>
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                                <th>Score</th>
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
                          @foreach($pays as $p)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>
                                    <a href="{{url('/admin/payment/detail/'.$p->id)}}">{{$p->request_date}}</a>
                                </td>
                                <td>{{$p->first_name}} {{$p->last_name}}</td>
                                <td>{{$p->email}}</td>
                                <td>$ {{$p->score}}</td>
                                <td>{{$p->status==1?'Approved':'Pending'}}</td>
                                <td>
                                    <a href="{{url('/admin/payment/delete/'.$p->id)}}" class="text-danger" onclick="return confirm('You want to delete?')">Delete</a>
                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table><br>
                    {{ $pays->links() }}
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection