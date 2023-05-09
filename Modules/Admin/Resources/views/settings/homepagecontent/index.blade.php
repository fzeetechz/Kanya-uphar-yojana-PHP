@extends('admin::layouts.master')
@section('title') Home Page Content  @endsection
@section('content')
<style>
   label {
       text-transform: capitalize;
   }
</style>
<div class="main-content">
<div class="page-title col-sm-12">
   <div class="row align-items-center">
      <div class="col-md-6">
         <h1 class="h4 m-0">
         Home Page Content</h4>
      </div>
      <div class="col-md-6">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-0">
               <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">Home page content</li>
            </ol>
         </nav>
      </div>
   </div>
</div>
<div class="card">
   <div class="card-header">
      <strong>Fill Home Page Content</strong>
      <a class="btn btn-sm btn-info float-right rounded-pill ml-5 ml-lg-2" href="{{ route('settings.homepagecontent') }}" > <i class="fas fa-file-alt"></i> Home Page Content</a>
      <a class="btn btn-sm btn-warning rounded-pill text-white float-right " href="javascript:history.go(-1)"> <i class="fas fa-arrow-circle-left"></i> Back</a>
   </div>
   <div class="card-body">
      <form action="{{ route('settings.homepagecontent.store',$id) }}" method="POST" id="formid" name="formid" enctype="multipart/form-data">
         {{ csrf_field() }}
         <div class="form-group">
            <label for="nf-name">middle section right text</label>
            <textarea class="form-control" autocomplete="random"  id="middle_section_right_text" name="middle_section_right_text">@if($updatedata!=''){{$updatedata->middle_section_right_text}}@endif</textarea>
            @if ($errors->has('middle_section_right_text'))
            <span class="invalid feedback" role="alert"> 
            <strong class="text-danger">{{ $errors->first('middle_section_right_text') }}.</strong> 
            </span>
            @endif 
         </div>
         <div class="form-group">
            <label for="nf-name">middle section left text</label>
            <textarea class="form-control" autocomplete="random"  id="middle_section_left_text" name="middle_section_left_text">@if($updatedata!=''){{$updatedata->middle_section_left_text}}@endif</textarea>
            @if ($errors->has('middle_section_left_text'))
            <span class="invalid feedback" role="alert"> 
            <strong class="text-danger">{{ $errors->first('middle_section_left_text') }}.</strong> 
            </span>
            @endif 
         </div>
         <div class="form-group ">
               <label class="form-col-form-label" >Middle section image right</label>
               <input type="file" id="file-input" class="form-control file-input {{ $errors->has('middle_section_image_right') ? ' is-invalid' : '' }}"  value="{{ old('middle_section_image_right') }}" autofocus multiple name="middle_section_image_right" />
               @if ($errors->has('middle_section_image_right')) <span class="invalid feedback" role="alert"> <strong class="text-danger">{{ $errors->first('middle_section_image_right') }}.</strong> </span> @endif 
         </div>
         @if($updatedata!='')
            <img src="{{getFile('home_page',$updatedata->middle_section_image_right)}}" class="img-thumbnail" width="80">
         @endif
         <div class="form-group ">
               <label class="form-col-form-label" >middle section image left</label>
               <input type="file" id="file-input" class="form-control file-input {{ $errors->has('middle_section_image_left') ? ' is-invalid' : '' }}"  value="{{ old('middle_section_image_left') }}" autofocus multiple name="middle_section_image_left" />
               @if ($errors->has('middle_section_image_left')) <span class="invalid feedback" role="alert"> <strong class="text-danger">{{ $errors->first('middle_section_image_left') }}.</strong> </span> @endif 
         </div>
         @if($updatedata!='')
            <img src="{{getFile('home_page',$updatedata->middle_section_image_left)}}" class="img-thumbnail" width="80">
         @endif
         <div class="form-group"> 
            <label for="nf-name">middle section right heading text</label>
            <textarea class="form-control" autocomplete="random"  id="middle_section_right_heading_text" name="middle_section_right_heading_text">@if($updatedata!=''){{$updatedata->middle_section_right_heading_text}}@endif</textarea>
            @if ($errors->has('middle_section_right_heading_text'))
            <span class="invalid feedback" role="alert"> 
            <strong class="text-danger">{{ $errors->first('middle_section_right_heading_text') }}.</strong> 
            </span>
            @endif 
         </div>
         <div class="form-group"> 
            <label for="nf-name">middle section right sub heading text</label>
            <textarea class="form-control" autocomplete="random"  id="middle_section_right_sub_heading_text" name="middle_section_right_sub_heading_text">@if($updatedata!=''){{$updatedata->middle_section_right_sub_heading_text}}@endif</textarea>
            @if ($errors->has('middle_section_right_sub_heading_text'))
            <span class="invalid feedback" role="alert"> 
            <strong class="text-danger">{{ $errors->first('middle_section_right_sub_heading_text') }}.</strong> 
            </span>
            @endif 
         </div>
         <div class="form-group"> 
            <label for="nf-name">middle section left heaing text</label>
            <textarea class="form-control" autocomplete="random"  id="middle_section_left_heading_text" name="middle_section_left_heading_text">@if($updatedata!=''){{$updatedata->middle_section_left_heading_text}}@endif</textarea>
            @if ($errors->has('middle_section_left_heading_text'))
            <span class="invalid feedback" role="alert"> 
            <strong class="text-danger">{{ $errors->first('middle_section_left_heading_text') }}.</strong> 
            </span>
            @endif 
         </div>
         <div class="form-group"> 
            <label for="nf-name">middle section left sub heading text</label>
            <textarea class="form-control" autocomplete="random"  id="middle_section_left_sub_heading_text" name="middle_section_left_sub_heading_text">@if($updatedata!=''){{$updatedata->middle_section_left_sub_heading_text}}@endif</textarea>
            @if ($errors->has('middle_section_left_sub_heading_text'))
            <span class="invalid feedback" role="alert"> 
            <strong class="text-danger">{{ $errors->first('middle_section_left_sub_heading_text') }}.</strong> 
            </span>
            @endif 
         </div>
   </div>
   <div class="card-footer">
   <button class="btn btn-sm btn-primary" type="submit">Save</button>
   <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
   </div> </form>
</div>
@jquery
@toastr_js
@toastr_render
@endsection
@section('js')
<script type="text/javascript">
   CKEDITOR.replace('middle_section_right_text',{
   toolbar: [
   ['Bold', 'Italic', 'PasteText', 'SpellCheck', 'ckeditor_wiris_formulaEditor', 'ckeditor_wiris_CAS','Styles','BGColor','Link','Unlink', 'Smiley']],
   }); 
</script>
<script type="text/javascript">
   CKEDITOR.replace('middle_section_left_text',{
   toolbar: [
   ['Bold', 'Italic', 'PasteText', 'SpellCheck', 'ckeditor_wiris_formulaEditor', 'ckeditor_wiris_CAS','Styles','BGColor','Link','Unlink', 'Smiley']],
   }); 
</script>
@endsection
