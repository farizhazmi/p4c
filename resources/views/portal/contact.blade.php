@extends('front.app')

@section('content')

        <!--=====================================-->
        <!--=       Breadcrumb Area Start      =-->
        <!--=====================================-->


        <div class="edu-breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-inner">
                    <div class="page-title">
                        <h1 class="title">Contact Me</h1>
                    </div>
                    <ul class="edu-breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('/') }}">Home</a></li>
                        <li class="separator"><i class="icon-angle-right"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact Me</li>
                    </ul>
                </div>
            </div>
            <ul class="shape-group">
                <li class="shape-1">
                    <span></span>
                </li>
                <li class="shape-2 scene"><img data-depth="2" src="assets/images/about/shape-13.png" alt="shape"></li>
                <li class="shape-3 scene"><img data-depth="-2" src="assets/images/about/shape-15.png" alt="shape"></li>
                <li class="shape-4">
                    <span></span>
                </li>
                <li class="shape-5 scene"><img data-depth="2" src="assets/images/about/shape-07.png" alt="shape"></li>
            </ul>
        </div>

        <!--=====================================-->
        <!--=       Contact Me Area Start       =-->
        <!--=====================================-->
        <section class="section-gap-equal contact-me-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-9">
                        <div class="contact-me">
                            <div class="inner">
                                <div class="thumbnail">
                                    <div class="thumb">
                                        <img src="assets/images/others/contact-me.jpg" alt="Contact Me">
                                    </div>
                                    <ul class="shape-group">
                                        <li class="shape-1 scene">
                                            <img data-depth="1.4" src="assets/images/about/shape-13.png" alt="Shape">
                                        </li>
                                        <li class="shape-2 scene">
                                            <img data-depth="-1.4" src="assets/images/counterup/shape-02.png" alt="Shape">
                                        </li>
                                        <li class="shape-3">
                                            <img src="assets/images/about/shape-07.png" alt="Shape">
                                        </li>
                                    </ul>
                                </div>
                                <div class="contact-us-info">
                                    <h3 class="heading-title">I will Answer all Your Questions</h3>
                                    <ul class="address-list">
                                        <li>
                                            <h5 class="title">Address</h5>
                                            <p>Studio 76d, Riley Ford, North Michael chester, CF99 6QQ</p>
                                        </li>
                                        <li>
                                            <h5 class="title">Email</h5>
                                            <p><a href="mailto:edublink@example.com">edublink@example.com</a></p>
                                        </li>
                                        <li>
                                            <h5 class="title">Phone</h5>
                                            <p><a href="tel:+0914135548598">(+091) 413 554 8598</a></p>
                                        </li>
                                    </ul>
                                    <ul class="social-share">
                                        <li><a href="#"><i class="icon-share-alt"></i></a></li>
                                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                                        <li><a href="#"><i class="icon-linkedin2"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection        