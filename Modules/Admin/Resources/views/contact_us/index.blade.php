@extends('admin::layouts.master')
@section('title') Contact us list @endsection
@section('content')
<div class="main-content">
<div class="page-title col-sm-12">
   <div class="row align-items-center">
      <div class="col-md-6">
         <h1 class="h3 m-0">Contact us requests</h1>
      </div>
      <div class="col-md-6">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-0">
               <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">Contact us requests</li>
            </ol>
         </nav>
      </div>
   </div>
</div>
<div class="col-md-12 bg-muted text-right">
  <a class="btn btn-sm btn-warning rounded-pill text-white" href="javascript:history.go(-1)"> Back</a>
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
                                 <th class="action">Name</th>
                                 <th class="action">Mobile</th>
                                 <th class="action float-center">Email</th>
                                 <th class="action float-center">Message</th>
                                 <th class="action float-center">Status</th>
                                 <th class="action float-center">Actions</th>
                              </tr>
                           </thead>
                           <tbody id="tablecontents">
                              @foreach($list as $key=>$data)
                              <tr class="{{ $data->id }}" data-id="{{ $data->id }}" >
                                 <td class="pl-3">{{$key+1}}</td>
                                 <td>{{ $data->name }}</td>
                                 <td>{{ $data->mobile }}</td>
                                 <td>
                                    {{$data->email}}
                                </td>
                                 <td>
                                    {{$data->message}}
                                </td>
                                <td>   
                                 <span class="Statuschange badge @if($data->status=='0') badge-danger @else badge badge-success @endif" data-id="{{$data->id}}"  data-model="ContactUs" id="Statuschange{{$data->id}}">
                                    @if($data->status=="0") Deactive @else Active @endif 
                                    </span>
                                 </td>
                                 </td>
                                 <td class="action float-center">
                                   <a class="icon-btn delete universaldelete" href="javascript:void(0);" data-status="0" data-id="{{ $data->id}}"  data-model="ContactUs" > <i class="fal fa-trash-alt" id="delete-btn"></i></a> 
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


