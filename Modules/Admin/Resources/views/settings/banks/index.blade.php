@extends('admin::layouts.master')
@section('title') Add Banks @endsection
@section('content')
<div class="main-content">
    <div class="page-title col-sm-12">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h4 m-0">Banks</h4>
            </div>
            <div class="col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Banks</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <strong>Fill Banks Details</strong>
            <a class="btn btn-sm btn-info float-right rounded-pill ml-5 ml-lg-2"
                href="{{ route('settings.bank.index') }}"> <i class="fas fa-file-alt"></i> Banks</a>
            <a class="btn btn-sm btn-warning rounded-pill text-white float-right " href="javascript:history.go(-1)"> <i
                    class="fas fa-arrow-circle-left"></i> Back</a>
        </div>
        <div class="card-body">
            <form action="{{ route('settings.bank.store',$id) }}" method="POST" id="formid" name="formid">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nf-name">Bank Name </label>
                    <input class="form-control {{ $errors->has('bank_name') ? ' is-invalid' : '' }}" autocomplete="random"
                        value="@if($updatedata!=''){{$updatedata->bank_name}}@endif" id="nf-bank_name" name="bank_name" type="text"
                        placeholder="Enter bank name..." autocomplete="bank_name">
                    @if ($errors->has('bank_name'))
                    <span class="invalid feedback" role="alert">
                        <strong class="text-danger">{{ $errors->first('bank_name') }}.</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="nf-name">Account Holder Name </label>
                    <input class="form-control {{ $errors->has('account_holder_name') ? ' is-invalid' : '' }}" autocomplete="random"
                        value="@if($updatedata!=''){{$updatedata->account_holder_name}}@endif" id="nf-account_holder_name" name="account_holder_name" type="text"
                        placeholder="Enter Account holder name..." autocomplete="account_holder_name">
                    @if ($errors->has('account_holder_name'))
                    <span class="invalid feedback" role="alert">
                        <strong class="text-danger">{{ $errors->first('account_holder_name') }}.</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="nf-name">Account Number </label>
                    <input class="form-control {{ $errors->has('account_number') ? ' is-invalid' : '' }}" autocomplete="random"
                        value="@if($updatedata!=''){{$updatedata->account_number}}@endif" id="nf-account_number" name="account_number" type="text"
                        placeholder="Enter account number..." autocomplete="account_number">
                    @if ($errors->has('account_number'))
                    <span class="invalid feedback" role="alert">
                        <strong class="text-danger">{{ $errors->first('account_number') }}.</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="nf-name">ifsc Code </label>
                    <input class="form-control {{ $errors->has('ifsc_code') ? ' is-invalid' : '' }}" autocomplete="random"
                        value="@if($updatedata!=''){{$updatedata->ifsc_code}}@endif" id="nf-ifsc_code" name="ifsc_code" type="text"
                        placeholder="Enter ifsc code..." autocomplete="ifsc_code">
                    @if ($errors->has('ifsc_code'))
                    <span class="invalid feedback" role="alert">
                        <strong class="text-danger">{{ $errors->first('ifsc_code') }}.</strong>
                    </span>
                    @endif
                </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-sm btn-primary" type="submit">Save</button>
            @if($id="")
            <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
            @endif
        </div>
        </form>
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
                                        <th scope="col">Bank Name</th>
                                        <th scope="col">Account Holder Name</th>
                                        <th scope="col">Account Number</th>
                                        <th scope="col">ifsc Code</th>
                                        <th scope="col">Status</th>
                                        <th scope="col" class="action">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=1; @endphp
                                    @foreach($data as $value)
                                    <tr class="{{$value->id}}">
                                        <th scope="row" class="sr-no"> {{$i++}}</th>
                                        <td>{{$value->bank_name }}</td>
                                        <td>{{$value->account_holder_name }}</td>
                                        <td>{{$value->account_number }}</td>
                                        <td>{{$value->ifsc_code }}</td>

                                        <td>
                                            <span
                                                class="Statuschange badge @if($value->status=='0') badge-danger @else badge badge-success @endif"
                                                data-id="{{$value->id}}" data-model="Bank"
                                                id="Statuschange{{$value->id}}">
                                                @if($value->status=="0") Deactive @else Active @endif
                                            </span>
                                        </td>
                                        <td class="action ">
                                            <a class="icon-btn edit"
                                                href="{{ route('settings.bank.index',$value->id) }}"><i
                                                    class="fal fa-edit" id="show-edit"></i></a>
                                            <a class="icon-btn delete universaldelete" href="javascript:void(0);"
                                                data-status="0" data-id="{{ $value->id}}" data-model="Bank"
                                                id="{{$value->id}}"> <i class="fal fa-trash-alt"
                                                    id="delete-btn"></i></a>
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
    @endsection
    @section('js')
    <script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
    </script>
    @endsection