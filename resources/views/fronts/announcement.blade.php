@extends('layouts.user')
@section('content')
<style>
    p, div{
        color: #000;
    }
</style>
<button type="button" id="sidebarCollapse" class="btn btn-dark">
    <i class="fa fa-bell mr-8"></i> 
    <span>Announcement List</span>
</button>
<hr>
<div class="row">
   <div class="col-sm-12">
       <table class="table">
           <thead>
               <tr>
                   <th>&numero;</th>
                   <th>Title</th>
                   <th>Short Description</th>
               </tr>
           </thead>
           <tbody>
               @php($i=1)
               @foreach($ancs as $anc)
                <tr>
                    <td>{{$i++}}</td>
                    <td>
                        <a href="{{url('/announcement/view/'.$anc->id)}}" target="_blank">{{$anc->title}}</a>
                    </td>
                    <td>
                        {{$anc->short_description}}
                    </td>
                </tr>
               @endforeach
           </tbody>
       </table>
       <p></p>
       {{$ancs->links()}}
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