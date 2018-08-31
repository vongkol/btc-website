@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Edit Announcement&nbsp;&nbsp;
                    <a href="{{url('/admin/announcement/')}}" class="btn btn-link btn-sm">
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
                    <form action="{{url('/admin/announcement/update')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" value="{{$anc->id}}" name="id">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label for="" class="col-sm-2">Title <span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" required name="title" value="{{$anc->title}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2">Short Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="short_description" id="short_description" cols="30" rows="3" class="form-control">{{$anc->short_description}}</textarea>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                       <div class="row">
                           <div class="col-sm-12">
                               <strong>Description</strong>
                               <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{$anc->description}}</textarea>
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
<script>
    function loadFile(e){
        var output = document.getElementById('img');
        output.src = URL.createObjectURL(e.target.files[0]);
    }
</script>
<script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
   var roxyFileman = "{{asset('fileman/index.html?integration=ckeditor')}}"; 

  CKEDITOR.replace( 'description',{filebrowserBrowseUrl:roxyFileman, 
                               filebrowserImageBrowseUrl:roxyFileman+'&type=image',
                               removeDialogTabs: 'link:upload;image:upload'});
</script> 
@endsection