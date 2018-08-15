@extends('layouts.front')
@section('content')
<section class="pricing-plane-area page-plan section_padding_100_90 clearfix" id="pricing">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2 class="text-plan text-white">Selecting A Plan</h2>
                    <div class="line-shape"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <p></p>
                <h3 class="text-primary">Plan Detail</h3>
                <hr>
                <form action="#" class="form-horizontal">
                    <div class="form-group row">
                        <label for="" class="col-sm-4">Plan Name</label>
                        <div class="col-sm-8">
                            : <strong>{{$plan->name}}</strong>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4">Plan Price</label>
                        <div class="col-sm-4">
                            : <strong>$ {{$plan->price}}</strong>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <strong>Description</strong>
                <hr>
                {!!$plan->description!!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <?php

                    $method = DB::table('payment_method')->where('id', 1)->first();
                ?>
                <form action="{{url('/confirm/buy')}}" class="form-horizontal" method="GET">
                    <input type="hidden" name="plan_id" value="{{$plan->id}}">
                    <div>
                        <strong>Payment Type</strong>
                    </div>
                    <div>
                        <select name="payment" id="payment" class="form-control col-sm-9" onchange="getMethod()">
                            {{-- <option value="cash">By Cash</option> --}}
                            <option value="crypto">By Cryptocurrency</option>
                        </select>
                    </div>
                    <p>&nbsp;</p>
                    <div>
                        <h5 class="text-danger">Please you pay to the following address:</h5>
                        <p></p>
                        <u><strong class="text-primary" id='method_title'>Pay By Cash</strong></u>
                        <br>
                        <div id="detail">
                            {{$method->crypto}}
                        </div>
                        <p>&nbsp;</p>
                    </div>
                   <div>
                       <p></p>
                       <button class="btn btn-warning" type="submit">Confirm Buying</button>
                   </div>
                </form>
                
            </div>
        </div>
        <div class="row">
            &nbsp;
        </div>
    </div>
</section>
@endsection
@section('js')
    <script>
        var burl = "{{url('/')}}";
        function getMethod()
        {
            var by = $("#payment").val();
            $.ajax({
                type: "GET",
                url: burl + "/method/get",
                success: function(data)
                {
                    data = JSON.parse(data);
                    if(by=='cash')
                    {
                        $("#method_title").html("Pay By Cash");
                        $("#detail").html(data.bank);
                    }
                    else{
                        $("#method_title").html("Pay By Cryptocurrency");
                        $("#detail").html(data.crypto);
                    }
                }
            });
        }
    </script>
@endsection