@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Message Detail&nbsp;&nbsp;
                    <a href="{{url('/admin/mail')}}" class="btn btn-link btn-sm">
                        Back
                    </a>
                </div>
                <div class="card-block">
                    <strong>Subject</strong>
                    <div>
                        {{$mail->subject}}
                    </div>
                    <p></p>
                    <strong>Send Date</strong>
                    <div>
                        {{$mail->send_date}}
                    </div>
                    <p></p>
                    <strong>Message</strong>
                    <div>
                        {!!$mail->message!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection