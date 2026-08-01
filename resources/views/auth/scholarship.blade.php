@include('auth.header')
@include('auth.sidebar')

<div class="content">
<div class="container-fluid">

<h2 class="mb-4 text-purple">
🎓 Scholarship Portal
</h2>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="row">

@forelse($scholarships as $scholarship)

<div class="col-md-6 mb-4">

<div class="card shadow border-0 rounded-4">

<div class="card-body">

<h4 class="text-primary">
{{ $scholarship->title }}
</h4>

<p>
<b>Provider :</b>
{{ $scholarship->provider }}
</p>

<p>
<b>Amount :</b>
₹{{ $scholarship->amount }}
</p>

<p>
<b>Eligibility :</b>
{{ $scholarship->eligibility }}
</p>

<p>
<b>Last Date :</b>
{{ $scholarship->last_date }}
</p>

<p>
{{ $scholarship->description }}
</p>

<hr>

<form action="{{ route('scholarship.apply',$scholarship->id) }}"
method="POST"
enctype="multipart/form-data">

@csrf

<label>Income Certificate</label>

<input type="file"
name="income_certificate"
class="form-control mb-2"
required>

<label>Community Certificate</label>

<input type="file"
name="community_certificate"
class="form-control mb-2"
required>

<label>Marksheet</label>

<input type="file"
name="marksheet"
class="form-control mb-3"
required>

<button class="btn btn-success w-100">
Apply Scholarship
</button>

</form>

</div>

</div>

</div>

@empty

<div class="alert alert-warning">

No Scholarships Available

</div>

@endforelse

</div>


<hr class="my-5">


<h3 class="mb-3">
📄 My Scholarship Applications
</h3>

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>ID</th>

<th>Scholarship</th>

<th>Status</th>

</tr>

</thead>

<tbody>

@forelse($applications as $application)

<tr>

<td>{{ $application->id }}</td>

<td>{{ $application->scholarship->title }}</td>

<td>

@if($application->status=="Pending")

<span class="badge bg-warning">
Pending
</span>

@elseif($application->status=="Approved")

<span class="badge bg-success">
Approved
</span>

@else

<span class="badge bg-danger">
Rejected
</span>

@endif

</td>

</tr>

@empty

<tr>

<td colspan="3" class="text-center">

No Applications Found

</td>

</tr>

@endforelse

</tbody>

</table>

</div>
</div>

<style>

.text-purple{

color:#6f42c1;

font-weight:bold;

}

.card{

transition:.3s;

}

.card:hover{

transform:translateY(-5px);

}

</style>

@include('auth.footer')