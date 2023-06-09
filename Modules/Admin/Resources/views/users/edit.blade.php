@extends('admin::layouts.master')
@section('title') Edit {{ @$user->roles()->first()->name }} @endsection
@section('content')
<div class="main-content">
<div class="page-title col-sm-12">
   <div class="row align-items-center">
      <div class="col-md-6">
         <h1>Edit {{ @$user->roles()->first()->name }} </h1>
      </div>
      <div class="col-md-6">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-0">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item">@if($user->roles()->first()->name=="Beautician") <a href="{{route('users.beauticians')}}"> PBTLA @elseif($user->roles()->first()->name=="Customers") <a href="{{route('users.customers')}}"> Customers  @else <a href="{{route('users.admin.managers')}}"> Admin managers @endif </a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit {{ @$user->roles()->first()->name }}</li>
            </ol>
         </nav>
      </div>
   </div>
</div>
<div class="card">
  <div class="card-header"> 
<div class="d-flex justify-content-between">
    <div>
    Edit User   <a class="badge badge-success " href="{{ route('changepasswordview',$user->id) }}"  style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif;">Change Password</a>
    </div>
    <div>
       <a class="btn btn-sm btn-warning text-white" href="javascript:history.go(-1)" style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif;">Back</a> <a class="btn btn-sm btn-info " href="{{ route('users.index') }}"  style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif;">Users
       </a>
    </div>
 </div>
</div>
      <div class="card-body">
         <form method="POST" action="{{ route('users.update',$user->id) }}" id="formvalidation" autocomplete="off"  enctype="multipart/form-data" class="ml-0">
         
          @csrf
             {{ method_field('PATCH') }}
          <div class="form-group row ">
               <div class="col-xs-6 col-sm-6 col-md-6">
                <label class="col-form-label starlabel" >Full Name : </label>
                  <input type="text" name="full_name" placeholder = 'Enter full name' value="{{ $user->full_name }}" class = "form-control  @error('full_name') is-invalid @enderror" >
                  @if ($errors->has('full_name'))
                  <span class="invalid feedback" role="alert"> 
                  <strong class="text-danger">{{ $errors->first('full_name') }}.</strong> 
                  </span>
                  @endif
            </div> 
               <div class="col-xs-6 col-sm-6 col-md-6">
                      <label class="col-form-label starlabel" >Email : </label>
                  <input type="text" name="email" placeholder = 'Enter email address' value="{{ $user->email }}" class = "form-control  @error('email') is-invalid @enderror" >
                  @if ($errors->has('email'))
                  <span class="invalid feedback" role="alert"> 
                  <strong class="text-danger">{{ $errors->first('email') }}.</strong> 
                  </span>
                  @endif
            </div>
            </div>
        
          <div class="form-group row ">
               <div class="col-xs-3 col-sm-3 col-md-3">
                  <label class="col-form-label starlabel" >Phone Number : </label>
                  <input type="text" name="phone_no" maxlength="10" minlength="10" placeholder = 'Enter phone number' value="{{ $user->phone_no }}"  class = "form-control  @error('phone_no') is-invalid @enderror" >
                  @if ($errors->has('phone_no'))
                  <span class="invalid feedback" role="alert"> 
                  <strong class="text-danger">{{ $errors->first('phone_no') }}.</strong> 
                  </span>
                  @endif
               </div>
               <div class="col-xs-3 col-sm-3 col-md-3">
                  <label class="col-form-label starlabel" >Emergency Number : </label>
                  <input type="text" name="emergency_number" maxlength="10" minlength="10" placeholder = 'Enter Emergency Number' value="{{ @$user->profileInformation->emergency_number }}"  class = "form-control  @error('emergency_number') is-invalid @enderror" >
                  @if ($errors->has('emergency_number'))
                  <span class="invalid feedback" role="alert"> 
                  <strong class="text-danger">{{ $errors->first('emergency_number') }}.</strong> 
                  </span>
                  @endif
               </div>

               <div class="col-xs-4 col-sm-4 col-md-4">
                <label>Profile Picture : </label>
                     <input type="file" name="profile_pic"  class = "form-control  @error('profile_pic') is-invalid @enderror" >
                     @if ($errors->has('profile_pic'))
                     <span class="invalid feedback" role="alert"> 
                     <strong class="text-danger">{{ $errors->first('profile_pic') }}.</strong> 
                     </span>
                     @endif
               </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                    @if($user->profile_pic=='')
                      <label class="col-form-label"></label>
                      <span class="img-icon"><img src="{{asset('public/images/profile_pics/avatar7.png')}}" width="60"  alt="img" ></span>
                      @else
                      <span class="img-icon"><img src="{{ asset('admin/images/profile_pics/'.$user->profile_pic) }}" alt="img" width="100" height="100"></span>
                    @endif
                    </div>        
                </div>
                <div class="form-group row ">
                  <div class="col-xs-3 col-sm-3 col-md-3">
                    <label class="col-form-label">Id Proof : </label>
                    <input type="file" name="id_proof" class="form-control  @error('id_proof') is-invalid @enderror">
                    @if ($errors->has('id_proof'))
                    <span class="invalid feedback" role="alert">
                    <strong class="text-danger">{{ $errors->first('id_proof') }}.</strong>
                    </span>
                    @endif
                </div>
                  <div class="col-xs-2 col-sm-2 col-md-2">
                    @if(!$user->profileInformation=="")
                      @if(!$user->profileInformation->id_proof=="")
                        <label class="col-form-label">{{@$user->profileInformation->id_proof}}</label>
                        <a href="{{ asset('admin/images/id_proofs/'.$user->profileInformation->id_proof) }}" class="btn btn-primary">Open</a> 
                      @endif
                      @else
                        <label class="col-form-label"></label>
                        <span class="img-icon"><img src="{{asset('public/images/profile_pics/avatar7.png')}}" width="60"  alt="img" ></span>
                    @endif
                  </div>        
              </div>    
            <div class="form-group row ">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <label for="exampleFormControlTextarea1">Address / Location</label>
                       <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="Address_Location">{{ $user->Address_Location }}</textarea>
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
   $(function() {
         $("#formvalidation").validate({
         rules: {
           full_name: {
             required: true,
           },
           email: {
             required: true,
             email: true
           }
           ,
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
           }
      
         },
         messages: {
           full_name: {
             required: "Full Name is a Required field !"
           },
           email: {
             required: "Email is a Required field !"
           },
           phone_no: {
             required: "Phone number is a Required field !"
           },
           emergency_number: {
             required: "Emergency number is a Required field !"
           },
           Address_Location: {
             required: "Address / Location is a Required field !"
           }
             }
         });
   });
</script>
@endsection
