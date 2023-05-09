@extends('front::layouts.master')
@section('page_title') About-us @endsection('page_title')
@section('content')
    <div class="page-heading text-center">
        <div class="container zoomIn animated">
            <h1 class="page-title">ABOUT US <span class="title-under"></span></h1>
            <p class="page-description">
            {!! @$data->page_heading ? @$data->page_heading :' Lorem ipsum dolor sit amet, consectetur adipisicing elit Necessitatibus.' !!} 
            </p>
        </div>
    </div>
    <div class="main-container">
        <div class="container">
            <div class="row fadeIn animated">
                <div class="col-md-6">
                    <img src="{{ getFile('about_us_images',@$data->section_image)}}" alt="" class="img-responsive">
                </div>
                <div class="col-md-6">
                    <h2 class="title-style-2">{!! @$data->section_heading ? @$data->section_heading :'ABOUT' !!} <span class="title-under"></span></h2>
                    @if(@$data->section_content =='') 
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, nulla quae possimus id
                        fugit totam perspiciatis ad consequatur natus dolores unde ipsa, architecto, dignissimos corrupti
                        explicabo provident debitis suscipit, beatae!
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi pariatur, voluptatum molestiae
                        voluptas ducimus tempora numquam eligendi quos, quia aut quidem et, odio deleniti amet natus
                        accusamus fugit! Temporibus, tenetur.
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse voluptatem, ea, quisquam vero ullam
                        nesciunt recusandae expedita similique nisi! Ducimus, reiciendis, quia. Explicabo minima error
                        excepturi minus, aperiam illum fugit.
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi pariatur, voluptatum molestiae
                        voluptas ducimus tempora numquam eligendi quos, quia aut quidem et, odio deleniti amet natus
                        accusamus fugit! Temporibus, tenetur.
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse voluptatem, ea, quisquam vero ullam
                        nesciunt recusandae expedita similique nisi! Ducimus, reiciendis, quia. Explicabo minima error
                        excepturi minus, aperiam illum fugit , quia. Explicabo minima error excepturi minus, aperiam illum
                        fugit.
                    </p>
                    @else
                    {!! @$data->section_content !!}
                    @endif
                </div>
            </div>
        </div>
        <!-- /.about-us -->
        <div class="our-team animate-onscroll fadeIn">
            <div class="container">
                <h2 class="title-style-1">Our Team <span class="title-under"></span></h2>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="team-member">
                            <div class="thumnail">
                                <img src="{{ asset('front/assets/images/team/member-1.jpg')}}" alt="" class="cause-img">
                            </div>
                            <h4 class="member-name"><a href="#">Robert C. Numbers</a></h4>
                            <div class="member-position">
                                CO-FOUNDER
                            </div>
                            <div class="btn-holder">
                                <a href="#" class="btn"> <i class="fa fa-envelope"></i> </a>
                                <a href="#" class="btn"> <i class="fa fa-facebook"></i> </a>
                                <a href="#" class="btn"> <i class="fa fa-google"></i> </a>
                                <a href="#" class="btn"> <i class="fa fa-twitter"></i> </a>
                                <a href="#" class="btn"> <i class="fa fa-linkedin"></i> </a>
                            </div>
                        </div>
                        <!-- /.team-member -->
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="team-member">
                            <div class="thumnail">
                                <img src="{{ asset('front/assets/images/team/member-3.jpg')}}" alt="" class="cause-img">
                            </div>
                            <h4 class="member-name"><a href="#">Marjorie R. Echevarria</a></h4>
                            <div class="member-position">
                                CO-FOUNDER
                            </div>
                            <div class="btn-holder">
                                <a href="#" class="btn"> <i class="fa fa-envelope"></i> </a>
                                <a href="#" class="btn"> <i class="fa fa-facebook"></i> </a>
                                <a href="#" class="btn"> <i class="fa fa-google"></i> </a>
                                <a href="#" class="btn"> <i class="fa fa-twitter"></i> </a>
                                <a href="#" class="btn"> <i class="fa fa-linkedin"></i> </a>
                            </div>
                        </div>
                        <!-- /.team-member -->
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="team-member">
                            <div class="thumnail">
                                <img src="{{ asset('front/assets/images/team/member-4.jpg')}}" alt="" class="cause-img">
                            </div>
                            <h4 class="member-name"><a href="#">Allison J. Falls</a></h4>
                            <div class="member-position">
                                CO-FOUNDER
                            </div>
                            <div class="btn-holder">
                                <a href="#" class="btn"> <i class="fa fa-envelope"></i> </a>
                                <a href="#" class="btn"> <i class="fa fa-facebook"></i> </a>
                                <a href="#" class="btn"> <i class="fa fa-google"></i> </a>
                                <a href="#" class="btn"> <i class="fa fa-twitter"></i> </a>
                                <a href="#" class="btn"> <i class="fa fa-linkedin"></i> </a>
                            </div>
                        </div>
                        <!-- /.team-member -->
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="team-member">
                            <div class="thumnail">
                                <img src="{{ asset('front/assets/images/team/member-2.jpg')}}" alt="" class="cause-img">
                            </div>
                            <h4 class="member-name"><a href="#">Bryan B. Stevens</a></h4>
                            <div class="member-position">
                                CO-FOUNDER
                            </div>
                            <div class="btn-holder">
                                <a href="#" class="btn"> <i class="fa fa-envelope"></i> </a>
                                <a href="#" class="btn"> <i class="fa fa-facebook"></i> </a>
                                <a href="#" class="btn"> <i class="fa fa-google"></i> </a>
                                <a href="#" class="btn"> <i class="fa fa-twitter"></i> </a>
                                <a href="#" class="btn"> <i class="fa fa-linkedin"></i> </a>
                            </div>
                        </div>
                        <!-- /.team-member -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>
    </div>
@endsection