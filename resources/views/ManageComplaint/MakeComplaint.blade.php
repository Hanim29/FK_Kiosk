<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<style>
 body{
    padding: 20px;
 }
</style>

<body>
    @extends('index')
    @section('content')

    <form>
        <div class="mb-3">
          <input type="name" class="form-control" id="name"
          placeholder="NAME"
          style="width:50%">
     </div>
    </form>

    <form>
        <div class="mb-3">
          <input type="phone_number" class="form-control" id="phone_number"
          placeholder="PHONE NUMBER"
          style="width:50%">
     </div>
    </form>

    <form>
        <div class="mb-3">
          <input type="email" class="form-control" id="email"
          placeholder="EMAIL"
          style="width:50%">
     </div>
    </form>

    <form>
        <div class="mb-3">
          <input type="date" class="form-control" id="date"
          placeholder="DATE"
          style="width:50%">
     </div>
    </form>

    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 50%;">
          KIOSK NUMBER
        </button>
        <ul class="dropdown-menu" style="width: 50%;">
          <li><a class="dropdown-item" href="#">1</a></li>
          <li><a class="dropdown-item" href="#">2</a></li>
          <li><a class="dropdown-item" href="#">3</a></li>
          <li><a class="dropdown-item" href="#">4</a></li>
          <li><a class="dropdown-item" href="#">5</a></li>
        </ul>
      </div>

      <div class="dropdown" style="padding-top: 1%;">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 50%;">
          TYPE OF MAINTENANCE
        </button>
        <ul class="dropdown-menu" style="width: 50%;">
          <li><a class="dropdown-item" href="#">Kiosk Application</a></li>
          <li><a class="dropdown-item" href="#">Kiosk Payment</a></li>
          <li><a class="dropdown-item" href="#">Report</a></li>
          <li><a class="dropdown-item" href="#">Personal Account</a></li>
          <li><a class="dropdown-item" href="#">Others</a></li>
        </ul>
      </div>





    @endsection
</body>
</html>
