@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Plan List&nbsp;&nbsp;
                    <a href="{{url('/admin/plan/create')}}" class="btn btn-link btn-sm">
                        New
                    </a>
                </div>
                <div class="card-block">

                    <table class="tbl">
                        <thead>
                            <tr>
                                <th>&numero;</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($plans as $p)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$p->name}}</td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="{{url('/admin/plan/view/'.$p->id)}}" title="view"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-xs btn-info" href="{{url('/admin/plan/edit/'.$p->id)}}" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-xs btn-danger" href="{{url('/admin/plan/delete/'.$p->id)}}" onclick="return confirm('Do you want to delete?')" title="Delete"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table><br>
                    {{ $plans->links() }}
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection