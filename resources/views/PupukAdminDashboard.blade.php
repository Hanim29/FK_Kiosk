<!-- resources/views/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Kiosk Application</title>
    <!-- Include Bootstrap CSS -->
    <link href="/bootstrap-5.3.2-dist/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-14FJDO89+9QjFwVhCK0SGQ4gxq6SN6sI2cN6qlMB5+yhkU9ZFhI5WAqBUtVmyrZ3qU5Ia3dC6egxD8tStK1OOQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom Styles -->
    <style>
        body {
            background-color: #e5754d; /* Set background color */
        }

        .header {
            background-color: #dc3545; /* Set header background color to red */
            color: #ffffff; /* Set header text color to white */
            padding: 10px;
            text-align: center;
        }

        .list-group-item {
            background-color: #FF0000; /* Set list group item background color to red */
            color: #ffffff; /* Set list group item text color to white */
            border-color: #dc3545;
        }

        .list-group-item.active {
            background-color: #bd2130; /* Set active option background color to a darker shade of red */
            border-color: #bd2130;
            color: #AFAFAF;
        }

        .nav-item{
            padding-left: 150px;
        }
    </style>
</head>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
      <img src="/assets/logo.png" alt="" width="10%">
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

<body>

    {{-- <div class="container mt-5">
        <div class="header">
            <h1>Your Kiosk Application</h1>
        </div>

        <div class="row mt-4">
            <div class="col-md-15 offset-md-2">
                <div class="list-group d-flex flex-row">
                    <a href="#" class="list-group-item list-group-item-action active">
                        KIOSK APPLICATION
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">KIOSK PAYMENT</a>
                    <a href="#" class="list-group-item list-group-item-action">SALES REPORT</a>
                    <a href="#" class="list-group-item list-group-item-action">COMPLAINT</a>
                    <a href="{{ route('login') }}" class="list-group-item list-group-item-action">ACCOUNT</a>
                </div>
            </div>
        </div>
    </div> --}}

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- Include Bootstrap JS and Popper.js -->
    <script src="/bootstrap-5.3.2-dist/js/bootstrap.js"></script>

</body>
</html>
