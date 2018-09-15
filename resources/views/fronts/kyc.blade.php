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
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @if($kyc!=null)
                <tr>
                    <td>{{$kyc->first_name}}</td>
                    <td>{{$kyc->last_name}}</td>
                    <td>{{$kyc->current_address}}</td>
                    <td>{{$kyc->phone}}</td>
                    <td>{{$kyc->approved==1?'Approved':'Pending'}}</td>
                    <td>
                        <a href="{{url('/kyc/edit/'.$kyc->id)}}" class="text-success">Edit</a> | 
                        <a href="{{url('/kyc/delete/'.$kyc->id)}}" class="text-danger" onclick="return confirm('You want to delete?')">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        <p>
                            <strong>ID / Passport Front: </strong> 
                            <a href="{{asset($kyc->file_name)}}" target="_blank">{{$kyc->file_name}}</a>
                        </p>
                        <p>
                            <strong>ID / Passport Back: </strong> 
                            <a href="{{asset($kyc->file_name1)}}" target="_blank">{{$kyc->file_name1}}</a>
                        </p>
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
        
        @if($kyc==null)
        <div class="text-danger">You don't have any KYC apply yet!</div>
            <div class="text-center">
                <a href="{{url('/kyc/create')}}" class="btn btn-primary">Apply KYC</a>
            </div>
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