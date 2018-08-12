@extends('layouts.user')
@section('content')
<button type="button" id="sidebarCollapse" class="btn btn-dark">
    <i class="fa fa-dollar mr-8"></i> 
    <span>My Investment</span>
</button>
<hr>
<div class="row">
    <div class="col-sm-12">
        Hi
    </div>
</div>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $("#menu>li").removeClass('active');
            $("#menu_investment").addClass('active');
        });
    </script>
@endsection