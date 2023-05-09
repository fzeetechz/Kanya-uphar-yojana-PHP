@extends('admin::layouts.master')
@section('title') {{@$data ? 'Edit' : 'Create' }} {{rtrim($pageName, 's')}} @endsection
@section('content')
<div class="main-content">
    <div class="page-title col-sm-12">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h4>{{@$data ? 'Edit' : 'Create' }} {{rtrim($pageName, 's')}}</h4>
            </div>
            <div class="col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{@$data ? 'Edit' : 'Create' }} {{rtrim($pageName, 's')}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header"><strong>Fill Content</strong> <a href="{{ route('plans.index') }}" class="btn btn-sm btn-info float-right rounded-pill ml-5 ml-lg-2">{{$pageName}}</a>
            <a class="btn btn-sm btn-warning rounded-pill text-white float-right " href="javascript:history.go(-1)"><i
                    class="fas fa-arrow-circle-left"></i> Back </a>
        </div>
        <div class="card-body">
            <form class="form-donation" method="post" enctype="multipart/form-data" action="{{route('plans.store')}}">
                @csrf
                <div class="row">
                    <input type="text" hidden value="{{@$data->id}}" name="id">
                    <div class="form-group col-md-3">
                        <label class="col-form-label starlabel">Name : </label>
                        <input type="text" class="form-control" name="name" value="{{@$data->name}}" placeholder="Full name*">
                        @error('name')
                        <div class="text-danger" role="alert">
                            <span>{{ $message }}</span>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label class="col-form-label starlabel">Amount : </label>
                        <input type="text" class="form-control" name="amount" value="{{@$data->amount}}" id="amount" placeholder="Amount*">
                        @error('amount')
                        <div class="text-danger" role="alert">
                            <span>{{ $message }}</span>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label class="col-form-label starlabel">Days : </label>
                        <input type="text" class="form-control" name="days" value="{{@$data->days}}" id="days" placeholder="Days*">
                        @error('days')
                        <div class="text-danger" role="alert">
                            <span>{{ $message }}</span>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label class="col-form-label starlabel">image : </label>
                        <input type="file" name="image" value="{{@$data->image}}"
                            class="form-control  @error('image') is-invalid @enderror">
                        @if ($errors->has('image'))
                            <span class="invalid feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('image') }}.</strong>
                            </span>
                        @endif
                    </div>
                    @if(@$data->image)
                        <div class="col-3">
                            <a href="{{getFile('plans',@$data->image)}}" class="text-white" target="_blank"><img src="{{getFile('plans',@$data->image)}}" width="100" class="img-thumbnail"></a>
                        </div>
                    @endif
                </div>
                    <div class="form-group row">
                        <div class="form-group col-md-12">
                            <label class="col-form-label starlabel" for="text">Text :</label>
                            <textarea class="form-control" id="text" rows="3" name="text">{{@$data->text}}</textarea>
                            @if ($errors->has('text'))
                                <span class="invalid feedback" role="alert">
                                    <strong class="text-danger">{{ $errors->first('text') }}.</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-sm btn-primary" type="submit">Save</button>
                    <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
                </div>
            </form>
    </div>
    @endsection
    @section('js')
        <script>
            $(document).ready(function() {
                $(".form-donation").validate({
                    rules: {
                        name: {
                            required  : true,
                        },
                        amount: {
                            required: true,
                            number: true,
                            minlength: 1
                        },
                        days: {
                            required: true,
                            number: true,
                            minlength: 1
                        },
                        text: {
                            required  : true,
                        },
                        image: {
                            required  : {{@$data ? false : true}},
                        }
                    }
                })
            });
        </script>
    @endsection