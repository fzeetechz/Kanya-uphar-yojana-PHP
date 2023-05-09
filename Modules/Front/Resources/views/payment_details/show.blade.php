@extends('front::layouts.master')
@section('page_title') Registration @endsection('page_title')
@section('content')
<style>
    th {
        color: #1f76bd;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        text-transform: uppercase;
    }
    td {
        color: rgb(66, 8, 8);
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        text-transform: uppercase;
    }
    .responsive {
        width: 100%;
        max-width: 400px;
        height: auto;
    }
</style>
<div class="main-container">
    <div class="container">
        <div class="col-sm-12" style="margin-top: 10%;">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="box bg-white">
                            <div class="box-row">
                                <div class="box-content">
                                    <table id="dataTable" class="table table-striped table-bordered table-hover">
                                        <tbody>
                                            <tr>
                                                <th>Bank Name</th>
                                                <td>{{@$data->bank_name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Account holder name</th>
                                                <td>{{@$data->account_holder_name}}</td>
                                            </tr>
                                            <tr>
                                                <th>account_number</th>
                                                <td>{{@$data->account_number}}</td>
                                            </tr>
                                            <tr>
                                                <th>ifsc Code</th>
                                                <td>{{@$data->ifsc_code}}</td>
                                            </tr>
                                            <tr>
                                                <th> Updated At</th>
                                                <td>{{@$data->updated_at }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <img src="{{getFile('qr_codes',@$qrCode->image)}}" class="responsive">
                    </div>
                </div>
            </div>    
        </div>
</div>
@endsection
