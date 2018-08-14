@extends('layouts.user')
@section('content')
<style>
    p, div{
        color: #000;
    }
</style>

<button type="button" id="sidebarCollapse" class="btn btn-dark">
    <i class="fa fa-paper-plane mr-8"></i> 
    <span>Transaction</span>
</button>
<hr>
<div class="row">
    <div class="col-sm-12">
        <h4 class="text-danger">Your Total Earning: $ {{$user->score}}</h4>
        <p></p>
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
        {{$pays->links()}}
    </div>
</div>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $("#menu>li").removeClass('active');
            $("#menu_transaction").addClass('active');
        });
    </script>
@endsection