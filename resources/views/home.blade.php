@extends('layouts.app') @section('content')

<!--Home -->
<section class="home" id="#home">
    <div class="home-container">
        <div class="logo">
            <img src="{{asset('/images/logo.png')}}" alt="">
        </div>
        <div class="text">
            <h1>Bulan National High School</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati nihil maiores illum mollitia? Libero vitae dicta, minima nam atque nobis. Magnam dolore magni consequatur veritatis tempore labore dicta reprehenderit nostrum officia, nobis,
                quidem quam reiciendis pariatur alias velit adipisci placeat suscipit eius consequuntur eligendi illo eveniet provident! Nam, incidunt. Non!</p>
        </div>
    </div>
</section>

<div class="about_us" id="#about_us">
    <div class="text-center title-head">
        <h1>About Us</h1>
    </div>

    <div class="inner-container">
        <div class="text">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam aperiam assumenda eum culpa, earum provident iusto vitae cum minus vero voluptate quas sit velit dolore delectus unde explicabo quisquam similique magni reprehenderit consectetur tenetur!
            Blanditiis temporibus repellat obcaecati excepturi quas cupiditate officia nisi sit enim aspernatur, ipsam voluptatum omnis vero.
        </div>
        <div class="logo-svg">
            <img src="{{asset('/images/about.svg')}}" alt="">
        </div>

    </div>
</div>
<div class="contact_us" id="contact_us">
    <div class="text-center title-head-dark">
        <h1>Contact Us</h1>
    </div>
    <div class="inner-container">

        <div class="logo-svg">
            <img src="{{asset('/images/whitecontact.svg')}}" alt="">
        </div>
        <div class="text">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam aperiam assumenda eum culpa, earum provident iusto vitae cum minus vero voluptate quas sit velit dolore delectus unde explicabo quisquam similique magni reprehenderit consectetur tenetur!
            Blanditiis temporibus repellat obcaecati excepturi quas cupiditate officia nisi sit enim aspernatur, ipsam voluptatum omnis vero.
        </div>
    </div>
</div>

<!--start book-->
<div class="books" id="books">
    <div class="text-center title-head">
        <h1>Borrow Book?</h1>
    </div>
    <div class="inner-container">
        <div class="card">
            <div class="card-title">
                <div class="inner-title">
                    <h3>Find</h3>
                </div>
            </div>
            <div class="card-desc">
                Find research materials, including, books, databases, journals and course reserves.
            </div>
        </div>
        <div class="card">
            <div class="card-title">
                <div class="inner-title">
                    <h3>REQUEST</h3>
                </div>
            </div>
            <div class="card-desc">
                Request resources and services including documents and books.

            </div>
        </div>

        <div class="card">
            <div class="card-title">
                <div class="inner-title">
                    <h3>INTERACT</h3>
                </div>
            </div>
            <div class="card-desc">
                Learn about the library and meet with us for research assistance, writing help, and tech support.
            </div>
        </div>
    </div>

    <div class="left-button text-right">
        <a class="btn" href="#">Check All Books Available</a>
    </div>

</div>





@endsection