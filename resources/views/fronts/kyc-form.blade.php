@extends('layouts.user')
@section('content')
<style>
    p, div{
        color: #000;
    }
</style>

<button type="button" id="sidebarCollapse" class="btn btn-dark">
    <i class="fa fa-file mr-8"></i> 
    <span>Upload KYC</span>
</button>
<hr>
<form action="{{url('/kyc/save')}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="row">
        <div class="col-sm-8">
           <div class="form-group row">
               <label for="title" class="col-sm-3">Title <span class="text-danger">*</span></label>
               <div class="col-sm-9">
                   <input type="text" class="form-control" required autofocus name="title" id="title" value="{{old('title')}}">
               </div>
           </div>
            <div class="form-group row">
                <label for="file_name" class="col-sm-3">File Name <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    <input type="file" class="form-control" required name="file_name" id="file_name">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3">&nbsp;</label>
                <div class="col-sm-9">
                    <button class="btn btn-primary" type="submit">Upload Now</button>
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