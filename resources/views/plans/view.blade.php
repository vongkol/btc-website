@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Detail Plan&nbsp;&nbsp;
                    <a href="{{url('/admin/plan')}}" class="btn btn-link btn-sm">Back To List</a>
                </div>
                <div class="card-block">
                    <div class="form-group row">
                        <label for="title" class="control-label col-lg-12 col-sm-12">
                            <p class="text-primary">Title</p>
                            <p>{{$plan->name}}</p>
                        </label>
                    </div>
                   
                    <div class="form-group row">
                        <label for="description" class="control-label col-lg-12 col-sm-12">
                            <p class="text-primary">Description</p>
                            <p>{!!$plan->description!!}</p>
                        </label>
                    </div>       
                </div>
            </div>
        </div>
    </div>
@endsection