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
        <form action="{{ route('complaint.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
          <div class="row">
            <div class="col">

              <div class="mb-3">
                <input type="title" class="form-control" name="title" id="title" placeholder="TITLE OF COMPLAINTS" style="width:100%">
              </div>
{{--
              <div class="mb-3">
                <input type="name" class="form-control" name="name" id="name" placeholder="NAME" style="width:100%">
              </div>

              <div class="mb-3">
                <input type="phone_number" class="form-control" name="phone_number" placeholder="PHONE NUMBER" style="width:100%">
              </div> --}}

              {{-- <div class="mb-3">
                <input type="email" class="form-control" name="email" id="email" placeholder="EMAIL" style="width100%">
              </div> --}}

              <div class="mb-3">
                <input type="date" class="form-control" name="date" id="date" placeholder="DATE" style="width:100%">
              </div>

              <select name="kiosk_number" class="form-select mt-3">
                <option selected>KIOSK NUMBER</option>
                @foreach(range(1, 5) as $y)
                    <option value="{{$y}}">{{$y}}</option>
                @endforeach
            </select>

            <select name="type_maintenance" class="form-select mt-3" aria-label="Default select example">
                <option selected>TYPE OF MAINTENANCE</option>
                <option value="{{ App\Models\Complaint::TYPE_KIOSK_APPLICATION }}">{{ App\Models\Complaint::TYPE_KIOSK_APPLICATION}}</option>
                <option value="{{ App\Models\Complaint::TYPE_KIOSK_PAYMENT }}">{{ App\Models\Complaint::TYPE_KIOSK_PAYMENT}}</option>
                <option value="{{ App\Models\Complaint::TYPE_REPORT }}">{{ App\Models\Complaint::TYPE_REPORT}}</option>
                <option value="{{ App\Models\Complaint::TYPE_PERSONAL_ACCOUNT }}">{{ App\Models\Complaint::TYPE_PERSONAL_ACCOUNT}}</option>
                <option value="{{ App\Models\Complaint::TYPE_OTHERS }}">{{ App\Models\Complaint::TYPE_OTHERS}}</option>
            </select>

                <br>

                <div class="container text-center">
                  <div class="row">

                    <div class="col">
                        <div class="mb-3">
                            <input type="file" name="photo">
                        </div>
                    </div>
                  </div>
                </div>

            </div>
            <div class="col">

                <div class="mb-3">
                    <textarea class="form-control" name="description" placeholder="COMPLAINT DESCRIPTIONS" id="exampleFormControlTextarea1" rows="3" id="complaint_description" style="width: 100%; height: 325px;"></textarea>
                </div>

              <div class="container text-center">
                  <div class="row">

                    <div class="col">
                      <button type="submit" class="btn btn-danger">SUBMIT</button>
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
