<!-- 
    Programmer Name: Ms. Lim Jia Yong, Project Manager
    Description: Home / landing page for customers or unregistered user 
    Edited on: 28 February 2022
 -->

@extends('layouts.app')

@section('links')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('bodyID')
{{ 'home' }}@endsection

@section('navTheme')
{{ 'dark' }}@endsection

@section('logoFileName')
{{ URL::asset('/images/White Logo.png') }}@endsection


@section('content')
<section class="banner">
    <div class="container">
        <div class="col-md-10 col-lg-8 details">
            <h3>FRESHEST SUSHI IN TOWN</h3>
            <h1>Experience a taste of sushi as if you are in Japan</h1>
            <button class="primary-btn">Discover menu</button>
        </div>
    </div>
</section>

<section class="chefs">
    <div class="container">
        <h2 class="title flex-center">Meet our chefs</h2>
        <div class="row justify-content-evenly align-items-center chefs-wrapper">
            <div class="card col-lg-3 col-md-8 col-10 mt-5">
                <div class="chef-img d-flex align-items-center justify-content-center">
                    <img src="./images/chef1.jpg" alt="">
                </div>
                <div class="chef-desc d-flex flex-column align-items-center justify-content-start">
                    <p class="chef-name">Chin Chong</p>
                    <p class="chef-position">Kitchen Lead</p>
                </div>
            </div>
            <div class="card col-lg-3 col-md-8 col-10 mt-5">
                <div class="chef-img d-flex align-items-center justify-content-center">
                    <img src="./images/chef2.jpg" alt="">
                </div>
                <div class="chef-desc d-flex flex-column align-items-center justify-content-start">
                    <p class="chef-name">Louis Hansel</p>
                    <p class="chef-position">Sashimi Expert</p>
                </div>
            </div>
            <div class="card col-lg-3 col-md-8 col-10 mt-5">
                <div class="chef-img d-flex align-items-center justify-content-center">
                    <img src="./images/chef3.jpg" alt="">
                </div>
                <div class="chef-desc d-flex flex-column align-items-center justify-content-start">
                    <p class="chef-name">Febrian Zakaria</p>
                    <p class="chef-position">Kitchen Helper</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact">
    <div class="container">
        <h2 class="title flex-center">Contact Us</h2>
        <div class="flex-center contact-wrapper">
        <div class="form-wrapper flex-center">
            <form>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" style="height: 100px"></textarea>
                </div>
                <div class="w-100 flex-center">
                <a href="mailto:zensushi.sdp@gmail.com" class="primary-btn msg-btn w-100 px-3 py-2 text-center rounded">
                    Send Message
                </a>
                </div>
            </form>
        </div>

        <div class="gmap flex-center">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.1468512666984!2d101.69830201467339!3d3.055345397775023!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4abb795025d9%3A0x1c37182a714ba968!2sAsia%20Pacific%20University%20of%20Technology%20%26%20Innovation%20(APU)!5e0!3m2!1sen!2smy!4v1644981583964!5m2!1sen!2smy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" class="rounded"></iframe>
        </div>

        </div>
    </div>
</section>
@endsection