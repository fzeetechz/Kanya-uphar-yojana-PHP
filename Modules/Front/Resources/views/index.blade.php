@extends('front::layouts.master')
@section('content')
@section('page_title') Home @endsection('page_title')
<!-- Carousel================================================== -->
<div id="homeCarousel" class="carousel slide carousel-home" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#homeCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#homeCarousel" data-slide-to="1"></li>
        <li data-target="#homeCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        @forelse($banners as $key=>$banner)
            <div class="item {{$key==0 ? 'active' : ''}}">
                <img src="{{getFile('banners',$banner->banner)}}" alt="">
                <div class="container">
                    <div class="carousel-caption">
                        <h2 class="carousel-title bounceInDown animated slow">Because they need your help</h2>
                        <h4 class="carousel-subtitle bounceInUp animated slow ">Do not let them down</h4>
                        <a href="{{route('front.registrations.create')}}" style="text-transform: uppercase;" class="text-uppercase btn btn-lg btn-secondary hidden-xs bounceInUp animated slow">Registration</a>
                    </div>
                    <!-- /.carousel-caption -->
                </div>
            </div>
        @empty
        <div class="item active">
            <img src="{{ asset('front/assets/images/slider/home-slider-1.jpg')}}" alt="">
            <div class="container">
                <div class="carousel-caption">
                    <h2 class="carousel-title bounceInDown animated slow">Because they need your help</h2>
                    <h4 class="carousel-subtitle bounceInUp animated slow ">Do not let them down</h4>
                    <a href="{{route('front.registrations.create')}}" style="text-transform: uppercase;" class="text-uppercase btn btn-lg btn-secondary hidden-xs bounceInUp animated slow">Registration</a>
                </div>
                <!-- /.carousel-caption -->
            </div>
        </div>
        <!-- /.item -->
        <div class="item ">
            <img src="{{ asset('front/assets/images/slider/home-slider-2.jpg')}}" alt="">
            <div class="container">
                <div class="carousel-caption">
                    <h2 class="carousel-title bounceInDown animated slow">Together we can improve their lives</h2>
                    <h4 class="carousel-subtitle bounceInUp animated slow"> So let's do it !</h4>
                    <a href="{{route('front.registrations.create')}}" style="text-transform: uppercase;" class="text-uppercase btn btn-lg btn-secondary hidden-xs bounceInUp animated slow">Registration</a>
                </div>
                <!-- /.carousel-caption -->
            </div>
        </div>
        <!-- /.item -->
        <div class="item ">
            <img src="{{ asset('front/assets/images/slider/home-slider-3.jpg')}}" alt="">
            <div class="container">
                <div class="carousel-caption">
                    <h2 class="carousel-title bounceInDown animated slow">A penny is a lot of money, if you have not got
                        a penny.
                    </h2>
                    <h4 class="carousel-subtitle bounceInUp animated slow">You can make the diffrence !</h4>
                    <a href="{{route('front.registrations.create')}}" style="text-transform: uppercase;" class="text-uppercase btn btn-lg btn-secondary hidden-xs bounceInUp animated slow">Registration</a>
                </div>
                <!-- /.carousel-caption -->
            </div>
        </div>
        <!-- /.item -->
        @endforelse
    </div>
    <a class="left carousel-control" href="#homeCarousel" role="button" data-slide="prev">
        <span class="fa fa-angle-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#homeCarousel" role="button" data-slide="next">
        <span class="fa fa-angle-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- /.carousel -->
<div class="section-home about-us fadeIn animated">
    <div class="container">
        <!-- <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="about-us-col">
                    <div class="col-icon-wrapper">
                        <img src="{{ asset('front/assets/images/icons/programs-icon.png')}}" alt="">
                    </div>
                    <h3 class="col-title">our programs</h3>
                    <div class="col-details">
                        <p>Lorem ipsum dolor sit amet consect adipisscin elit proin vel lectus ut eta esami vera dolor
                            sit amet consect
                        </p>
                    </div>
                    <a href="#" class="btn btn-primary"> Read more </a>
                </div>
            </div>
        </div> -->
        <div class="row" style="margin-top: 2%;">
            @foreach($plans as $key=>$plan)
            <a href="">
                <div class="col-md-3 col-sm-6">
                    <div class="about-us-col">
                        <div class="col-icon-wrapper">
                            <img src="{{getFile('plans',$plan->image)}}" class="rounded" style="width:  90px;
                            height: 90px; object-fit: cover;">
                        </div>
                        <h3 class="col-title" style="text-transform: capitalize;">{{$plan->name}}</h3>
                        <h3 class="col-title" style="text-transform: capitalize;">{{$plan->days}} Days</h3>
                        <div class="col-details">
                            <p>{{implode(' ', array_slice(explode(' ', @$plan->text), 0, 15))}}
                            </p>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
<!-- /.about-us -->
<div class="section-home home-reasons">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="reasons-col animate-onscroll fadeIn">
                    <img src="{{getFile('home_page',@$home_page_content->middle_section_image_right)}}" alt="">
                    <div class="reasons-titles">
                        <h3 class="reasons-title">{{@$home_page_content->middle_section_right_heading_text}}</h3>
                        <h5 class="reason-subtitle">{{@$home_page_content->middle_section_right_sub_heading_text}}</h5>
                    </div>
                    <div class="on-hover hidden-xs">
                        {!!@$home_page_content->middle_section_right_text!!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="reasons-col animate-onscroll fadeIn">
                    <img src="{{getFile('home_page',@$home_page_content->middle_section_image_left)}}" alt="">
                    <div class="reasons-titles">
                        <h3 class="reasons-title">{{@$home_page_content->middle_section_left_heading_text}}</h3>
                        <h5 class="reason-subtitle">{{@$home_page_content->middle_section_left_sub_heading_text}}</h5>
                    </div>
                    <div class="on-hover hidden-xs">
                        {!!@$home_page_content->middle_section_left_text!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection