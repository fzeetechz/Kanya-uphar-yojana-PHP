@extends('admin::layouts.master')
@section('title') {{$pageName}} @endsection
@section('content')
<div class="main-content">
<div class="page-title col-sm-12">
   <div class="row align-items-center ">
      <div class="col-md-6">
         <h1 class="h3 m-0">{{$pageName}}</h1>
      </div>
      <div class="col-md-6">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-0">
               <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">{{$pageName}}</li>
            </ol>
         </nav>
      </div>
   </div>
</div>
<div class="col-md-12 bg-muted text-right">
  <a class="btn btn-sm btn-warning rounded-pill text-white" href="javascript:history.go(-1)"> Back</a>
  <a class="btn btn-sm btn-info rounded-pill" href="{{ route('plans.create') }}" > Create {{rtrim($pageName, 's')}}</a>
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
                                 <th>Amount</th>
                                 <th>Days</th>
                                 <th class="action">Status</th>
                                 <th class="action float-center">Image</th>
                                 <th class="action float-center">Actions</th>
                              </tr>
                           </thead>
                           <tbody id="tablecontents">
                              @foreach($plans as $key=>$value)
                              <tr class="{{ $value->id }}" data-id="{{ $value->id }}" >
                                 <td class="pl-3">{{ $key+1}}</td>
                                 <td>{{ $value->name }}</td>
                                 <td>{{ $value->amount }}</td>
                                 <td>{{ $value->days }}</td>
                                <td>   
                                 <span class="Statuschange badge @if($value->status=='0') badge-danger @else badge badge-success @endif" data-id="{{$value->id}}"  data-model="Plan" id="Statuschange{{$value->id}}">
                                    @if($value->status=="0") Deactive @else Active @endif 
                                    </span>
                                 </td>
                                 <td>
                                    <a href="{{getFile('plans',@$value->image)}}" class="text-white" target="_blank"><img src="{{getFile('plans',@$value->image)}}" width="35"></a>
                                </td>
                                 </td>
                                 <td class="action float-center">
                                    <a class="icon-btn preview" href="{{ route('plans.show',$value->id) }}">     
                                    <i class="fal fa-eye"  id="show-btn"></i></a></a>
                                    <a class="icon-btn edit" href="{{ route('plans.edit',$value->id) }}">
                                    <i class="fal fa-edit" id="show-edit"></i></a>
                                   <a class="icon-btn delete universaldelete" href="javascript:void(0);" data-status="0" data-id="{{ $value->id}}"  data-model="Plan" id="{{ $value->id }}" > <i class="fal fa-trash-alt" id="delete-btn"></i></a> 
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

@jquery
@toastr_js
@toastr_render
@endsection
@section('js')
   <script type="text/javascript">
      $(function () {
      $("#table").DataTable();
      });   
   </script>
@endsection

