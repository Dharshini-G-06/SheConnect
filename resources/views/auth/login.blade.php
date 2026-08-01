<!DOCTYPE html>
<html>
<head>

    <title>SheConnect Login</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <style>

        body{
            background:#f3f5ff;
        }

        .login-box{

            width:450px;
            margin:60px auto;
            background:#fff;
            padding:35px;
            border-radius:15px;
            box-shadow:0px 0px 20px rgba(0,0,0,.15);

        }

        .logo{

            font-size:32px;
            font-weight:bold;
            color:#6f42c1;
            text-align:center;
            margin-bottom:20px;

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

<div class="logo">
SheConnect
</div>

<form action="{{ route('verifyLogin') }}" method="POST">

@csrf

<div class="mb-3">

<label>Email</label>

<input
type="email"
name="email"
id="email"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Password</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>

<label>OTP</label>

<div class="input-group mb-3">

<input
type="text"
name="otp"
id="otp"
class="form-control"
placeholder="Enter OTP"
required>

<button
type="button"
id="sendOtp"
class="btn btn-primary">

Get OTP

</button>

</div>

<button
type="submit"
class="btn btn-purple w-100">

Login

</button>

<div class="text-center mt-3">

<a href="{{ route('forgot.password') }}">

Forgot Password?

</a>

</div>
<div class="text-center mt-2">

Don't have an account?

<a href="{{ route('register') }}">

Register Here

</a>

</div>

</form>

</div>

@if(session('success'))

<script>
toastr.success("{{ session('success') }}");
</script>

@endif

@if(session('error'))

<script>
toastr.error("{{ session('error') }}");
</script>

@endif

<script>

$.ajaxSetup({

headers:{
'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
}

});

$("#sendOtp").click(function(){

var email=$("#email").val();

if(email=="")
{
toastr.warning("Enter Email First");
return;
}

$.ajax({

url:"{{ route('sendOtp') }}",

type:"POST",

data:{
email:email
},

success:function(response){

if(response.status)
{
toastr.success(response.message);
}
else
{
toastr.error(response.message);
}

},

error:function(xhr){

    console.log(xhr.responseText);

    toastr.error(xhr.responseText);

}

});

});

</script>

</body>
</html>