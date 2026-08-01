<!DOCTYPE html>
<html>
<head>

<title>
SheConnect - Smart Women's Campus Portal
</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">


<style>


body{

font-family:'Segoe UI',sans-serif;
background:#f8f3ff;

}



/* Navbar */

.navbar{

background:white;
box-shadow:0 5px 15px rgba(0,0,0,.1);

}



.logo{

font-size:28px;
font-weight:bold;
color:#8e44ad!important;

}



/* Hero */


.hero{

padding:80px 0;

background:linear-gradient(135deg,#8e44ad,#d291ff);

color:white;

}



.hero h1{

font-size:50px;
font-weight:bold;

}



.hero p{

font-size:20px;

}



.hero img{

font-size:150px;

}



/* Buttons */


.btn-main{

background:white;
color:#8e44ad;
padding:14px 35px;
border-radius:30px;
font-weight:bold;

}



.btn-main:hover{

background:#6c3483;
color:white;

}



/* Features */


.feature-card{

background:white;
padding:30px;
border-radius:20px;
text-align:center;
height:100%;
box-shadow:0 5px 20px rgba(0,0,0,.08);
transition:.3s;

}


.feature-card:hover{

transform:translateY(-10px);

}


.feature-card i{

font-size:45px;
color:#8e44ad;

}



.feature-card h5{

margin-top:20px;
color:#6c3483;

}



/* About */


.about{

background:white;
padding:50px;
border-radius:20px;

}




footer{

background:#6c3483;
color:white;
padding:20px;
text-align:center;

}


</style>


</head>


<body>



<!-- Navbar -->


<nav class="navbar navbar-expand-lg">


<div class="container">


<a class="navbar-brand logo">

🌸 SheConnect

</a>



<div>


<a href="{{ route('login') }}" 
class="btn btn-outline-primary me-2">

Student Login

</a>



<a href="{{ route('admin.login') }}" 
class="btn btn-primary">

Admin Login

</a>


</div>


</div>


</nav>





<!-- Hero -->


<section class="hero">


<div class="container">


<div class="row align-items-center">



<div class="col-md-7">


<h1>

Smart Women's Campus Portal 🌸

</h1>


<p>

A secure digital platform connecting women students with safety,
health, education and campus services.

</p>



<a href="{{ route('login') }}" 
class="btn btn-main mt-3">

Get Started

</a>


</div>




<div class="col-md-5 text-center">


<div style="font-size:150px">

👩‍🎓

</div>


</div>



</div>


</div>


</section>







<!-- Features -->


<section class="container mt-5">


<h2 class="text-center mb-5"
style="color:#6c3483">

Our Features

</h2>




<div class="row">



<div class="col-md-4 mb-4">


<div class="feature-card">


<i class="bi bi-shield-check"></i>


<h5>
Women's Safety
</h5>


<p>

Emergency SOS support and quick assistance.

</p>


</div>


</div>





<div class="col-md-4 mb-4">


<div class="feature-card">


<i class="bi bi-heart-pulse"></i>


<h5>
Health & Wellness
</h5>


<p>

Track health related information securely.

</p>


</div>


</div>





<div class="col-md-4 mb-4">


<div class="feature-card">


<i class="bi bi-mortarboard"></i>


<h5>
Scholarship Portal
</h5>


<p>

Find and apply for scholarships easily.

</p>


</div>


</div>







<div class="col-md-4 mb-4">


<div class="feature-card">


<i class="bi bi-house-door"></i>


<h5>
Hostel Management
</h5>


<p>

Manage hostel requests and visitor passes.

</p>


</div>


</div>






<div class="col-md-4 mb-4">


<div class="feature-card">


<i class="bi bi-calendar-event"></i>


<h5>
Campus Events
</h5>


<p>

Register and participate in events.

</p>


</div>


</div>






<div class="col-md-4 mb-4">


<div class="feature-card">


<i class="bi bi-chat-left-text"></i>


<h5>
Complaint System
</h5>


<p>

Submit complaints and track status.

</p>


</div>


</div>



</div>


</section>






<!-- About -->


<section class="container mt-5 mb-5">


<div class="about">


<h2 style="color:#6c3483">

About SheConnect

</h2>


<p>

SheConnect is a Smart Women's Campus Portal designed to provide
a safe, connected and digital campus experience for women students.

</p>


</div>


</section>






<footer>


© {{ date('Y') }} SheConnect - Smart Women's Campus Portal


</footer>



</body>

</html>