@extends('layouts.front')
@section('content')
    <link href="{{asset('front/css/page.css')}}" rel="stylesheet">
    <!-- ***** Contact Us Area Start ***** -->
    <section class="footer-contact-area section_padding_100 clearfix" id="contact">
        <div class="container">
            <h2 class="text-white">Payment Requests</h2>
        </div>
    </section>
    <section>
        <div class="container" style="margin-top: 54px">
          <p>
              <a href="{{url('/request')}}">New Request</a>
          </p>
            <table class="table">
                <thead>
                    <tr>
                        <th>&numero;</th>
                        <th>Request Date</th>
                        <th>Score Request</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i=1)
                    @foreach($pays as $l)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$l->request_date}}</td>
                            <td>{{$l->score}}</td>
                            <td>{{$l->amount}}</td>
                            <td>{{$l->status==1?'Approved':'Pending'}}</td>
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