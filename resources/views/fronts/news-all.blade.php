@extends('layouts.front')
@section('content')
<section class="pricing-plane-area page-plan section_padding_100_90 clearfix">
   
</section>
<section class="clearfix">
    <div class="container">
        <p>&nbsp;</p>
       <h2 class="text-primary">All News</h2>
       <hr>
       <div class="row">
           @foreach($news as $n)
           <div class="col-sm-3">
                <img src="{{asset('uploads/news/'.$n->featured_image)}}" alt="" class="img-thumbnail">
                <p></p>
                <h5>
                    <a href="{{url('/news/'.$n->id)}}">{{$n->title}}</a>
                </h5>
                <div class="text-justify">
                    {{$n->short_description}}
                </div>
                <p></p>
                <p>
                    <a href="{{url('/news/'.$n->id)}}">Read More >></a>
                </p>
            </div>
           @endforeach
       </div>
       <div class="row">
           <div class="col-sm-12">
               <p></p>
               <div>
                   {{$news->links()}}
               </div>
               <p></p>
           </div>
       </div>
    </div>
</section>
@endsection