@include('auth.header')
@include('auth.sidebar')

<div class="content">

<div class="container-fluid">

<h2 class="mb-4 text-purple">
🎫 Visitor Pass Requests
</h2>

@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif

<div class="card shadow">

<div class="card-body">

<table class="table table-bordered">

<thead>

<tr>

<th>Student</th>

<th>Visitor</th>

<th>Relation</th>

<th>Date</th>

<th>Time</th>

<th>Status</th>

<th>Action</th>

</tr>

</thead>

<tbody>

@forelse($passes as $pass)

<tr>

<td>{{ $pass->student->name }}</td>

<td>{{ $pass->visitor_name }}</td>

<td>{{ $pass->relation }}</td>

<td>{{ $pass->visit_date }}</td>

<td>{{ $pass->in_time }} - {{ $pass->out_time }}</td>

<td>

@if($pass->status=="Pending")

<span class="badge bg-warning">
Pending
</span>

@elseif($pass->status=="Approved")

<span class="badge bg-success">
Approved
</span>

@else

<span class="badge bg-danger">
Rejected
</span>

@endif

</td>

<td>

<form action="{{ route('admin.visitor.update',$pass->id) }}"
method="POST">

@csrf

<button
name="status"
value="Approved"
class="btn btn-success btn-sm">

Approve

</button>

<button
name="status"
value="Rejected"
class="btn btn-danger btn-sm">

Reject

</button>

</form>

</td>

</tr>

@empty

<tr>

<td colspan="7"
class="text-center">

No Visitor Requests

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

</div>

</div>

<style>

.text-purple{

color:#6a1b9a;

}

</style>

@include('auth.footer')