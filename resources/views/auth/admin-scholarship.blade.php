

<div class="content">

<div class="container-fluid">

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<!-- Header -->

<div class="scholar-header">

    <div>
        <h2>🎓 Scholarship Management</h2>
        <p>Manage scholarships for students.</p>
    </div>

    <button class="btn btn-light"
            data-bs-toggle="modal"
            data-bs-target="#addScholarship">
        + Add Scholarship
    </button>

</div>


<!-- Scholarship Table -->

<div class="card shadow mt-4">

<div class="card-body">

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>ID</th>

<th>Scholarship</th>

<th>Provider</th>

<th>Amount</th>

<th>Last Date</th>

<th>Eligibility</th>

<th>Action</th>

</tr>

</thead>

<tbody>

@forelse($scholarships as $scholarship)

<tr>

<td>{{ $scholarship->id }}</td>

<td>{{ $scholarship->title }}</td>

<td>{{ $scholarship->provider }}</td>

<td>₹{{ $scholarship->amount }}</td>

<td>{{ $scholarship->last_date }}</td>

<td>{{ $scholarship->eligibility }}</td>

<td>

<form method="POST"
      action="{{ route('admin.scholarship.delete',$scholarship->id) }}">

@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm">

Delete

</button>

</form>

</td>

</tr>

@empty

<tr>

<td colspan="7" class="text-center">

No Scholarships Available

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

</div>

</div>

<!-- Add Scholarship Modal -->

<div class="modal fade"
id="addScholarship">

<div class="modal-dialog modal-lg">

<div class="modal-content">

<form method="POST"
action="{{ route('admin.scholarship.store') }}">

@csrf
<div class="card shadow mt-4">
    <div class="card-header bg-primary text-white">
        <h5>Add Scholarship</h5>
    </div>

    <div class="card-body">

        <form action="{{ route('admin.scholarship.store') }}" method="POST">

            @csrf

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label>Scholarship Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Provider</label>
                    <input type="text" name="provider" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Amount</label>
                    <input type="number" name="amount" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Last Date</label>
                    <input type="date" name="last_date" class="form-control" required>
                </div>

                <div class="col-12 mb-3">
                    <label>Eligibility</label>
                    <textarea name="eligibility" class="form-control" rows="3" required></textarea>
                </div>

            </div>

            <button class="btn btn-success">
                Save Scholarship
            </button>

        </form>

    </div>
</div>


</div>

</div>

<style>

.scholar-header{

background:linear-gradient(135deg,#7b1fa2,#9c27b0);

color:white;

padding:30px;

border-radius:20px;

display:flex;

justify-content:space-between;

align-items:center;

}

.card{

border:none;

border-radius:20px;

}

.table th{

vertical-align:middle;

text-align:center;

}

.table td{

vertical-align:middle;

text-align:center;

}

.btn-danger{

border-radius:8px;

}

</style>

