@extends('layouts.app')

@section('title')
    Kiosk Payment
@endsection

@section('content')
    @include('layouts.navbar')

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Meta Information -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kiosk Payment</title>

        <!-- Bootstrap CSS from CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <!-- Custom Styles -->
        <style>
            /* Custom Styles */
            .header {
                padding: 30px;
                text-align: center;
            }
        </style>
    </head>

    <body>
        <!-- Content from the first code -->
        <div class="header">
            <h1>Welcome to Kiosk Payment</h1>
            <p>This is a simple example of content added to the page.</p>
        </div>
        <!-- End of Content -->

        <!-- Content from the second code -->
        <div class="container" style="margin-top: 20px">
            <div class="row">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show mx-auto" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="col-md-12">
                    <h2 style="text-align: center; margin-bottom: 30px">Payment List of Kiosk Application</h2>
                    <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Application Number</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data_payment as $payment)
                                <tr>
                                    <td>{{$payment->id}}</td>
                                    <td>{{$payment->appNum}}</td>
                                    <td>{{$payment->status}}</td>
                                    <td>{{$payment->action}}</td>
                                    <td>
                                        <a href="paymentparticipant/{{$payment->id}}/edit" class="btn btn-minor">EDIT</a>
                                    </td>
                                    <td>
                                        <a href="paymentparticipant/{{$payment->id}}/delete" class="btn btn-danger" title="Delete" onclick="return confirm('Confirm to delete?')">DELETE</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End of Content -->

        @include('layouts.footer')

        <!-- Scripts -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript">
            $(document).ready( function () {
                $('#table_id').DataTable();
            } );
        </script>
        <!-- End of Scripts -->

    </body>

    </html>
    <!-- End of Content -->
@endsection
