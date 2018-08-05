@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Membership List&nbsp;&nbsp;
                    <a href="{{url('/admin/membership/create')}}" class="btn btn-link btn-sm">
                        New
                    </a>
                </div>
                <div class="card-block">

                    <table class="tbl">
                        <thead>
                            <tr>
                                <th>&numero;</th>
                                <th>Fullname</th>
                                <th>Email</th>
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
                            @foreach($memberships as $m)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>
                                        <a href="{{url('/admin/membership/detail/'.$m->id)}}">
                                            {{$m->first_name}} {{$m->last_name}}
                                        </a>
                                    </td>
                                    <td>
                                        {{$m->email}}
                                    </td>

                                    <td>
                                        <a class="btn btn-xs btn-info" href="{{url('/admin/membership/edit/'.$m->id)}}" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-xs btn-danger" href="{{url('/admin/membership/delete/'.$m->id)}}" onclick="return confirm('Do you want to delete?')" title="Delete"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table><br>
                    {{ $memberships->links() }}
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection