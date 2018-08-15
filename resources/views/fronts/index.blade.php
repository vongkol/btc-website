@extends('layouts.front')
@section('content')
    <?php 
        $slides = DB::table('slides')->where('active',1)->orderBy('order','asc')->get(); 
        $i = 1; 
        $c = 0;
    ?>
    <div id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            @foreach($slides as $s1)
                @if($c++ == 0)
                <li data-target="#demo" data-slide-to="$c" class="active"></li>
                @else 
                <li data-target="#demo" data-slide-to="$c"></li>
                @endif
            @endforeach
        </ul>
        <div class="carousel-inner">
            @foreach($slides as $slide)
                @if($i==1)
                    <div class="carousel-item active">
                        <img src="{{asset('front/slides/'.$slide->photo)}}" width="100%">
                        <div class="carousel-caption slide-text">
                        <h3 class="text-white">{{$slide->name}}</h3>
                        </div>   
                    </div>
                @else
                    <div class="carousel-item">
                        <img src="{{asset('front/slides/'.$slide->photo)}}" width="100%">
                        <div class="carousel-caption slide-text" >
                        <h3 class="text-white">{{$slide->name}}</h3>
                        </div>   
                    </div>
                @endif
                <?php $i++; ?>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>

    <section>
        <div class="special_description_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">

                        <div class="special_description_content">
                            <h2 class="text-center text-white">
                                <img src="{{asset('front/img/bitcoin-icon.png')}}" width="90" alt="">Cryptocurrency</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        {{-- <div class="more wow bounceInDown" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceInDown;">
                        <a href="https://coinmarketcap.com/" target="_blank">View All</a> --}}
        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="video-section">
        <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <script type="text/javascript" src="https://files.coinmarketcap.com/static/widget/currency.js"></script>
                <div id='btc1' class="coinmarketcap-currency-widget" data-currencyid="1" data-base="USD" data-secondary="" data-ticker="true" data-rank="false" data-marketcap="false" data-volume="false" data-stats="USD" data-statsticker="false"></div>
            </div>
            <div class="col-sm-6">
                <script type="text/javascript" src="https://files.coinmarketcap.com/static/widget/currency.js"></script>
                <div id='btc2' class="coinmarketcap-currency-widget" data-currencyid="1027" data-base="USD" data-secondary="" data-ticker="true" data-rank="false" data-marketcap="false" data-volume="false" data-stats="USD" data-statsticker="false"></div>
            </div>
        </div>
        </div>
    </section>

    <div class="video-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center text-video ">Spectre.ai Trading Platform</h2>
                    <div class="video-area">
                        <iframe width="100%" class="map" src="{{$video->url}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php  $plans = DB::table('plans')->where('active',1)->get();?>
    <section class="pricing-plane-area section_padding_100_70 clearfix" id="pricing">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Pricing Plan</h2>
                        <div class="line-shape"></div>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                @foreach($plans as $plan)
                    <div class="col-md-3 col-lg-3 mobile-plan">
                        <div class="single-price-plan h-100 text-center">
                            <div class="package-plan">
                                <h5>{{$plan->name}}</h5>
                                <div class="ca-price d-flex justify-content-center">
                                    <span>$</span><h4>{{$plan->price}}</h4>
                                </div>
                            </div>
                            <div class="package-description">
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

  <section class="our-monthly-membership section_padding_50">
      <div class="container">
          <div class="row align-items-center">
              <div class="col-md-8">
                  <div class="membership-description">
                      <h2>Sign Up</h2>
                      <p>Find the perfect plan for you — 100% satisfaction guaranteed.</p>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="get-started-button wow bounceInDown" data-wow-delay="0.5s">
                      <a href="{{url('/sign-up')}}">Get Started</a>
                  </div>
              </div>
          </div>
      </div>
    
  </section>
@endsection
