@extends('layouts.app')

@section('title', 'Products')

@section('scripts')
    <script src="assets/js/slideshow.js"></script>
@endsection

@section('styles')
    <link rel="stylesheet" href="assets/css/slideshow.css">
@endsection

@section('content')
{{--    <h1>This is Dashboard.</h1>--}}
    <!-- Slideshow container -->
    <div class="slideshow-container">

        <!-- Full-width images with number and caption text -->
        <div class="mySlides">
            <div class="numbertext">1 / 4</div>
            <img src="assets/images/img4.jpg" style="max-width:100%; max-height: 500px">
            <div class="text">Caption Text</div>
        </div>

        <div class="mySlides">
            <div class="numbertext">2 / 4</div>
            <img src="assets/images/img2.jpg" style="max-width:100%; max-height: 500px">
            <div class="text">Caption Two</div>
        </div>

        <div class="mySlides">
            <div class="numbertext">3 / 4</div>
            <img src="assets/images/img3.jpg" style="max-width:100%; max-height: 500px">
            <div class="text">Caption Three</div>
        </div>

        <div class="mySlides">
            <div class="numbertext">4 / 4</div>
            <img src="assets/images/img1.jpg" style="max-width:100%; max-height: 500px">
            <div class="text">Caption Three</div>
        </div>

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>

    <!-- The dots/circles -->
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
        <span class="dot" onclick="currentSlide(4)"></span>
    </div>
@endsection
