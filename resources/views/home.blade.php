{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Dashboard') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    {{ __('You are logged in!') }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous"
    />

    <style>
        body {
            background-color: #ecf3f2;
        }

        .navbar {
            background-color: #56b9b3;
        }

        #pageTitle {
            color: #56b9b3;
            margin-top: 4rem;
        }

        .menu {
            width: 10rem;
            height: 10rem;
            background-color: #fff;
            border-radius: 1rem;
        }

        .icon {
            width: 6rem;
            height: 6rem;
        }

        #btnLogout {
            border-radius: 8px;
        }
        .menuCard {
            color: #56b9b3; /* Set the text color for card body */

        }


    </style>

    <title>JurnalKu</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light px-4">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-light" href="#">JurnalKu</a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div
            class="collapse navbar-collapse justify-content-center"
            id="navbarNavAltMarkup"
        >
            <div class="navbar-nav">
                <a class="nav-link text-light" href="{{ route('home') }}">Home</a>
                <a class="nav-link text-light" href="{{ route('books.index') }}">Books</a>
                <a class="nav-link text-light" href="{{ route('journals.index') }}">Journals</a>
                <a class="nav-link text-light" href="{{ route('articles.index') }}">Articles</a>
                <a class="nav-link text-light" href="{{ route('dashboard.index') }}">Dashboard</a>

            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<div id="content" class="d-flex flex-column">
    <h1 id="pageTitle" class="fw-bold text-center">Welcome to JurnalKu</h1>
    <div class="d-flex flex-row justify-content-center mt-4">
        <a class="menuCard" href="{{ route('books.index') }}">

        <div
            id="menu1"
            class="menu mx-4 shadow d-flex flex-column justify-content-center"
        >
            <img src="../assets/book.svg" class="icon mx-auto mt-auto" alt="" />
            <p class="text-center fs-5">Book</p>
        </div>
        </a>
        <a class="menuCard" href="{{ route('journals.index') }}">
        <div
            id="menu2"
            class="menu mx-4 shadow d-flex flex-column justify-content-center"
        >
            <img src="../assets/journal.svg" class="icon mx-auto mt-auto" alt="" />
            <p class="text-center fs-5">Journal</p>
        </div>
        </a>
        <a class="menuCard" href="{{ route('articles.index') }}">
        <div
            id="menu3"
            class="menu mx-4 shadow d-flex flex-column justify-content-center"
        >
            <img src="../assets/article.svg" class="icon mx-auto mt-auto" alt="" />
            <p class="text-center fs-5">Article</p>
        </div>
        </a>
        <a class="menuCard" href="{{ route('dashboard.index') }}">
        <div
            id="menu4"
            class="menu mx-4 shadow d-flex flex-column justify-content-center"
        >
            <img src="../assets/user.svg" class="icon mx-auto mt-auto" alt="" />
            <p class="text-center fs-5">Dashboard</p>
        </div>
        </a>
    </div>
</div>
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"
></script>
</body>
</html>

