<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <title>Complaint Form</title>

</head>

<style>
 body{
    padding: 20px;
 }
 
 .red-box-container {
    padding-top: 10px;
    display: flex;                 /* Enable flexbox layout */
    flex-direction: column;        /* Arrange elements vertically */
    justify-content: center;       /* Center elements horizontally */
    align-items: center;          /* Center elements vertically */
    height: 500px;                 /* Fill the entire viewport height */
    width: 500px;                  /* Fill the entire viewport width */
    background-color: #dc3545;  /* Set the background color to red */
    border-radius: 10px;    /* Optional: Add rounded corners */
    margin-left: auto;
    margin-right: auto;
}

.white-box-container {
    background-color: white;  /* Set the background color to red */
    padding: 10px;          /* Add padding for content spacing */
    border-radius: 10px;    /* Optional: Add rounded corners */
    margin-left: 10px;
    margin-right: 10px;
}

.registration-options {
    display: grid;
    padding: 50px; 
    grid-template-columns: 1fr 1fr; /* Create two equal-width columns */
}
.jarak{
    padding: 10px;
}
</style>

<body>
    @extends('index')
    @section('content')
<div class="jarak">

</div>
    <div class="red-box-container" >
        <h2 class="heading">Register as</h2>

        <div class="registration-options">
            <div class ="white-box-container">
                <a href="{{ route('register.student') }}">
                    <i class="fa-solid fa-graduation-cap fa-10x"></i>
                </a>
            </div>
            <div class ="white-box-container">
                <a href="{{ route('register.vendor') }}">
                    <i class="fa-solid fa-shop fa-10x"></i>
                </a>
            </div>
        </div>

        <div class="back-to-login">
            <a href="{{ route('login') }}">Back to login</a>
        </div>
    </div>

    @endsection
</body>

</html>
