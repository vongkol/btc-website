@extends('layouts.front')
@section('content')
    <link href="{{asset('front/css/page.css')}}" rel="stylesheet">
    <!-- ***** Contact Us Area Start ***** -->
    <section class="footer-contact-area section_padding_100 clearfix" id="contact">
        <div class="container">
            <h2 class="text-white">My Orders</h2>
        </div>
    </section>
    <section>
        <div class="container" style="margin-top: 54px">
            <p>
                <a href="{{url('/plan')}}">New Order</a>
            </p>
            <table class="table">
                <thead>
                    <tr>
                        <th>&numero;</th>
                        <th>Order Date</th>
                        <th>Plan Name</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Payment Type</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i=1)
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$order->order_date}}</td>
                            <td>{{$order->name}}</td>
                            <td>$ {{$order->price}}</td>
                            <td>{{$order->status==1?'Approved':'Pending'}}</td>
                            <td>{{$order->payment_type}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <p>&nbsp;</p>
        <hr>
    </section>
  
@endsection