@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Edit Earning&nbsp;&nbsp;
                    <a href="{{url('/admin/membership/detail/'.$member->id)}}" class="btn btn-link btn-sm">
                        Back
                    </a>
                </div>
                <div class="card-block">
                    @if(Session::has('sms'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div>
                                {{session('sms')}}
                            </div>
                        </div>
                    @endif

                    <div>
                        Full Name: {{$member->first_name}} {{$member->last_name}}
                    </div>
                    <div>
                        Email: {{$member->email}}
                        <p>&nbsp;</p>
                    </div>
                    <div>
                        <strong>Earning: $ </strong>
                        <hr>
                        <form action="{{url('admin/membership/score/update')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" value="{{$member->id}}" name="id">
                            <input type="number" name="score" value="{{$member->score}}">
                            <button type="submit">Update</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection