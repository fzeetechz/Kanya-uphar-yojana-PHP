@extends('front::layouts.master')
@section('page_title') Registration @endsection('page_title')
@section('content')
<div class="page-heading text-center">
    <div class="container zoomIn animated">
        <h1 class="page-title">ABOUT US <span class="title-under"></span></h1>
        <p class="page-description">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit Necessitatibus.
        </p>
    </div>
</div>
<div class="main-container">
    <div class="container">
        <form class="form-donation" method="post" action="{{route('front.registrations.show-detail')}}">
            @csrf
            <h3 class="title-style-1 text-center">Thank you for your registration <span class="title-under"></span> </h3>
            <div class="row">
                <div class="form-group col-md-10">
                    <input type="text" class="form-control" name="registration_number" id="registration_number" placeholder="Enter Registration Number">
                    @error('registration_number')
                        <div class="text-danger" role="alert">
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="form-group col-md-2">
                    <button type="submit" class="btn btn-primary pull-right text-uppercase btn-sm" name="donateNow">Registration</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $(".form-donation").validate({
                rules: {
                    registration_number: {
                        required: true,
                        digits: true,
                        minlength: 1
                    }
                }
            })
        });
    </script> 
@endsection