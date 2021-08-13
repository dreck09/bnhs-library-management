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
        @foreach($books as $data)
        <div class="col-md-4 col-sm-6 col-12 bookouter">
            <div class="book-container">
                <div class="image">
                    <img src="/storage/books_image/{{$data->image}}" />
                </div>
                <div class="text">
                    <h3>{{$data->title}}</h3>
                    <p>{{$data->description}}</p>
                    <p class="color">{{$data->author}}</p>
                    @if(!$data->qty == 0)
                    <p class="color">Available Book {{$data->qty}}</p>
                    @else
                    <p class="text-danger">Not Avaible</p>
                    @endif
                </div>
            </div>
        </div>
        @endforeach

        
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