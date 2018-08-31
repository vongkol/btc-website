@extends('layouts.user')
@section('content')
<style>
    p, div{
        color: #000;
    }
</style>

<button type="button" id="sidebarCollapse" class="btn btn-dark">
    <i class="fa fa-file mr-8"></i> 
    <span>My KYC</span>
</button>
<hr>
<div class="row">
    <div class="col-sm-12">
       
        <table class="table">
            <thead>
                <tr>
                    <th>&numero;</th>
                    <th>Title</th>
                    <th>File Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php($i=1)
                @foreach($kycs as $l)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$l->title}}</td>
                        <td>
                            <a href="{{asset($l->file_name)}}" target="_blank">{{$l->file_name}}</a>
                        </td>
                        <td>{{$l->approved==1?'Approved':'Pending'}}</td>
                        <td>
                            <a href="{{url('/kyc/delete/'.$l->id)}}" class="text-danger" onclick="return confirm('You want to delete?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center">
        <a href="{{url('/kyc/create')}}" class="btn btn-primary">Upload KYC</a>
        </div>
        @if(count($kycs)<=0)
        <div class="text-danger">You have any KYC apply yet!</div>
        @endif
    </div>
</div>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $("#menu>li").removeClass('active');
            $("#menu_kyc").addClass('active');
        });
    </script>
@endsection