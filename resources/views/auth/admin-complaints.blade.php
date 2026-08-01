<!DOCTYPE html>
<html>

<head>

<title>Admin Complaint Management</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<style>

body{
    background:#f5f7fb;
}


.card-box{

    background:white;
    padding:20px;
    border-radius:15px;
    box-shadow:0 5px 15px #ddd;

}


.number{

    font-size:30px;
    font-weight:bold;
    color:#8e44ad;

}


</style>

</head>


<body>


<div class="container mt-5">


<h2 class="mb-4">
📝 Complaint Management
</h2>



<!-- Cards -->

<div class="row">


<div class="col-md-3">

<div class="card-box">

<h5>Total Complaints</h5>

<h2 class="number">
{{ $totalComplaints }}
</h2>

</div>

</div>



<div class="col-md-3">

<div class="card-box">

<h5>Pending</h5>

<h2 class="number">
{{ $pending }}
</h2>

</div>

</div>



<div class="col-md-3">

<div class="card-box">

<h5>In Progress</h5>

<h2 class="number">
{{ $progress }}
</h2>

</div>

</div>



<div class="col-md-3">

<div class="card-box">

<h5>Resolved</h5>

<h2 class="number">
{{ $resolved }}
</h2>

</div>

</div>


</div>



<br>



<!-- Subject Wise -->


<div class="card-box">


<h4>
Subject Wise Complaints
</h4>


<table class="table">


<tr>

<th>
Subject
</th>


<th>
Total
</th>

</tr>



@foreach($subjectWise as $data)


<tr>

<td>
{{ $data->subject }}
</td>


<td>

<span class="badge bg-primary">

{{ $data->total }}

</span>

</td>


</tr>


@endforeach


</table>


</div>



<br>



<!-- All Complaints -->


<div class="card-box">


<h4>
All Complaints
</h4>



<table class="table table-bordered table-hover">


<thead class="table-dark">


<tr>

<th>
Student
</th>


<th>
Subject
</th>


<th>
Message
</th>


<th>
Date
</th>


<th>
Status
</th>


<th>
Action
</th>


</tr>


</thead>



<tbody>



@foreach($complaints as $complaint)


<tr>


<td>

{{ $complaint->student->name ?? 'Unknown' }}

</td>


<td>

{{ $complaint->subject }}

</td>


<td>

{{ $complaint->message }}

</td>


<td>

{{ $complaint->created_at->format('d-m-Y') }}

</td>



<td>


@if($complaint->status=="Pending")

<span class="badge bg-danger">
Pending
</span>


@elseif($complaint->status=="In Progress")


<span class="badge bg-warning">
In Progress
</span>


@else


<span class="badge bg-success">
Resolved
</span>


@endif


</td>




<td>


<form method="POST"
action="{{route('admin.complaints.update',$complaint->id)}}">


@csrf


<select name="status"
class="form-select mb-2">


<option>
Pending
</option>

<option>
In Progress
</option>

<option>
Resolved
</option>


</select>



<button class="btn btn-primary btn-sm">

Update

</button>


</form>


</td>



</tr>


@endforeach



</tbody>


</table>


</div>


</div>


</body>

</html>