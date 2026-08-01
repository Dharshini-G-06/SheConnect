<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>SheConnect Admin Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">


<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    background:#f5f7fb;
    font-family:'Segoe UI',sans-serif;
}


/* Sidebar */

.sidebar{

    position:fixed;
    left:0;
    top:0;
    width:250px;
    height:100vh;
    background:linear-gradient(180deg,#8e44ad,#6c3483);
    color:white;
}


.sidebar .logo{

    padding:25px;
    text-align:center;
    border-bottom:1px solid rgba(255,255,255,.2);

}


.sidebar .logo h3{

    font-size:28px;
    font-weight:bold;

}


.sidebar ul{

    list-style:none;
    padding:20px 0;

}


.sidebar ul li{

    margin:5px 10px;

}


.sidebar ul li a{

    display:flex;
    align-items:center;
    gap:12px;
    padding:14px 18px;
    color:white;
    text-decoration:none;
    border-radius:10px;

}


.sidebar ul li a:hover{

    background:white;
    color:#8e44ad;

}


.logout{

position:absolute;
bottom:20px;
width:100%;
padding:0 15px;

}


.logout a{

display:block;
padding:12px;
text-align:center;
background:white;
color:#8e44ad;
border-radius:10px;
text-decoration:none;
font-weight:bold;

}


/* Main */

.main{

margin-left:250px;
padding:25px;

}



/* Topbar */

.topbar{

background:white;
padding:20px 25px;
border-radius:15px;
display:flex;
justify-content:space-between;
align-items:center;
box-shadow:0 5px 15px rgba(0,0,0,.08);

}


.topbar h3{

color:#6c3483;
font-weight:bold;

}


.admin-box{

display:flex;
align-items:center;
gap:10px;

}


.admin-icon{

width:45px;
height:45px;
border-radius:50%;
background:#8e44ad;
color:white;
display:flex;
justify-content:center;
align-items:center;

}



/* Dashboard Cards */

.dashboard-card{

color:white;
padding:25px;
border-radius:18px;
box-shadow:0 5px 15px rgba(0,0,0,.1);

}


.bg1{
background:linear-gradient(135deg,#7b1fa2,#ab47bc);
}


.bg2{
background:linear-gradient(135deg,#1976d2,#42a5f5);
}


.bg3{
background:linear-gradient(135deg,#ef6c00,#ff9800);
}


.bg4{
background:linear-gradient(135deg,#2e7d32,#66bb6a);
}


.bg5{
background:linear-gradient(135deg,#c2185b,#ec407a);
}



.section-title{

margin-top:35px;
color:#6c3483;
font-weight:bold;

}


.table-box{

background:white;
padding:20px;
border-radius:15px;

}

</style>

</head>


<body>


<!-- SIDEBAR -->

<div class="sidebar">


<div class="logo">

<h3>🌸 SheConnect</h3>

<p>Admin Panel</p>

</div>



<ul>


<li>
<a href="{{ route('admin.dashboard') }}">
<i class="bi bi-speedometer2"></i>
Dashboard
</a>
</li>



<li>
<a href="{{ route('admin.students') }}">
<i class="bi bi-people-fill"></i>
Students
</a>
</li>



<li>

<a href="/admin/sos">

<i class="bi bi-exclamation-triangle-fill"></i>

SOS Monitoring

</a>

</li>



<li>

<a href="{{ route('admin.complaints') }}">

<i class="bi bi-chat-left-text-fill"></i>

Complaints

</a>

</li>




<li>

<a href="{{ route('admin.events') }}">

<i class="bi bi-calendar-event-fill"></i>

Events

</a>

</li>




<li>

<a href="{{ route('admin.health') }}">

<i class="bi bi-heart-pulse-fill"></i>

Health

</a>

</li>




<li>

<a href="{{ route('admin.hostel') }}">

<i class="bi bi-house-door-fill"></i>

Hostel

</a>

</li>




<li>

<a href="{{ route('admin.scholarship') }}">

<i class="bi bi-mortarboard-fill"></i>

Scholarship

</a>

</li>




<li>

<a href="{{ route('admin.visitor') }}">

<i class="bi bi-person-badge-fill"></i>

Visitor Pass

</a>

</li>



</ul>



<div class="logout">

<a href="{{ route('admin.logout') }}">

<i class="bi bi-box-arrow-right"></i>

Logout

</a>

</div>



</div>
<!-- MAIN CONTENT -->

<div class="main">


<!-- TOP BAR -->

<div class="topbar">

<div>

<h3>Admin Dashboard</h3>

<p class="text-muted mb-0">
Welcome back, Administrator 👋
</p>

</div>


<div class="admin-box">

<div class="admin-icon">

<i class="bi bi-person"></i>

</div>


<div>

<strong>Admin</strong>

<br>

<small>SheConnect</small>

</div>

</div>


</div>



<!-- DASHBOARD CARDS -->


<div class="row mt-4">


<div class="col-lg-4 col-md-6 mb-4">


<div class="dashboard-card bg1">


<i class="bi bi-people-fill fs-1"></i>


<h2>

{{ $studentCount ?? 0 }}

</h2>


<p>
Total Students
</p>


</div>


</div>





<div class="col-lg-4 col-md-6 mb-4">


<div class="dashboard-card bg2">


<i class="bi bi-exclamation-triangle-fill fs-1"></i>


<h2>

{{ $sosCount ?? 0 }}

</h2>


<p>
SOS Requests
</p>


</div>


</div>





<div class="col-lg-4 col-md-6 mb-4">


<div class="dashboard-card bg3">


<i class="bi bi-chat-left-text-fill fs-1"></i>


<h2>

{{ $complaintCount ?? 0 }}

</h2>


<p>
Complaints
</p>


</div>


</div>





<div class="col-lg-4 col-md-6 mb-4">


<div class="dashboard-card bg4">


<i class="bi bi-calendar-event-fill fs-1"></i>


<h2>

{{ $eventCount ?? 0 }}

</h2>


<p>
Events
</p>


</div>


</div>





<div class="col-lg-4 col-md-6 mb-4">


<div class="dashboard-card bg5">


<i class="bi bi-mortarboard-fill fs-1"></i>


<h2>

{{ $scholarshipCount ?? 0 }}

</h2>


<p>
Scholarships
</p>


</div>


</div>





<div class="col-lg-4 col-md-6 mb-4">


<div class="dashboard-card bg1">


<i class="bi bi-house-door-fill fs-1"></i>


<h2>

{{ $hostelCount ?? 0 }}

</h2>


<p>
Hostel Requests
</p>


</div>


</div>



</div>






<!-- QUICK ACTIONS -->


<h4 class="section-title">
⚡ Quick Actions
</h4>



<div class="row">



<div class="col-md-3 mb-3">

<a href="{{ route('admin.students') }}"
class="btn btn-primary w-100 p-3">


<i class="bi bi-people-fill"></i>

<br>

Students


</a>


</div>





<div class="col-md-3 mb-3">

<a href="/admin/sos"
class="btn btn-danger w-100 p-3">


<i class="bi bi-exclamation-triangle-fill"></i>

<br>

SOS


</a>


</div>





<div class="col-md-3 mb-3">


<a href="{{ route('admin.scholarship') }}"
class="btn btn-warning w-100 p-3">


<i class="bi bi-mortarboard-fill"></i>

<br>

Scholarship


</a>


</div>





<div class="col-md-3 mb-3">


<a href="{{ route('admin.visitor') }}"
class="btn btn-success w-100 p-3">


<i class="bi bi-person-badge-fill"></i>

<br>

Visitor Pass


</a>


</div>



</div>






<!-- SUMMARY -->


<h4 class="section-title">
📊 Dashboard Summary
</h4>



<div class="table-box">


<div class="row text-center">



<div class="col-md-3">

<h5 class="text-danger">

{{ $pendingSOS ?? 0 }}

</h5>

<p>
Pending SOS
</p>

</div>




<div class="col-md-3">

<h5 class="text-success">

{{ $resolvedSOS ?? 0 }}

</h5>

<p>
Resolved SOS
</p>

</div>





<div class="col-md-3">

<h5 class="text-warning">

{{ $pendingComplaints ?? 0 }}

</h5>

<p>
Pending Complaints
</p>

</div>





<div class="col-md-3">

<h5 class="text-primary">

{{ $resolvedComplaints ?? 0 }}

</h5>

<p>
Resolved Complaints
</p>

</div>




</div>


</div>






<!-- RECENT COMPLAINTS -->


<h4 class="section-title">
📝 Recent Complaints
</h4>



<div class="table-box">


<table class="table table-hover">


<thead class="table-dark">


<tr>

<th>Student</th>

<th>Subject</th>

<th>Status</th>

<th>Date</th>

</tr>


</thead>




<tbody>


@forelse($recentComplaints ?? [] as $complaint)


<tr>


<td>

{{ $complaint->student->name ?? '-' }}

</td>



<td>

{{ $complaint->subject }}

</td>



<td>


@if($complaint->status=="Pending")

<span class="badge bg-danger">

Pending

</span>


@elseif($complaint->status=="Resolved")

<span class="badge bg-success">

Resolved

</span>


@endif


</td>




<td>

{{ $complaint->created_at->format('d-m-Y') }}

</td>



</tr>



@empty


<tr>

<td colspan="4" class="text-center">

No Complaints Found

</td>

</tr>


@endforelse


</tbody>


</table>


</div>






<!-- FOOTER -->


<div class="mt-5 text-center text-muted">


<hr>


<p>

© {{ date('Y') }}

<strong>
SheConnect - Smart Women's Campus Portal
</strong>

<br>

Admin Dashboard

</p>


</div>



</div>


</body>

</html>