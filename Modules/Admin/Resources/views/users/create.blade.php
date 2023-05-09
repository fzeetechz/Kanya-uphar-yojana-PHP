@extends('admin::layouts.master')
@section('title') Add Admin manager @endsection
@section('content')
<div class="main-content">
<div class="page-title col-sm-12">
   <div class="row align-items-center">
      <div class="col-md-6">
         <h4>Add Admin manager </h4>
      </div>
      <div class="col-md-6">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-0">
               <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
               <li class="breadcrumb-item"> <a href="{{route('users.admin.managers')}}"> Admin managers </a>
               </li>
               <li class="breadcrumb-item active" aria-current="page">Add Admin manager </li>
            </ol>
         </nav>
      </div>
   </div>
</div>
<div class="card">
   <div class="card-header">
      <strong>Fill Details For Add Admin manager </strong>
      <a class="btn btn-sm btn-info rounded-pill float-right ml-5 ml-lg-2"
         href="{{ route('users.admin.managers') }}"><i class="fas fa-user"> </i> Admin managers</a>
      <a class="btn btn-sm btn-warning rounded-pill text-white float-right " href="javascript:history.go(-1)"><i
         class="fas fa-arrow-circle-left"></i> Back</a>
   </div>
   <div class="card-body">
      <form method="POST" action="{{ route('users.store') }}" id="formvalidation" autocomplete="off"
         enctype="multipart/form-data" class="ml-1">
         @csrf
         <div class="form-group row">
            <div class="col-xs-6 col-sm-6 col-md-6">
               <label class="col-form-label starlabel">Full Name : </label>
               <input type="text" name="full_name" placeholder='Enter full name' value="{{ old('full_name') }}"
                  class="form-control  @error('full_name') is-invalid @enderror">
               @if ($errors->has('full_name'))
               <span class="invalid feedback" role="alert">
               <strong class="text-danger">{{ $errors->first('full_name') }}.</strong>
               </span>
               @endif
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
               <label class="col-form-label starlabel">Email : </label>
               <input type="text" name="email" placeholder='Enter email address' value="{{ old('email') }}"
                  class="form-control  @error('email') is-invalid @enderror">
               @if ($errors->has('email'))
               <span class="invalid feedback" role="alert">
               <strong class="text-danger">{{ $errors->first('email') }}.</strong>
               </span>
               @endif
            </div>
         </div>
         <div class="form-group row">
            <div class="col-xs-3 col-sm-3 col-md-3">
               <label class="col-form-label starlabel">Phone Number : </label>
               <input type="text" name="phone_no" maxlength="12" minlength="7" placeholder='Enter phone number'
                  value="{{ old('phone_no') }}" class="form-control  @error('phone_no') is-invalid @enderror">
               @if ($errors->has('phone_no'))
               <span class="invalid feedback" role="alert">
               <strong class="text-danger">{{ $errors->first('phone_no') }}.</strong>
               </span>
               @endif
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3">
               <label class="col-form-label starlabel">Emergency Number : </label>
               <input type="text" name="emergency_number" maxlength="12" minlength="7"
                  placeholder='Enter emergency number' value="{{ old('emergency_number') }}"
                  class="form-control  @error('emergency_number') is-invalid @enderror">
               @if ($errors->has('emergency_number'))
               <span class="invalid feedback" role="alert">
               <strong class="text-danger">{{ $errors->first('emergency_number') }}.</strong>
               </span>
               @endif
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3">
               <label class="col-form-label starlabel">Profile Picture : </label>
               <input type="file" name="profile_pic"
                  class="form-control  @error('profile_pic') is-invalid @enderror">
               @if ($errors->has('profile_pic'))
               <span class="invalid feedback" role="alert">
               <strong class="text-danger">{{ $errors->first('profile_pic') }}.</strong>
               </span>
               @endif
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3">
               <label class="col-form-label starlabel">Id Proof : </label>
               <input type="file" name="id_proof"
                  class="form-control  @error('id_proof') is-invalid @enderror">
               @if ($errors->has('id_proof'))
               <span class="invalid feedback" role="alert">
               <strong class="text-danger">{{ $errors->first('id_proof') }}.</strong>
               </span>
               @endif
            </div>
         </div>
         <div class="form-group row">
            <div class="col-xs-3 col-sm-3 col-md-3">
               <label>Doc : </label>
               <input type="file" name="doc" required=""
                  class="form-control  @error('doc') is-invalid @enderror">
               @if ($errors->has('doc'))
               <span class="invalid feedback" role="alert">
               <strong class="text-danger">{{ $errors->first('doc') }}.</strong>
               </span>
               @endif
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3">
               <label>Role : </label>
               <select class="form-control js-example-basic-single" name="roles[]">
                  @foreach($roles as $role)
                  <option value="{{$role}}">{{$role}}</option>
                  @endforeach
               </select>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3">
               <label class="col-form-label starlabel">Password : </label>
               <input type="password" name="password" placeholder='Enter password' id="password"
                  class="form-control  @error('password') is-invalid @enderror">
               @if ($errors->has('password'))
               <span class="invalid feedback" role="alert">
               <strong class="text-danger">{{ $errors->first('password') }}.</strong>
               </span>
               @endif
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3">
               <label class="col-form-label starlabel">Confirm Password : </label>
               <input type="password" name="confirm_password" placeholder='Enter Confirm Password'
                  id="confirmpassword" class="form-control  @error('confirm_password') is-invalid @enderror">
               @if ($errors->has('confirm_password'))
               <span class="invalid feedback" role="alert">
               <strong class="text-danger">{{ $errors->first('confirm_password') }}.</strong>
               </span>
               @endif
            </div>
         </div>
         <div class="form-group row">
            <div class="col-xs-12 col-sm-12 col-md-12">
               <label for="exampleFormControlTextarea1">Address / Location</label>
               <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                  name="Address_Location"></textarea>
            </div>
         </div>
   </div>
   <div class="card-footer ">
   <button class="btn btn-sm btn-primary" type="submit">Save</button>
   <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
   </div>
   </form>
</div>
@endsection
@section('js')
<script type="text/javascript">
   onkeyup: $(function() {
       $("#formvalidation").validate({
           onkeyup: true,
           rules: {
               full_name: {
                  required: true,
                  string: true,
               },
               email: {
                   required: true,
                   email: true
               },
               id_proof: {
                   required: true,
               },
               profile_pic: {
                   required: true,
               },
               Address_Location: {
                   required: true,
               },
               phone_no: {
                  required: true,
                  digits: true,
                  minlength : 10,
                  maxlength : 10
               },
               emergency_number: {
                  required: true,
                  digits: true,
                  minlength : 10,
                  maxlength : 10
               },
               password: {
                   required: true,
                   minlength: 6
               },
               confirm_password: {
                   required: true,
                   minlength: 6,
                   equalTo: "#password"
               }
   
           },
       });
   });
</script>
@endsection
