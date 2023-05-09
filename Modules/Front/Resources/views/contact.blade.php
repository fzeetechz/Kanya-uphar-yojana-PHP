@extends('front::layouts.master')
@section('content')
@section('page_title') Contact-us @endsection('page_title')
<div class="page-heading text-center">
    <div class="container zoomIn animated">
        <h1 class="page-title">CONTACT US <span class="title-under"></span></h1>
        <p class="page-description">
            {!! @$data->page_heading ? @$data->page_heading :' Lorem ipsum dolor sit amet, consectetur adipisicing elit Necessitatibus.' !!} 
        </p>
    </div>
</div>
<div class="main-container fadeIn animated">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-12 col-form">
                <h2 class="title-style-2">CONTACT FORM <span class="title-under"></span></h2>
                <form action="{{route('front.contact-us-store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-4">
                            <input type="text" name="name" class="form-control" placeholder="Name*" required>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="mobile" class="form-control" placeholder="Mobile*" required>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="email" name="email" class="form-control" placeholder="E-mail*" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="message" rows="5" class="form-control" placeholder="Message*"
                            required></textarea>
                    </div>
                    <div class="form-group alerts">
                        <div class="alert alert-success" role="alert">
                        </div>
                        <div class="alert alert-danger" role="alert">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary pull-right" value="Send message">
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
            <div class="col-md-4 col-md-offset-1 col-contact">
                <h2 class="title-style-2"> {!! @$data->section_heading ? @$data->section_heading :'CONTACT US' !!} <span class="title-under"></span></h2>
                @if(@$data->section_content =='') 
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, nulla quae possimus id
                        fugit totam perspiciatis ad consequatur natus dolores unde ipsa, architecto, dignissimos corrupti
                        explicabo provident debitis suscipit, beatae!
                    </p>
                    @else
                    {!! @$data->section_content !!}
                    @endif
                <div class="contact-items">
                    <ul class="list-unstyled contact-items-list">
                        <li class="contact-item"> <span class="contact-icon"> <i class="fa fa-map-marker"></i></span>
                            {!! @$address->address !!}</li>
                        <li class="contact-item"> <span class="contact-icon"> <i class="fa fa-phone"></i></span> {!! @$email->mail_id !!}</li>
                        <li class="contact-item"> <span class="contact-icon"> <i class="fa fa-envelope"></i></span>
                        {!! @$contact_number->number !!}</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>
@endsection