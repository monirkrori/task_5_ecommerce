<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Light background color */
        }
        .login-card {
            margin-top: 100px; /* Center the card vertically */
            border: 1px solid #ddd; /* Light border for the card */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 2px 10px rgba(0,0,0,0.1); /* Subtle shadow */
        }
        .login-card-header {
            background-color: #FF8500; /* Main theme color */
            color: white; /* Text color */
            border-top-left-radius: 10px; /* Rounded corners */
            border-top-right-radius: 10px; /* Rounded corners */
        }
        .btn-primary {
            background-color: #FF8500; /* Button color */
            border: none; /* No border */
        }
        .btn-primary:hover {
            background-color: #e47b00; /* Darker shade on hover */
        }
    </style>
</head>
<body>
<div class="container">
    @yield('content')
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
