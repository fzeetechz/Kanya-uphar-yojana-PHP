@extends('admin::layouts.master') 
    @section('title') {{rtrim($pageName, 's')}} Details @endsection 
    @section('content')
    <style>
        th {
            color: rgb(8, 0, 255);
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            text-transform: uppercase;
        }
    </style> 
    <div class="main-content">
        <div class="page-title col-sm-12">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1>{{rtrim($pageName, 's')}}</h1>
                </div>
                <div class="col-md-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('registrations.index')}}">{{rtrim($pageName, 's')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{rtrim($pageName, 's')}} Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-12 mb-4">
                    <div class="box bg-white">
                        <div class="box-row">
                            <div class="box-content">
                                <table id="dataTable" class="table table-striped table-bordered table-hover">
                                    <tbody>
                                        <tr>
                                            <th>Full Name:</th>
                                            <td>
                                                {{$data->full_name}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Father Name:</th>
                                            <td>
                                                {{$data->father_name}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Mother Name:</th>
                                            <td>
                                                {{$data->mother_name}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th> Amount</th>
                                            <td>
                                                {{$data->amount}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th> Mobile</th>
                                            <td>
                                                {{$data->mobile}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th> Email</th>
                                            <td>
                                                {{$data->email}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th> Registration number </th>
                                            <td>
                                                {{$data->registration_number }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th> Document </th>
                                            <td>
                                                <span class="badge badge-success">
                                                    <a href="{{getFile('registration_documents',@$registration->document)}}" class="text-white" target="_blank">View</a>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th> Register At </th>
                                            <td>
                                                {{$data->created_at }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th> Updated At</th>
                                            <td>
                                                {{$data->updated_at }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
@endsection