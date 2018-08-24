@extends('layouts.front')
@section('content')
<section class="pricing-plane-area page-plan section_padding_100_90 clearfix">

</section>
<section class="clearfix">
    <div class="container">
        <p>&nbsp;</p>
        <h2 class="text-primary">
            {{$news->title}}
        </h2>
        <div class="row">
            <div class="col-sm-12">
                {!!$news->description!!}
            </div>
        </div>
    </div>
</section>
@endsection