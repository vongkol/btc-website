@extends('layouts.user')
@section('content')
<style>
    p, div{
        color: #000;
    }
</style>
<button type="button" id="sidebarCollapse" class="btn btn-dark">
    <i class="fa fa-bell mr-8"></i> 
    <span>Announcement</span>
</button>
<hr>
<div class="row">
   <div class="col-sm-12">
       <h3>{{$anc->title}}</h3>
       <hr>
       {!!$anc->description!!}

   </div>
</div>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $("#menu>li").removeClass('active');
            $("#menu_announcement").addClass('active');
        });
    </script>
@endsection