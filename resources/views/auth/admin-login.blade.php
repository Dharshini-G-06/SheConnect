<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SheConnect - Admin Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:linear-gradient(135deg,#6f42c1,#9c6ade);
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            font-family:Arial,sans-serif;
        }

        .login-box{

            width:420px;

            background:white;

            padding:35px;

            border-radius:20px;

            box-shadow:0 10px 25px rgba(0,0,0,.25);

        }

        h2{

            text-align:center;

            color:#6f42c1;

            font-weight:bold;

            margin-bottom:25px;

        }

        .btn-purple{

            background:#6f42c1;

            color:white;

        }

        .btn-purple:hover{

            background:#5b35a3;

            color:white;

        }

    </style>

</head>

<body>

<div class="login-box">

<h2>Admin Login</h2>

@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif

@if(session('error'))

<div class="alert alert-danger">

{{ session('error') }}

</div>

@endif

@if ($errors->any())

<div class="alert alert-danger">

<ul class="mb-0">

@foreach($errors->all() as $error)

<li>{{ $error }}</li>

@endforeach

</ul>

</div>

@endif

<form action="http://127.0.0.1:8000/admin/login" method="POST">

@csrf

<div class="mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
placeholder="Enter Admin Email"
required>

</div>

<div class="mb-3">

<label>Password</label>

<input
type="password"
name="password"
class="form-control"
placeholder="Enter Password"
required>

</div>

<div class="d-grid">

<button class="btn btn-purple">

Login

</button>

</div>

</form>

<hr>

<div class="text-center">

<a href="{{ route('login') }}">

← Back to Student Login

</a>

</div>

</div>

</body>
</html>