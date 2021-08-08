<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>
    {{-- custome css --}}
    <link rel="stylesheet" href="{{ asset('css/custome.css') }}"> {{-- bootstrap css link --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <!-- start header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light background-color">
            <div class="container-fluid">
                <div class="title">
                    <a class="navbar-brand" href="#">Library Management</a>

                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto text-center">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#home">Logout</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <ul class="list-group text-center">
                    <li class="list-group-item active" aria-current="true">
                        Admin Dashboard
                    </li>
                    <li class="list-group-item"><a href="">
                       <a href="{{ route('adminaddbooks') }}">Add Book</a> 
                    </a></li>
                    <li class="list-group-item"><a href="">
                       <a href="{{ route('adminlistbooks') }}">List Books</a> 
                    </a></li>
                   

                </ul>
            </div>
            <div class="col-8">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- 

    <footer>
        <span>This is Footer</span>

    </footer> -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>