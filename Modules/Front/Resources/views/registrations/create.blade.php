@extends('front::layouts.master')
@section('page_title') Registration @endsection('page_title')
@section('content')
<style>
    .error {
        color: rgb(255, 60, 0);
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        text-transform: capitalize;
    }
</style>
<div class="main-container">
    <div class="container">
        <div class="card" style="margin-top: 10%;">
            <div class="card-body">
                <form class="form-donation" method="post" enctype="multipart/form-data"
                    action="{{route('registrations.store')}}">
                    @csrf
                    <div class="row">
                        <input type="text" hidden value="{{@$data->id}}" name="id">
                        <div class="form-group col-md-3">
                            <label class="col-form-label starlabel">Full Name : </label>
                            <input type="text" class="form-control" name="full_name" value="{{@$data->full_name}}"
                                placeholder="Full name*">
                            @error('full_name')
                            <div class="text-danger" role="alert">
                                <span>{{ $message }}</span>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label class="col-form-label starlabel">Father Name: </label>
                            <input type="text" class="form-control" name="father_name" value="{{@$data->father_name}}"
                                placeholder="Father Name*">
                            @error('father_name')
                            <div class="text-danger" role="alert">
                                <span>{{ $message }}</span>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label class="col-form-label starlabel">Mother Name : </label>
                            <input type="text" class="form-control" name="mother_name" value="{{@$data->mother_name}}"
                                placeholder="Mother Name*">
                            @error('full_name')
                            <div class="text-danger" role="alert">
                                <span>{{ $message }}</span>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label class="col-form-label starlabel">Amount : </label>
                            <input type="text" class="form-control" name="amount" value="{{@$data->amount}}" id="amount"
                                placeholder="Amount*">
                            @error('amount')
                            <div class="text-danger" role="alert">
                                <span>{{ $message }}</span>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label class="col-form-label">Email : </label>
                            <input type="text" class="form-control" name="email" value="{{@$data->email}}"
                                placeholder="Email">
                            @error('email')
                            <div class="text-danger" role="alert">
                                <span>{{ $message }}</span>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label class="col-form-label starlabel">Mobile : </label>
                            <input type="text" class="form-control" name="mobile" value="{{@$data->mobile}}"
                                placeholder="Mobile*">
                            @error('mobile')
                            <div class="text-danger" role="alert">
                                <span>{{ $message }}</span>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label class="col-form-label starlabel">Document : </label>
                            <input type="file" name="document" value="{{@$data->document}}"
                                class="form-control  @error('document') is-invalid @enderror">
                            @if ($errors->has('document'))
                            <span class="invalid feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('document') }}.</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group col-md-3">
                            <label class="col-form-label starlabel">Plans </label>             
                            <select class="form-control" name="plan_id">
                                <option value="">--Select Plan--</option>
                                @foreach($plans as $plan )
                                    <option value="{{$plan->id}}">{{$plan->name}} ({{rtrim($plan->amount, '.0');}})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-md-12">
                            <label class="col-form-label starlabel" for="address">Address / Location</label>
                            <textarea class="form-control" id="address" rows="3"
                                name="address">{{@$data->address}}</textarea>
                            @if ($errors->has('address'))
                            <span class="invalid feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('address') }}.</strong>
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
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $(".form-donation").validate({
            rules: {
                full_name: {
                    required: true,
                },
                plan_id: {
                    required: true,
                },
                father_name: {
                    required: true,
                },
                mother_name: {
                    required: true,
                },
                amount: {
                    required: true,
                    number: true,
                    minlength: 1
                },
                mobile: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                email: {
                    email: true,
                },
                address: {
                    required: true,
                },
                document: {
                    required: true,
                },
            }
        })
    });
</script>
@endsection