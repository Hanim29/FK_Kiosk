<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Kiosk Application</title>
  <link href="/bootstrap-5.3.2-dist/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-14FJDO89+9QjFwVhCK0SGQ4gxq6SN6sI2cN6qlMB5+yhkU9ZFhI5WAqBUtVmyrZ3qU5Ia3dC6egxD8tStK1OOQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    .navbar {
      background-color: #d5c535; /* Red navigation bar background */
    }

    .nav-item{
            padding-left: 150px;
        }

    .nav-item.dropdown {
      display: none;
    }
  </style>
</head>

<body>

<div class= "logo">
          <img src="/assets/logo.png" alt="" width="10%">
</div>
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">KIOSK APPLICATION</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">KIOSK PAYMENT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">SALES REPORT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">COMPLAINT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('profile.show') }}">ACCOUNT</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  @yield('content')

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity=" X
