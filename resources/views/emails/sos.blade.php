<!DOCTYPE html>
<html>

<head>

<style>

body{

font-family:Arial;

}

.box{

padding:20px;

background:#fff3f3;

border:2px solid red;

border-radius:10px;

}

</style>

</head>

<body>

<div class="box">

<h2>🚨 Emergency SOS Alert</h2>

<hr>

<h3>Student Details</h3>

<b>Name :</b>

{{ $student->name }}

<br><br>

<b>Register No :</b>

{{ $student->register_no }}

<br><br>

<b>Department :</b>

{{ $student->department }}

<br><br>

<b>Phone :</b>

{{ $student->phone }}

<br><br>

<b>Email :</b>

{{ $student->email }}

<br><br>

<b>Location :</b>

{{ $location }}

<br><br>

<b>Emergency Message :</b>

{{ $messageText }}

<br><br>

<p style="color:red;font-size:18px;">

Please contact the student immediately.

</p>

</div>

</body>

</html>