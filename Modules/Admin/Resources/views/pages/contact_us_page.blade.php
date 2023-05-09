@extends('admin::layouts.master')
@section('title') {{ucfirst($pagename)}} @endsection
@section('content')
<div class="main-content">
<div class="page-title col-sm-12">
   <div class="row align-items-center">
      <div class="col-md-6">
         <h1 class="h4 m-0">
         {{ucfirst($pagename)}}</h4>
      </div>
      <div class="col-md-6">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-0">
               <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">{{$pagename}}</li>
            </ol>
         </nav>
      </div>
   </div>
</div>
<div class="card">
   <div class="card-header">
      <strong>Fill {{$pagename}} Page Content</strong>
      <a class="btn btn-sm btn-info float-right rounded-pill ml-5 ml-lg-2" href="{{ route('settings.contactussettings.address') }}" > <i class="fas fa-file-alt"></i> {{$pagename}}</a>
      <a class="btn btn-sm btn-warning rounded-pill text-white float-right " href="javascript:history.go(-1)"> <i class="fas fa-arrow-circle-left"></i> Back</a>
   </div>
   <div class="card-body">
      <form action="{{ route('admin.pages.contact-us.update',1) }}" method="POST" id="formid" enctype="multipart/form-data" name="formid">
         {{ csrf_field() }}
         <div class="form-group">
            <label for="nf-name">Page Heading</label>
            <textarea class="form-control" autocomplete="random"  id="page_heading" name="page_heading">@if($updatedata!=''){{old('page_heading', $updatedata->page_heading)}} @else {{old('page_heading')}} @endif</textarea>
            @if ($errors->has('page_heading'))
            <span class="invalid feedback" role="alert"> 
            <strong class="text-danger">{{ $errors->first('page_heading') }}.</strong> 
            </span>
            @endif 
         </div>
         <div class="form-group">
            <label for="nf-name">Section Heading</label>
            <textarea class="form-control" autocomplete="random"  id="section_heading" name="section_heading">@if($updatedata!=''){{old('section_heading', $updatedata->section_heading)}} @else {{old('section_heading')}} @endif</textarea>
            @if ($errors->has('section_heading'))
            <span class="invalid feedback" role="alert"> 
            <strong class="text-danger">{{ $errors->first('section_heading') }}.</strong> 
            </span>
            @endif 
         </div>
         <div class="form-group">
            <label for="nf-name">Section Content</label>
            <textarea class="form-control" autocomplete="random"  id="section_content" name="section_content">@if($updatedata!=''){{old('section_content', $updatedata->section_content)}} @else {{old('section_content')}}@endif</textarea>
            @if ($errors->has('section_content'))
            <span class="invalid feedback" role="alert"> 
            <strong class="text-danger">{{ $errors->first('section_content') }}.</strong> 
            </span>
            @endif 
         </div>
   </div>
   <div class="card-footer">
   <button class="btn btn-sm btn-primary" type="submit">Save</button>
   <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
   </div> 
   </form>
</div>
@endsection
@section('js')
<script type="text/javascript">
   CKEDITOR.replace('page_heading',{
      //uiColor: '#D83968',
      toolbar: [
      ['Bold', 'Italic','Format','Font','FontSize','PasteText', 'SpellCheck', 'ckeditor_wiris_formulaEditor', 'ckeditor_wiris_CAS','Styles','BGColor','Link','Unlink', 'Smiley','colors']],
      height:['60px']
      }); 
</script>
<script type="text/javascript">
   CKEDITOR.replace('section_content',{
   toolbar: [
   ['Bold', 'Italic', 'PasteText', 'SpellCheck', 'ckeditor_wiris_formulaEditor', 'ckeditor_wiris_CAS','Styles','BGColor','Link','Unlink', 'Smiley']],
   height:['60px']
   
   }); 
</script>
<script type="text/javascript">
   CKEDITOR.replace('section_heading',{
   toolbar: [
   ['Bold', 'Italic', 'PasteText', 'SpellCheck', 'ckeditor_wiris_formulaEditor', 'ckeditor_wiris_CAS','Styles','BGColor','Link','Unlink', 'Smiley']],
   }); 
</script>

@endsection
