@extends('layouts.front')
@section('content')
    <link href="{{asset('front/css/page.css')}}" rel="stylesheet">
    <!-- ***** Contact Us Area Start ***** -->
    <section class="footer-contact-area section_padding_100 clearfix" id="contact">
        <div class="container">
            <h2 class="text-white">New Request</h2>
        </div>
    </section>
    <section>
        <script>
            var rate = "{{$rate->rate}}";
        </script>
        <div class="container" style="margin-top: 54px">
            @if(Session::has('sms1'))
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div>
                        {{session('sms1')}}
                    </div>
                </div>
            @endif
          <h3>Your Total Score: <span class="text-danger" id='total'>{{session('membership')->score}} BTs</span></h3>
           <form action="{{url('/request/submit')}}" method="POST" class="form-horizontal">
               {{csrf_field()}}
               
                <div class="form-group row">
                    <label for="" class="control-label col-sm-2">Input Score</label>
                    <div class="col-sm-5">:
                        <input type="number" name="score" id='score'>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="control-label col-sm-2">Or Amount($)</label>
                    <div class="col-sm-5">:
                        <input type="number" name="amount" id='amount'>
                        <p></p>
                        <p>
                            <button class="btn btn-success" type="submit" disabled id="btn1">Submit</button>
                        </p>
                    </div>
                </div>
           </form>
        </div>
        <p>&nbsp;</p>
        <hr>
        <p>&nbsp;</p>
    </section>
  
@endsection
@section('js')
    <script>
        rate = Number(rate);
        var total = "{{session('membership')->score}}";
        total = Number(total);
        $(document).ready(function(){
            $('#score').keyup(function(){
                var m = $(this).val();
                if(m<0)
                {
                    alert('The requested score cannot be 0!');
                    $("#btn1").attr('disabled','disabled');
                }
                else if(m>total)
                {
                    alert('Your requested score is bigger your total score!');
                    $("#btn1").attr('disabled','disabled');

                }
                else{
                    var t = rate * m;
                    $("#amount").val(t);
                    $("#btn1").removeAttr('disabled');
                }
            });
            $("#amount").keyup(function(){
                var s = $(this).val();
                var sc = parseInt(s/rate);
                if(sc>total)
                {
                    alert("You don't have enough score to request!");
                    $("#btn1").attr('disabled','disabled');

                }
                else{
                    $("#score").val(sc);
                    $("#btn1").removeAttr('disabled');

                }
                
                
            });
        });
    </script>
@endsection