@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Compose New Email&nbsp;&nbsp;
                    <a href="{{url('/admin/mail')}}" class="btn btn-link btn-sm">
                        Back
                    </a>
                </div>
                <div class="card-block">
                    @if(Session::has('sms'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div>
                                {{session('sms')}}
                            </div>
                        </div>
                    @endif
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
                    <form action="{{url('/admin/mail/save')}}" method="POST">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-sm-12">
                                <strong>Subject <span class="text-danger">*</span></strong>
                                <input type="text" class="form-control" required name="subject">
                               <p></p>
                            </div>
                        </div>
                       <div class="row">
                           <div class="col-sm-12">
                               <strong>Message Body <span class="text-danger">*</span></strong>
                               <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                               <P></P>
                               <button class="btn btn-primary" type="submit">Save</button>
                           </div>
                       </div>
                    </form>
                </div>
                
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection
@section('js')
<script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
   var roxyFileman = "{{asset('fileman/index.html?integration=ckeditor')}}"; 

  CKEDITOR.replace( 'description',{filebrowserBrowseUrl:roxyFileman, 
                               filebrowserImageBrowseUrl:roxyFileman+'&type=image',
                               removeDialogTabs: 'link:upload;image:upload'});
</script> 
@endsection