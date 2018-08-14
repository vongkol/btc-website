@extends('layouts.user')
@section('content')
<style>
        p, div{
            color: #000;
        }
    </style>
    <button type="button" id="sidebarCollapse" class="btn btn-dark">
        <i class="fa fa-bars mr-8"></i> 
        <span>My Network</span>
    </button>
    <hr>
    <table class="table">
            <thead>
                <tr>
                    <th>&numero;</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Register Date</th>
                </tr>
            </thead>
            <tbody>
                @php($i=1)
                @foreach($lines as $l)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$l->first_name}}</td>
                        <td>{{$l->last_name}}</td>
                        <td>{{$l->gender}}</td>
                        <td>{{$l->email}}</td>
                        <td>{{$l->create_at}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $("#menu>li").removeClass('active');
            $("#menu_network").addClass('active');
        });
    </script>
@endsection