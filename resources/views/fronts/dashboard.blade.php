@extends('layouts.user')
@section('content')
    <button type="button" id="sidebarCollapse" class="btn btn-dark">
        <i class="fa fa-bars mr-8"></i>
        <span>Dashbord</span>
    </button>
    <p></p>
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-dark mb-3">
                <div class="card-header"><span class="text-db">Total Investment</span>  <i class="fa fa-money fa-2x float-right"></i> </div>
                <div class="card-body">
                    <small>Some quick</small>
                    <div>
                        <span class="text-db"><i class="fa fa-usd"></i> 0</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-dark mb-3">
                <div class="card-header"><span class="text-db">Total Investment</span>  <i class="fa fa-money fa-2x float-right"></i> </div>
                <div class="card-body">
                    <small>Some quick</small>
                    <div>
                        <span class="text-db"><i class="fa fa-usd"></i> 0</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-dark mb-3">
                <div class="card-header"><span class="text-db">Total Investment</span>  <i class="fa fa-money fa-2x float-right"></i> </div>
                <div class="card-body">
                    <small>Some quick</small>
                    <div>
                        <span class="text-db"><i class="fa fa-usd"></i> 0</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $("#menu>li").removeClass('active');
            $("#menu_dashboard").addClass('active');
        });
    </script>
@endsection