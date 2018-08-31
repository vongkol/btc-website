@extends('layouts.user')
@section('content')
<div class="row">
    <div class="col-sm-12">
        @foreach($ancs as $anc)
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <div>
                <h5>
                    <a href="{{url('/announcement/view/'.$anc->id)}}">{{$anc->title}}</a>
                </h5>
                <p class="text-danger">
                    {{$anc->short_description}}
                </p>
                <p>
                    <a href="{{url('/announcement/view/'.$anc->id)}}" class="btn btn-primary btn-sm">Read More</a>
                    <a href="{{url('/announcement/hide/'.$anc->id)}}" class="btn btn-success btn-sm">Hide</a>
                </p>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endforeach
    </div>
</div>
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
                            <a href="{{url('/investment')}}" class="btn btn-warning btn-sm">View Detail</a>
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
                        <span class="text-db text-warning">$ {{$user->score}}</span>
                        
                    </div>
                    <div class="text-center">
                        <a href="{{url('/earning')}}" class="btn btn-warning btn-sm">View Detail</a>
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
                        <a href="{{url('/downline')}}" class="btn btn-warning btn-sm">View Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h3 class="text-primary">Transaction This Month</h3>
            <table class="table">
                    <thead>
                        <tr>
                            <th>&numero;</th>
                            <th>Request Date</th>
                            <th>Request Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($pays as $l)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$l->request_date}}</td>
                                <td>$ {{$l->score}}</td>
                                <td>{{$l->status==1?'Approved':'Pending'}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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