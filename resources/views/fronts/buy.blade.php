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
            <div class="col-sm-12">
                <p></p>
                <h3 class="text-primary">Plan Detail</h3>
                <hr>
                <form action="#" class="form-horizontal">
                    <div class="form-group row">
                        <label for="" class="col-sm-2">Plan Name</label>
                        <div class="col-sm-6">
                            : <strong>{{$plan->name}}</strong>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2">Plan Price</label>
                        <div class="col-sm-6">
                            : <strong>$ {{$plan->price}}</strong>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <strong>Description</strong>
                <hr>
                {!!$plan->description!!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form action="{{url('/confirm/buy')}}" class="form-horizontal" method="GET">
                    <input type="hidden" name="plan_id" value="{{$plan->id}}">
                    <div>
                        <strong>Payment Type</strong>
                    </div>
                    <div>
                        <select name="payment" id="payment" class="form-control col-sm-3">
                            <option value="cash">By Cash</option>
                            <option value="crypto">By Crypto</option>
                        </select>
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