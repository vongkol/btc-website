@extends('layouts.front')
@section('content')
    <link href="{{asset('front/css/page.css')}}" rel="stylesheet">
    <!-- ***** Contact Us Area Start ***** -->
    <section class="footer-contact-area section_padding_100 clearfix" id="contact">
        <div class="container">
            <h2 class="text-white">My Downlines</h2>
        </div>
    </section>
    <section>
        <div class="container" style="margin-top: 54px">
          
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
        </div>
        <p>&nbsp;</p>
        <hr>
        <p>&nbsp;</p>
    </section>
  
@endsection