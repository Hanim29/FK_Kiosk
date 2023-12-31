<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FK KIOSK</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-14FJDO89+9QjFwVhCK0SGQ4gxq6SN6sI2cN6qlMB5+yhkU9ZFhI5WAqBUtVmyrZ3qU5Ia3dC6egxD8tStK1OOQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css"><style>

    .navbar {
      background-color: #dc3545; /* Red navigation bar background */
    }

    .nav-item{
            padding-left: 150px;
        }

    .nav-item.dropdown {
      display: none;
    }

    @media print {
      .no-print {
          display: none;
      }
      /* Portrait orientation */
      @page {
          size: A4; /* Or other paper size */
          margin: 1cm; /* Set your preferred margins */
      }
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
            <a class="nav-link{{ request()->routeIs('applications.') ? ' active' : '' }}" href="{{ route('applications.index') }}">KIOSK APPLICATION</a>
          </li>
          <li class="nav-item">
            <a class="nav-link{{ request()->routeIs('payments.*') ? ' active' : '' }}" href="{{ route('payments.index') }}">PAYMENTS</a>
          </li>        
          <li class="nav-item">

            <a class="nav-link{{ request()->routeIs('sales.*') ? ' active' : '' }}" href="{{ route('sales.index') }}">SALES REPORT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link{{ request()->routeIs('complaint.*') ? ' active' : '' }}" href="#">COMPLAINT</a>

          </li>
          @auth 
            <li class="nav-item">
              <a class="nav-link{{ request()->routeIs('dashboard') ? ' active' : '' }}" href="{{ route('dashboard') }}">ACCOUNT</a>
            </li>
          @endauth
          @guest
          <li class="nav-item">

            <a class="nav-link{{ request()->routeIs('dashboard') ? ' active' : '' }}" href="{{ route('login') }}">ACCOUNT</a>

          </li>
          @endguest 
        </ul>
      </div>
    </div>
  </nav>


  @yield('content')

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  @stack('js')  
  @stack('modal')  
