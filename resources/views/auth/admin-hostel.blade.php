@include('auth.header')
@include('auth.sidebar')

<div class="content">

<div class="container-fluid">

<!-- Header -->

<div class="hostel-header">

    <div>

        <h2>🏠 Hostel Management Dashboard</h2>

        <p>
            Manage Hostel Complaints, Leave Requests, Visitor Passes and Room Availability.
        </p>

    </div>

    <div class="hostel-icon">
        🏡
    </div>

</div>


<!-- Success Message -->

@if(session('success'))

<div class="alert alert-success mt-4">

{{ session('success') }}

</div>

@endif


<!-- Dashboard Cards -->

<div class="row mt-4 g-4">

    <!-- Complaints -->

    <div class="col-lg-3">

        <div class="summary-card">

            <div class="icon">
                📝
            </div>

            <h5>Total Complaints</h5>

            <h2>

                {{ $complaints->count() }}

            </h2>

        </div>

    </div>


    <!-- Leave -->

    <div class="col-lg-3">

        <div class="summary-card">

            <div class="icon">
                🚶
            </div>

            <h5>Leave Requests</h5>

            <h2>

                {{ $leaves->count() }}

            </h2>

        </div>

    </div>


    <!-- Visitor -->

    <div class="col-lg-3">

        <div class="summary-card">

            <div class="icon">
                🎫
            </div>

            <h5>Visitor Passes</h5>

            <h2>

                {{ $passes->count() }}

            </h2>

        </div>

    </div>


    <!-- Rooms -->

    <div class="col-lg-3">

        <div class="summary-card">

            <div class="icon">
                🛏
            </div>

            <h5>Available Rooms</h5>

            <h2>

                {{ $availableRooms ?? 18 }}

            </h2>

        </div>

    </div>

</div>
<style>

.hostel-header{

background:linear-gradient(135deg,#6a1b9a,#ab47bc);

color:white;

padding:35px;

border-radius:25px;

display:flex;

justify-content:space-between;

align-items:center;

margin-bottom:30px;

}

.hostel-icon{

font-size:70px;

}

.summary-card{

background:white;

padding:30px;

border-radius:20px;

text-align:center;

box-shadow:0 8px 20px rgba(0,0,0,.08);

transition:.3s;

}

.summary-card:hover{

transform:translateY(-8px);

}

.summary-card .icon{

font-size:45px;

margin-bottom:15px;

}

.summary-card h5{

color:#6a1b9a;

font-weight:600;

}

.summary-card h2{

font-size:35px;

font-weight:bold;

margin-top:10px;

}

.table{

background:white;

border-radius:15px;

overflow:hidden;

}

.table th{

background:#6a1b9a;

color:white;

}

.btn-success{

border:none;

}

.btn-danger{

border:none;

}

</style>
<!-- ========================= -->
<!-- Complaint Management -->
<!-- ========================= -->

<div class="card shadow mt-5 border-0">

    <div class="card-header text-white"
         style="background:#6a1b9a;">

        <h4 class="mb-0">
            📝 Hostel Complaint Management
        </h4>

    </div>

    <div class="card-body">

        <table class="table table-hover table-bordered align-middle">

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Student</th>

                    <th>Category</th>

                    <th>Description</th>

                    <th>Status</th>

                    <th width="220">
                        Action
                    </th>

                </tr>

            </thead>

            <tbody>

            @forelse($complaints as $complaint)

                <tr>

                    <td>

                        {{ $complaint->id }}

                    </td>

                    <td>

                        {{ $complaint->student->name ?? 'N/A' }}

                    </td>

                    <td>

                        {{ $complaint->category }}

                    </td>

                    <td>

                        {{ $complaint->description }}

                    </td>

                    <td>

                        @if($complaint->status=="Pending")

                            <span class="badge bg-warning">

                                Pending

                            </span>

                        @elseif($complaint->status=="Resolved")

                            <span class="badge bg-success">

                                Resolved

                            </span>

                        @else

                            <span class="badge bg-danger">

                                Rejected

                            </span>

                        @endif

                    </td>

                    <td>

                        <form method="POST"
                        action="{{ route('admin.hostel.complaint.update',$complaint->id) }}">

                            @csrf

                            <div class="d-flex gap-2">

                                <button
                                name="status"
                                value="Resolved"
                                class="btn btn-success btn-sm">

                                    ✔ Resolve

                                </button>

                                <button
                                name="status"
                                value="Rejected"
                                class="btn btn-danger btn-sm">

                                    ✖ Reject

                                </button>

                            </div>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6"
                    class="text-center text-muted">

                        No Complaint Requests Found

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>
<!-- ================================= -->
<!-- Leave Request Management -->
<!-- ================================= -->

<div class="card shadow mt-5 border-0">

    <div class="card-header text-white"
         style="background:#6a1b9a;">

        <h4 class="mb-0">
            🚶 Leave Request Management
        </h4>

    </div>

    <div class="card-body">

        <table class="table table-hover table-bordered align-middle">

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Student</th>

                    <th>From Date</th>

                    <th>To Date</th>

                    <th>Reason</th>

                    <th>Status</th>

                    <th width="220">
                        Action
                    </th>

                </tr>

            </thead>

            <tbody>

            @forelse($leaves as $leave)

                <tr>

                    <td>{{ $leave->id }}</td>

                    <td>{{ $leave->student->name ?? 'N/A' }}</td>

                    <td>{{ $leave->from_date }}</td>

                    <td>{{ $leave->to_date }}</td>

                    <td>{{ $leave->reason }}</td>

                    <td>

                        @if($leave->status=="Pending")

                            <span class="badge bg-warning">

                                Pending

                            </span>

                        @elseif($leave->status=="Approved")

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

                        <form method="POST"
                              action="{{ route('admin.hostel.leave.update',$leave->id) }}">

                            @csrf

                            <div class="d-flex gap-2">

                                <button
                                    name="status"
                                    value="Approved"
                                    class="btn btn-success btn-sm">

                                    ✅ Approve

                                </button>

                                <button
                                    name="status"
                                    value="Rejected"
                                    class="btn btn-danger btn-sm">

                                    ❌ Reject

                                </button>

                            </div>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="7" class="text-center text-muted">

                        No Leave Requests Found

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>
```blade
<!-- ================================= -->
<!-- Visitor Pass Management -->
<!-- ================================= -->

<div class="card shadow mt-5 border-0">

    <div class="card-header text-white"
         style="background:#6a1b9a;">

        <h4 class="mb-0">
            🎫 Visitor Pass Management
        </h4>

    </div>

    <div class="card-body">

        <table class="table table-hover table-bordered align-middle">

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Student</th>

                    <th>Visitor</th>

                    <th>Relation</th>

                    <th>Mobile</th>

                    <th>Visit Date</th>

                    <th>In Time</th>

                    <th>Out Time</th>

                    <th>Status</th>

                    <th width="220">
                        Action
                    </th>

                </tr>

            </thead>

            <tbody>

            @forelse($passes as $pass)

                <tr>

                    <td>{{ $pass->id }}</td>

                    <td>{{ $pass->student->name ?? 'N/A' }}</td>

                    <td>{{ $pass->visitor_name }}</td>

                    <td>{{ $pass->relationship }}</td>

                    <td>{{ $pass->mobile }}</td>

                    <td>{{ $pass->visit_date }}</td>

                    <td>{{ $pass->in_time }}</td>

                    <td>{{ $pass->out_time }}</td>

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

                        <form method="POST"
                              action="{{ route('admin.visitor.update',$pass->id) }}">

                            @csrf

                            <div class="d-flex gap-2">

                                <button
                                    name="status"
                                    value="Approved"
                                    class="btn btn-success btn-sm">

                                    ✅ Approve

                                </button>

                                <button
                                    name="status"
                                    value="Rejected"
                                    class="btn btn-danger btn-sm">

                                    ❌ Reject

                                </button>

                            </div>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="10" class="text-center text-muted">

                        No Visitor Pass Requests Found

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

</div>
</div>

@include('auth.footer')

