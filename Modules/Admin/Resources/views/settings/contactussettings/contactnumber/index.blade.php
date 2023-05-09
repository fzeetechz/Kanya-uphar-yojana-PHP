@extends('admin::layouts.master')
@section('title') Add Contact Number  @endsection
@section('content')
<div class="main-content">
<div class="page-title col-sm-12">
   <div class="row align-items-center">
      <div class="col-md-6">
         <h1 class="h4 m-0">Contact Number</h4>
      </div>
      <div class="col-md-6">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-0">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">Contact Numbers</li>
            </ol>
         </nav>
      </div>
   </div>
</div>
<div class="card">
  <div class="card-header">
    <strong>Fill Contact Number Details</strong>
<a class="btn btn-sm btn-info float-right rounded-pill ml-5 ml-lg-2" href="{{ route('settings.contactussettings.contactnumber') }}" > <i class="fas fa-file-alt"></i> Contact Numbers</a>
                    <a class="btn btn-sm btn-warning rounded-pill text-white float-right " href="javascript:history.go(-1)"> <i class="fas fa-arrow-circle-left"></i> Back</a>
            </div>
   <div class="card-body">
      <form action="{{ route('settings.contactussettings.contactnumber.store',$id) }}" method="POST" id="formid" name="formid">
         {{ csrf_field() }}
         
         <div class="form-group">
            <label for="nf-name">Title </label>
            <input class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" autocomplete="random" value="@if($updatedata!=''){{$updatedata->title}}@endif"  id="nf-title" name="title" type="text" 
               placeholder="Enter contact number title.." autocomplete="title">
                @if ($errors->has('title'))
                    <span class="invalid feedback" role="alert"> 
                        <strong class="text-danger">{{ $errors->first('title') }}.</strong> 
                    </span>
            @endif 
         </div>
         <div class="form-group row">
               <div class="col-md-8 col-form-label">
                  @if($updatedata!='')
                     @if($updatedata->default_status=="0")
                     <label class="form-check-label ml-3">Set as Default
                        <input type="radio" class="" name="default_status" value='1'>
                     </label>
                     @endif
                  @else
                  <label class="form-check-label ml-3">Set as Default
                        <input type="radio" class="" name="default_status" value='1'>
                  </label>
                  @endif
               </div>
            </div> 
        
         <label for="nf-name">Number </label>
         <input class="form-control {{ $errors->has('number') ? ' is-invalid' : '' }}" autocomplete="random" value="@if($updatedata!=''){{$updatedata->number}}@endif"  id="nf-number" name="number" 
               placeholder="Enter contact number.." type="text" minlength="7" maxlength="12" autocomplete="number">
         @if ($errors->has('number'))
           <span class="invalid feedback" role="alert"> 
               <strong class="text-danger">{{ $errors->first('number') }}.</strong> 
           </span>
         @endif </div>
   <div class="card-footer">
   <button class="btn btn-sm btn-primary" type="submit">Save</button>
    @if($id="")
    <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
   @endif
   </div> </form>
</div>
<div class="col-sm-12">
   <div class="row">
      <div class="col-sm-12 mb-4 mt-3">
         <div class="box bg-white">
            <div class="box-row">
               <div class="box-content">
                  <table id="dataTable" class="table table-striped table-bordered table-hover">
                     <thead>
                        <tr>
                           <th scope="col" class="sr-no">S.No</th>
                           <th scope="col">Title</th>
                           <th scope="col">Number </th>
                           <th scope="col">Default status</th>
                           <th scope="col">Status</th>
                           <th scope="col" class="action">Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                        @php  $i=1; @endphp
                        @foreach($data as $value)
                           <tr class="{{$value->id}}">
                           <th scope="row" class="sr-no"> {{$i++}}</th>
                           <td>{{$value->title }}</td>
                           <td>{{$value->number  }}</td>
                           <td>
                              <span class="Statuschange badge @if($value->default_status=='0') badge-danger @else badge badge-success @endif" data-id="{{$value->id}}"  data-model="Address" id="Statuschange{{$value->id}}">
                              @if($value->default_status=="1") Yes @else No @endif 
                              </span>
                           </td>
                           <td>
                           <span class="Statuschange badge @if($value->status=='0') badge-danger @else badge badge-success @endif" data-id="{{$value->id}}"  data-model="ContactNumber" id="Statuschange{{$value->id}}">
                           @if($value->status=="0") Deactive @else Active @endif 
                           </span>
                        </td>
                           <td class="action ">
                           
                              <a class="icon-btn edit" href="{{ route('settings.contactussettings.contactnumber',$value->id) }}"><i class="fal fa-edit" id="show-edit"></i></a>
                            <a class="icon-btn delete universaldelete" href="javascript:void(0);" data-status="0" data-id="{{ $value->id}}"  data-model="ContactNumber" id="{{$value->id}}" > <i class="fal fa-trash-alt" id="delete-btn"></i></a> 
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
@jquery
@toastr_js
@toastr_render
@endsection

@section('js')
  <script>
   $(document).ready( function () {
       $('#dataTable').DataTable();
   });
</script>
<script type="text/javascript">
   onkeyup: $(function() {
      $("#formid").validate({
       onkeyup: true, 
          rules: {
            number: {
              required: true,
              number: true
            },
            title: {
              required: true,
            }
          },
      });
    });
 </script>
@endsection
