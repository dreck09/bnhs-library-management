@extends('layouts.app') @section('content')

<!--Home -->
<section class="home" id="home">
    <div class="home-container">
        <div class="logo">
            <img src="{{asset('/images/logo.png')}}" height="450" alt="">
        </div>
        <div class="text">
            <h1 class="text-center">Bulan National High School</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati nihil maiores illum mollitia? Libero vitae dicta, minima nam atque nobis. Magnam dolore magni consequatur veritatis tempore labore dicta reprehenderit nostrum officia, nobis,
                quidem quam!</p>
            <br>
            <div class="text-center">
            <h3>Mission</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati nihil maiores illum mollitia? Libero vitae dicta, minima nam atque nobis. Magnam dolore magni consequatur veritatis tempore labore dicta reprehenderit nostrum officia, nobis,
                quidem quam reiciendis pariatur alias velit adipisci placeat suscipit eius consequuntur eligendi illo eveniet provident! Nam, incidunt. Non!</p>
            <br>
            <h3>Vision</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati nihil maiores illum mollitia? Libero vitae dicta, minima nam atque nobis. Magnam dolore magni consequatur veritatis tempore labore dicta reprehenderit nostrum officia, nobis,
            quidem quam reiciendis pariatur alias velit adipisci placeat suscipit eius consequuntur eligendi illo eveniet provident! Nam, incidunt. Non!</p>
            <br>
            <h3>Goal</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati nihil maiores illum mollitia? Libero vitae dicta, minima nam atque nobis. Magnam dolore magni consequatur veritatis tempore labore dicta reprehenderit nostrum officia, nobis,
            quidem quam reiciendis pariatur alias velit adipisci placeat suscipit eius consequuntur eligendi illo eveniet provident! Nam, incidunt. Non!</p>
            <br>
            </div>
           
        </div>
    </div>
</section>

<!--start book-->
<div class="books pb-5 pt-5" id="books">
    <div class="text-center title-head">
        <h1>Borrow Book?</h1>
    </div>
    <div class="inner-container">
        <div class="card">
           
            <div class="card-desc">
                Find research materials, including, books, databases, journals and course reserves.
            </div>
        </div>
        <div class="card">
            
            <div class="card-desc">
                Request resources and services including documents and books.

            </div>
        </div>

        <div class="card">
         
            <div class="card-desc">
                Learn about the library and meet with us for research assistance, writing help, and tech support.
            </div>
        </div>
    </div>

    <div class="left-button text-right">
        <a class="btn" href="{{route('home-book')}}">Check All Books Available</a>
    </div>

</div>





@endsection