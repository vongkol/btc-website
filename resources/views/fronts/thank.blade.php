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
                Thanks for your payment request. We are processing and will get back to you soon!
            </h3>
        </div>
    </div>
@endsection