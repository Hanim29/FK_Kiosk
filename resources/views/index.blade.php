<!-- resources/views/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Kiosk Application</title>
    <!-- Include Bootstrap CSS -->
    <link href="/bootstrap-5.3.2-dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            background-color: #f8f9fa; /* Set background color */
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
    </style>
</head>
<body>

    <div class="container mt-5">
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
                    <a href="#" class="list-group-item list-group-item-action">COMPLAIN</a>
                    <a href="#" class="list-group-item list-group-item-action">ACCOUNT</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and Popper.js -->
    <script src="/bootstrap-5.3.2-dist/js/bootstrap.js"></script>
    
</body>
</html>
