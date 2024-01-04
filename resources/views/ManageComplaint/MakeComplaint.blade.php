<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Complaint Form</title>

</head>

<style>
 body{
    padding: 20px;
 }
</style>

<body>
    @extends('index')

    @section('content')

      <div class="container text-center mt-3">
        <h1>Make Complaint</h1>
        <form action="">
          <div class="row">
            <div class="col">

              <div class="mb-3">
                <input type="title" class="form-control" id="title" placeholder="TITLE OF COMPLAINTS" style="width:100%">
              </div>

              <div class="mb-3">
                <input type="name" class="form-control" id="name" placeholder="NAME" style="width:100%">
              </div>

              <div class="mb-3">
                <input type="phone_number" class="form-control" id="phone_number" placeholder="PHONE NUMBER" style="width:100%">
              </div>

              <div class="mb-3">
                <input type="email" class="form-control" id="email" placeholder="EMAIL" style="width100%">
              </div>

              <div class="mb-3">
                <input type="date" class="form-control" id="date" placeholder="DATE" style="width:100%">
              </div>

              <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 100%;">
                    KIOSK NUMBER
                  </button>
                  <ul class="dropdown-menu" style="width: 100%;">
                    <li><a class="dropdown-item" href="#">1</a></li>
                    <li><a class="dropdown-item" href="#">2</a></li>
                    <li><a class="dropdown-item" href="#">3</a></li>
                    <li><a class="dropdown-item" href="#">4</a></li>
                    <li><a class="dropdown-item" href="#">5</a></li>
                  </ul>
                </div>

                <div class="dropdown" style="padding-top: 1%; margin-bottom:1%">
                  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 100%;">
                    TYPE OF MAINTENANCE
                  </button>
                  <ul class="dropdown-menu" style="width: 100%;">
                    <li><a class="dropdown-item" href="#">Kiosk Application</a></li>
                    <li><a class="dropdown-item" href="#">Kiosk Payment</a></li>
                    <li><a class="dropdown-item" href="#">Report</a></li>
                    <li><a class="dropdown-item" href="#">Personal Account</a></li>
                    <li><a class="dropdown-item" href="#">Others</a></li>
                  </ul>
                </div>

                <br>

                <div class="container text-center">
                  <div class="row">

                    <div class="col">
                      <button type="button" class="btn btn-danger" style="width: 100%; padding-top: 1%; margin-bottom:1%" >Add Photo
                          <i class ="fa fa-camera"></i>
                      </button>
                    </div>
                  </div>
                </div>

            </div>
            <div class="col">

              <div class="mb-3">
                <input type="complaint_description" class="form-control" id="complaint_description" placeholder="COMPLAINT DESCRIPTIONS" style="width: 100%; height: 325px;">
              </div>

              <div class="container text-center">
                  <div class="row">
                    <div class="col">
                      <a href="/ManageComplaint/add"> <button type="button" class="btn btn-danger">DETAILS</button> </a>
                    </div>

                    <div class="col">
                      <a href=""><button type="button" class="btn btn-danger">SUBMIT</button></a>
                    </div>
                  </div>
              </div>

            </div>
          </div>
        </form>
      </div>

    @endsection
</body>
</html>
