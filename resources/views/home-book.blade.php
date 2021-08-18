@extends('layouts.newapp') @section('content')

<div class="container my-5">
    <form action="{{route('home-book-search')}}" method="get" enctype="multipart/form-data">
    <div class="row">
        <div class="col search">
            <input class="input-search" name="query" type="text" placeholder="Search Autor or Title Book">
            <input class="input-button" type="submit" value="Search">
        </div>
    </div>
    </form>

    <!--start book-->
    <div class="row">
        @forelse ($books as $data)
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
                    <p class="color text-success">Available Book {{$data->qty}}</p>
                    @else
                    <p class="color text-danger">Not Avaible</p>
                    @endif
                </div>
            </div>
        </div>
        @empty
            <img src="{{asset('images/unnamed.svg')}}" class="col-md-6 mx-auto mt-5 mb-5">
        @endforelse
        <!--End Book-->
    </div> 
    
    <div class="mx-auto" style="width:200px;">{{ $books->links("pagination::bootstrap-4") }}</div>

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