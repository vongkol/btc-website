@extends('layouts.user')
@section('content')
<style>
    p, div{
        color: #000;
    }
</style>

<button type="button" id="sidebarCollapse" class="btn btn-dark">
    <i class="fa fa-file mr-8"></i> 
    <span>Edit KYC</span>
</button>
<hr>
<form action="{{url('/kyc/update')}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="hidden" value="{{$kyc->id}}" name="id">
    <div class="row">
        <div class="col-sm-8">
           <div class="form-group row">
               <label for="first_name" class="col-sm-3">First Name <span class="text-danger">*</span></label>
               <div class="col-sm-9">
                   <input type="text" class="form-control" required autofocus name="first_name" id="first_name" value="{{$kyc->first_name}}">
               </div>
           </div>
           <div class="form-group row">
                <label for="last_name" class="col-sm-3">Last Name <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" required autofocus name="last_name" id="last_name" value="{{$kyc->last_name}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="current_address" class="col-sm-3">Address <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" required autofocus name="current_address" id="current_address" value="{{$kyc->current_address}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="phone" class="col-sm-3">Phone Number <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    
                    <input type="text" class="form-control" required autofocus name="phone" id="phone" value="{{$kyc->phone}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="file_name" class="col-sm-3">File Name 1</label>
                <div class="col-sm-9">
                    <div class="text-info">Leave this field empty to keep the onle one.</div>
                    <input type="file" class="form-control" name="file_name" id="file_name">
                </div>
            </div>
            <div class="form-group row">
                <label for="file_name1" class="col-sm-3">File Name 2</label>
                <div class="col-sm-9">
                    <div class="text-info">Leave this field empty to keep the onle one.</div>
                    <input type="file" class="form-control" name="file_name1" id="file_name1">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3">&nbsp;</label>
                <div class="col-sm-9">
                    <button class="btn btn-primary" type="submit">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $("#menu>li").removeClass('active');
            $("#menu_kyc").addClass('active');
        });
    </script>
@endsection