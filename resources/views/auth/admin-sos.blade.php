<!DOCTYPE html>
<html>

<head>

<title>SOS Monitoring</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<style>

body{

background:#f5f7fb;

}


.container-box{

background:white;

padding:25px;

border-radius:15px;

box-shadow:0 5px 15px #ddd;

}


.status{

font-weight:bold;

}

</style>


</head>


<body>


<div class="container mt-5">


<div class="container-box">


<h2 class="mb-4">

🚨 SOS Monitoring

</h2>



<table class="table table-bordered table-hover">


<thead class="table-dark">


<tr>

<th>
Student
</th>

<th>
Register No
</th>

<th>
Location
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


@foreach($sosRequests as $sos)


<tr>


<td>

{{ $sos->student->name }}

</td>


<td>

{{ $sos->student->register_no }}

</td>


<td>

{{ $sos->location }}

</td>


<td>

{{ $sos->message }}

</td>


<td>

{{ $sos->created_at->format('d-m-Y') }}

</td>



<td>


@if($sos->status=="Pending")


<span class="badge bg-danger">

Pending

</span>


@elseif($sos->status=="Accepted")


<span class="badge bg-warning">

Accepted

</span>


@else


<span class="badge bg-success">

Resolved

</span>


@endif


</td>




<td>


<form method="POST"
action="{{route('admin.sos.update',$sos->id)}}">


@csrf


<select name="status"
class="form-select mb-2">


<option>
Pending
</option>


<option>
Accepted
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