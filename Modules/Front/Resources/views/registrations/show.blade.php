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
</style>
<div class="main-container">
    <div class="container">
        <div class="col-sm-12" style="margin-top: 10%;">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box bg-white">
                            <div class="box-row">
                                <div class="box-content">
                                    <table id="dataTable" class="table table-striped table-bordered table-hover">
                                        <tbody>
                                            <tr>
                                                <th>Full Name</th>
                                                <td>{{@$data->full_name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Father Name</th>
                                                <td>{{@$data->father_name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Mother Name</th>
                                                <td>{{@$data->mother_name}}</td>
                                            </tr>
                                            <tr>
                                                <th>address</th>
                                                <td>{{@$data->address}}</td>
                                            </tr>
                                            <tr>
                                                <th> Amount</th>
                                                <td>{{@$data->amount}}</td>
                                            </tr>
                                            <tr>
                                                <th> Mobile</th>
                                                <td>{{@$data->mobile}}</td>
                                            </tr>
                                            <tr>
                                                <th> Email</th>
                                                <td>{{@$data->email}}</td>
                                            </tr>
                                            <tr>
                                                <th> Registration number </th>
                                                <td>{{@$data->registration_number }}</td>
                                            </tr>
                                            <tr>
                                                <th> Register By </th>
                                                <td>{{@$data->registerBy->full_name }}</td>
                                            </tr>
                                            <tr>
                                                <th> Document </th>
                                                <td>
                                                    <span class="badge badge-warning">
                                                        <a href="{{getFile('registration_documents',@$data->document)}}" class="text-white" target="_blank">View</a>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th> Register At </th>
                                                <td>{{@$data->created_at }}</td>
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
                </div>
            </div>    
        </div>
</div>
@endsection
