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
                        <li class="breadcrumb-item"><a
                                href="{{route('registrations.index')}}">{{rtrim($pageName, 's')}}</a></li>
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
                            <div class="card" style="width: 20rem;">
                                <img class="card-img-top" src="{{getFile('plans',@$data->image)}}" alt="Card image cap">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <h5 class="card-title">{{$data->name}}</h5>
                                    </li>
                                    <li class="list-group-item">Amount : {{$data->amount}}</li>
                                    <li class="list-group-item">Days : {{$data->days}}</li>
                                    <li class="list-group-item">Status :
                                        <span
                                            class="badge @if($data->status=='0') badge-danger @else badge badge-success @endif">@if($data->status=="0")
                                            Deactive @else Active @endif
                                        </span>
                                    </li>
                                </ul>
                                <div class="card-body">
                                    <p class="card-text">{!! $data->text !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection