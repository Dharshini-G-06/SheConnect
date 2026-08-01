<!DOCTYPE html>
<html>
<head>

    <title>SheConnect - Student Registration</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:linear-gradient(135deg,#e3f2fd,#ede7f6);
            font-family:Arial,sans-serif;
        }

        .register-box{
            width:700px;
            margin:40px auto;
            background:white;
            padding:35px;
            border-radius:20px;
            box-shadow:0 10px 25px rgba(0,0,0,.15);
        }

        .title{
            text-align:center;
            color:#6f42c1;
            font-weight:bold;
            margin-bottom:30px;
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

<div class="register-box">

<h2 class="title">
Student Registration
</h2>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('register.store') }}"
method="POST"
enctype="multipart/form-data">

@csrf

<div class="row">

<div class="col-md-6 mb-3">
<label>Name</label>
<input type="text" name="name" class="form-control" required>
</div>

<div class="col-md-6 mb-3">
<label>Register Number</label>
<input type="text" name="register_no" class="form-control" required>
</div>

<div class="col-md-6 mb-3">
<label>Department</label>
<input type="text" name="department" class="form-control" required>
</div>

<div class="col-md-6 mb-3">
<label>Year</label>
<select name="year" class="form-control">
<option>1st Year</option>
<option>2nd Year</option>
<option>3rd Year</option>
<option>Final Year</option>
</select>
</div>

<div class="col-md-6 mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control" required>
</div>
<div class="mb-3">
    <label>Parent Email</label>
    <input type="email"
           name="parent_email"
           class="form-control"
           placeholder="Enter Parent Email"
           required>
</div>
<div class="col-md-6 mb-3">
    <label>Parent Phone Number</label>
    <input type="text"
           name="parent_phone"
           class="form-control"
           placeholder="Enter Parent Phone Number"
           required>
</div>

<div class="col-md-6 mb-3">
<label>Phone</label>
<input type="text" name="phone" class="form-control" required>
</div>

<div class="col-md-12 mb-3">
<label>Address</label>
<textarea name="address" class="form-control"></textarea>
</div>
<div class="mb-3">

<label class="form-label">
🏠 Do you stay in Hostel?
</label>

<select name="hostel_status" class="form-control" required>

<option value="">
Select
</option>

<option value="Yes">
Yes - Hostel Student
</option>

<option value="No">
No - Day Scholar
</option>

</select>

</div>
<div class="col-md-6 mb-3">
<label>Photo</label>
<input type="file" name="photo" class="form-control">
</div>

<div class="col-md-6 mb-3">
<label>Password</label>
<input type="password" name="password" class="form-control" required>
</div>

<div class="col-md-6 mb-3">
<label>Confirm Password</label>
<input type="password" name="password_confirmation" class="form-control" required>
</div>

<div class="col-md-12 mt-3">

<button class="btn btn-purple w-100">
Register
</button>

</div>

</div>

</form>

<div class="text-center mt-3">
Already have an account?
<a href="{{ route('login') }}">Login</a>
</div>

</div>

</body>
</html>