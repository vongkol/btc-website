@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Payment Method List
                  
                </div>
                <div class="card-block">

                    <table class="tbl">
                        <thead>
                            <tr>
                                <th>&numero;</th>
                                <th>Bank</th>
                                <th>Crypto</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                            ?>
                          @foreach($pays as $p)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$p->bank}}</td>
                                <td>{{$p->crypto}}</td>
                                <td>
                                    <a class="btn btn-xs btn-info" href="{{url('/admin/payment-method/edit/'.$p->id)}}" class="text-success"><i class="fa fa-pencil"></i></a>
                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection