@extends('admin::layouts.master')
@section('title')  {{ $user->roles()->first()->name }} profile @endsection
@section('content')
<div class="main-content">
<div class="page-title col-sm-12">
  <div class="row align-items-center">
    <div class="col-md-6">
      <h1 class="h3 m-0"> {{ $user->roles()->first()->name }} profile </h1>
    </div>
    <div class="col-md-6">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb m-0 p-0">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
           <li class="breadcrumb-item"><a href="{{route('users.admin.managers')}}">admin managers</a></li>
          <li class="breadcrumb-item active" aria-current="page"> {{ $user->roles()->first()->name }}</li>
        </ol>
      </nav>
    </div>
  </div>
</div>
<div class="col-sm-12">
  <div class="row">
    <div class="col-lg-12 col-md-4 mb-4">
      <div class="card">
            <div class="card-header bg-white">
              <a href="{{ route('users.adminmanagerprofileedit',$user->id) }}">
                <span class="badge badge-success ">Edit</span>
              </a>
              <a href="{{route('users.admin.managers')}}">
                <span class="badge badge-info float-right " style="margin-left: 10px">Admin managers</span>
              </a>
              <a href="javascript:history.go(-1)">
                <span id="exportData" class="badge badge-warning float-right">Back</span>
              </a>
            </div>
        </div>
      <div class="box bg-white">
        <div class="container mt-4">
          <div class="main-body">
            <div class="row gutters-sm">
              <div class="col-md-4 mb-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center"> <img src="{{ !$user->profile_pic=='' ? asset('admin/images/profile_pics/'.$user->profile_pic) : asset('public/images/profile_pics/avatar7.png') }}" alt="Admin" class="img-thumbnail" >
                      <div class="mt-3">
                        <h4>{{ $user->full_name }}</h4>
                        <p class="text-secondary mb-1">{{ $user->email }}</p>
                        <p class="text-muted font-size-sm">{{ $user->Address_Location }}</p>
                         @if(!$user->profileInformation=="")
                          @if(!$user->profileInformation->id_proof=="")
                            <a href="{{ asset('admin/images/id_proofs/'.$user->profileInformation->id_proof) }}" class="btn btn-primary">Id Proof</a> 
                          <!-- <button class="btn btn-outline-primary">Message</button> -->
                          @endif
                        @endif
                      </div>
                    </div>
                  </div>
                </div>  
            </div>
              <div class="col-md-8">
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0 text-primary">Name</h6>
                      </div>
                      <div class="col-sm-9 text-danger"> {{ $user->full_name }} </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0 text-primary">Email</h6>
                      </div>
                      <div class="col-sm-9 text-danger"> {{ $user->email }} </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0 text-primary">Mobile</h6>
                      </div>
                      <div class="col-sm-9 text-danger"> {{ $user->phone_no }} </div>
                    </div>
                    @if(!$user->profileInformation=="")
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0 text-primary">Emergency Number</h6>
                      </div>
                      <div class="col-sm-9 text-danger"> {{ $user->profileInformation->emergency_number }} </div>
                    </div>
                    @endif
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0 text-primary">Role </h6>
                      </div>
                      <div class="col-sm-9 text-danger">
                         {{$user->getRoleNames()->first()}}
                      </div>
                    </div>
                  <hr>
                  <h3 class="mb-0 text-danger ml-2">Permissions</h3>
                  </div>
                    <div class="col-xs-12 col-sm-12 col-md-12"> 
                      <div class="form-group"> 
                        @foreach($permissions as $key=>$permission)
                        <div class="col-sm-12 col-md-12">
                          <div class="card">
                            <div class="card-header badge-pill "><b class="text-primary"> {{$key}}</b></div>
                              <div class="card-body text-primary"> 
                                @foreach ($permission as $value)
                                  <input type="checkbox" value="{{$value->id}}" disabled="" @if(in_array($value->id, $rolePermissions)) checked @endif   name="permission[]"> 
                                  {{ ucfirst($value->name) }} 
                                  </label>
                                @endforeach 
                              </div>
                            </div>
                          </div>
                        @endforeach
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
