@extends('admin::layouts.master')
@section('title') Add Banner @endsection
@section('content')
<div class="main-content">
<div class="page-title col-sm-12">
   <div class="row align-items-center">
      <div class="col-md-6">
         <h1 class="h3 m-0">Banners</h1>
      </div>
      <div class="col-md-6">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-0">
               <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">Banners</li>
            </ol>
         </nav>
      </div>
   </div>
</div>
<div class="col-md-12 bg-muted text-right">
  <a class="btn btn-sm btn-warning rounded-pill text-white" href="javascript:history.go(-1)"> Back</a>
  <a class="btn btn-sm btn-info rounded-pill" href="{{ route('banners.create') }}" > Create Banner</a>
</div>
<div class="col-sm-12 mt-2">
   <div class="row">
      <div class="col-sm-12 mb-4">
         <div class="box bg-white">
            <div class="box-row">
               <div class="box-content">
                  <div class="row mt-6">
                     <div class="col-md-12 ">
                        <table id="table" class="table table-bordered">
                           <thead>
                              <tr>
                                 <th width="30px" class="action">S.N.</th>
                                 <th class="action">Title</th>
                                 <th class="action">Url</th>
                                 <th class="action float-center">Banner</th>
                                 <th class="action float-center">Actions</th>
                              </tr>
                           </thead>
                           <tbody id="tablecontents">
                              @foreach($banners as $key=>$banner)
                              <tr class="{{ $banner->id }}" data-id="{{ $banner->id }}" >
                                 <td class="pl-3">{{$key+1}}</td>
                                 <td>{{ $banner->title }}</td>
                                 <td>{{ $banner->url }}</td>
                                 <td>
                                    <span class="badge badge-success">
                                       <a href="{{getFile('banners',@$banner->banner)}}" class="text-white" target="_blank">View</a>
                                    </span>
                                     <img src="{{getFile('banners',@$banner->banner)}}" width="50">
                                </td>
                                 </td>
                                 <td class="action float-center">
                                    <a class="icon-btn edit" href="{{ route('banners.edit',$banner->id) }}">
                                    <i class="fal fa-edit" id="show-edit"></i></a>
                                   <a class="icon-btn delete universaldelete" href="javascript:void(0);" data-status="0" data-id="{{ $banner->id}}"  data-model="Banner" id="notification{{$banner->id}}" > <i class="fal fa-trash-alt" id="delete-btn"></i></a> 
                                 </td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection


