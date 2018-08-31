@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Announcement List&nbsp;&nbsp;
                    <a href="{{url('/admin/announcement/create')}}" class="btn btn-link btn-sm">
                        New
                    </a>
                </div>
                <div class="card-block">

                    <table class="tbl">
                        <thead>
                            <tr>
                                <th>&numero;</th>
                                <th>Title</th>
                                <th>Short Description</th>
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
                            @foreach($announcements as $n)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$n->title}}</td>
                                    <td>{{$n->short_description}}</td>
                                    
                                    <td>
                                        <a class="btn btn-xs btn-info" href="{{url('/admin/announcement/edit/'.$n->id)}}" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-xs btn-danger" href="{{url('/admin/announcement/delete/'.$n->id)}}" onclick="return confirm('Do you want to delete?')" title="Delete"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table><br>
                    {{ $announcements->links() }}
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection