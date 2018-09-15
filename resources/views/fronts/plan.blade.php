@extends('layouts.front')
@section('content')
<section class="pricing-plane-area page-plan section_padding_100_90 clearfix" id="pricing">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2 class="text-plan text-white">Pricing Plan</h2>
                    <div class="line-shape"></div>
                </div>
            </div>
        </div>
        <div class="row text-center">
            @foreach($plans as $plan)
                <div class="col-md-3 col-lg-3 mobile-plan">
                    <div class="single-price-plan h-100 text-center">
                        <div class="package-plan">
                        <h5 class="text-primary"><b><strong>{{$plan->name}}</strong></b></h5>
                            
                        </div>
                        <div class="package-description" style="color: #726a84;">
                            {!! $plan->description !!}
                        </div>
                        <div class="btn1-plan">
                            <a href="{{url('/buyplan/'.$plan->id)}}" class="form-control btn btn-warning btn-plan">Buy Now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection