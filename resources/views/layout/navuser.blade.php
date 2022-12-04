<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 Custom Auth Login and Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #9400D3;">
        <div class="container">
            <a class="navbar-brand mr-auto" href="{{route('home')}}">Library</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
     
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('account-sign-in')}}">Login</a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('account-create')}}">Register</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="">cart</i></a>
                    </li>
                
                
                </ul>
            </div>
        </div>
    </nav>