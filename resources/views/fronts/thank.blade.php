@extends('layouts.user')
@section('content')
<style>
        p, div{
            color: #000;
        }
    </style>
    <button type="button" id="sidebarCollapse" class="btn btn-dark">
        <i class="fa fa-bars mr-8"></i> 
        <span>Payment Request</span>
    </button>
    <hr>
    <div class="row">
        <div class="col-sm-12">
            <h3 class="text-success">
                We are processing your request.
            </h3>
        </div>
    </div>
@endsection