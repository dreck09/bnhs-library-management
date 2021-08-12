@extends('layouts.newapp') @section('content')
<div class="container my-5">
    <div class="row">
        <div class="col search">
            <input class="input-search" type="text" placeholder="Search Autor or Title Book">
            <input class="input-button" type="button" value="Search">
        </div>
    </div>

    <!--start book-->
    <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <div class="book-container">
                <div class="image">
                    <img src="{{asset('/images/book.svg')}}" />
                </div>
                <div class="text">
                    <h3>Title</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias suscipit odit placeat natus omnis! Reprehenderit sed non in aliquam deserunt.</p>
                    <p class="color">Author Name</p>
                    <p class="color">Available Book 20</p>
                </div>
            </div>
        </div>

        <!--End Book-->

    </div>
</div>
<footer class="">
    <div class="footer-container">
        <div class="image">
            <img src="{{asset('/images/logo.png')}}" alt="">
            <div class="title">
                <h1>Bulan National High School</h1>
                <p>Library Management System</p>

                <div class="contact-info">
                    <p> Tel No: +63 (2)-12345-123</p>
                </div>
            </div>
        </div>
    </div>
    <div class="term">
        <ul>
            <li><a href="#" class="line">Term and Condition</a></li>
            <li><a href="#">Privacy</a></li>
        </ul>
    </div>
</footer>
@endsection