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
  <a class="btn btn-sm btn-info rounded-pill" href="{{ route('registrations.create') }}" > Create {{rtrim($pageName, 's')}}</a>
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
                                 <th class="action">Full Name</th>
                                 <th>Mobile</th>
                                 <th>Amount</th>
                                 <th>Registration No.</th>
                                 <th>Plan</th>
                                 <th>Register At</th>
                                 <th>Register By</th>
                                 <th class="action">Status</th>
                                 <th class="action float-center">Docs</th>
                                 <th class="action float-center">Actions</th>
                              </tr>
                           </thead>
                           <tbody id="tablecontents">
                              @foreach($registrations as $key=>$registration)
                              <tr class="{{ $registration->id }}" data-id="{{ $registration->id }}" >
                                 <td class="pl-3">{{ $key+1}}</td>
                                 <td>{{ $registration->full_name }}</td>
                                 <td>{{ $registration->mobile }}</td>
                                 <td>{{ $registration->amount }}</td>
                                 <td>{{ $registration->registration_number }}</td>
                                 <td>{{ @$registration->plan->name }}</td>
                                 <td>{{ $registration->created_at }}</td>
                                 <td>{{ @$registration->registerBy->full_name }}</td>
                                <td>   
                                 <span class="Statuschange badge @if($registration->status=='0') badge-danger @else badge badge-success @endif" data-id="{{$registration->id}}"  data-model="Registration" id="Statuschange{{$registration->id}}">
                                    @if($registration->status=="0") Deactive @else Active @endif 
                                    </span>
                                 </td>
                                 <td>
                                 <span class="badge badge-success">
                                    <a href="{{getFile('registration_documents',@$registration->document)}}" class="text-white" target="_blank">View</a>
                                 </span>
                                </td>
                                 </td>
                                 <td class="action float-center">
                                    <a class="icon-btn preview" href="{{ route('registrations.show',$registration->id) }}">     
                                    <i class="fal fa-eye"  id="show-btn"></i></a></a>
                                    <a class="icon-btn edit" href="{{ route('registrations.edit',$registration->id) }}">
                                    <i class="fal fa-edit" id="show-edit"></i></a>
                                   <a class="icon-btn delete universaldelete" href="javascript:void(0);" data-status="0" data-id="{{ $registration->id}}"  data-model="Registration" id="{{ $registration->id }}" > <i class="fal fa-trash-alt" id="delete-btn"></i></a> 
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

