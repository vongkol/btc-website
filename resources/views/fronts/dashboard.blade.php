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
                <div class="card-header"><span class="text-db">Total Investment</span>  <i class="fa fa-dollar text-warning fa-2x float-right"></i> </div>
                <div class="card-body">
                    @if($plan==null)
                        <div class="text-center text-white">
                            <strong>No Investment Yet!</strong>
                        </div>
                        <div class="text-white text-center">
                            <a href="{{url('/plan')}}" class="btn btn-warning btn-sm">New investment!</a>
                        </div>
                    @else
                        <div class="text-center text-white">
                            {{$plan->name}} : <span class="text-warning">$ {{$plan->price}}</span>
                        </div>
                        <div class="text-warning text-center">
                            <a href="#" class="btn btn-warning btn-sm">View Detail</a>
                        </div>
                    @endif
                    <div>
                       {{-- <i class="fa fa-dollar text-warning"></i> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-dark mb-3">
                <div class="card-header"><span class="text-db">Total Earning</span>  <i class="fa fa-money text-warning fa-2x float-right"></i> </div>
                <div class="card-body">
                    <div class="text-center text-white">
                        So far earning ...
                    </div>
                    <div>
                        
                        <span class="text-db text-warning">$ {{$user->score}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-dark mb-3">
                <div class="card-header"><span class="text-db">Total Network</span>  <i class="fa fa-money fa-2x float-right"></i> </div>
                <div class="card-body">
                    <div class="text-center text-white">
                        Downline: {{$line}}
                    </div>
                    <div class="text-center">
                        <a href="#" class="btn btn-warning btn-sm">View Detail</a>
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