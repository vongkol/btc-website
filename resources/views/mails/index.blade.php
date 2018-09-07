@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Message List&nbsp;&nbsp;
                    <a href="{{url('/admin/mail/create')}}" class="btn btn-link btn-sm">
                        New
                    </a>
                </div>
                <div class="card-block">

                    <table class="tbl">
                        <thead>
                            <tr>
                                <th>&numero;</th>
                                <th>Subject</th>
                                <th>Send Date</th>
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
                            @foreach($mails as $n)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>
                                        <a href="{{url('admin/mail/view/'.$n->id)}}">{{$n->subject}}</a>
                                    </td>
                                    <td>{{$n->send_date}}</td>
                                  
                                    <td>
                                       
                                        <a class="btn btn-xs btn-danger" href="{{url('/admin/mail/delete/'.$n->id)}}" onclick="return confirm('Do you want to delete?')" title="Delete"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table><br>
                    {{ $mails->links() }}
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection