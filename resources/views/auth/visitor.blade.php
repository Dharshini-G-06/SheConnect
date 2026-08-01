@include('auth.header')
@include('auth.sidebar')

<div class="content">
<div class="container-fluid">

    <!-- Header -->
    <div class="visitor-header">
        <div>
            <h2>👨‍👩‍👧 Visitor Pass Management</h2>
            <p>Request permission for visitors to enter the hostel.</p>
        </div>

        <div class="visitor-icon">
            🎫
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success mt-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="row mt-4">

        <!-- Visitor Request Form -->
        <div class="col-lg-5">

            <div class="card shadow border-0 rounded-4">

                <div class="card-header bg-purple text-white">
                    <h5 class="mb-0">
                        ➕ Apply Visitor Pass
                    </h5>
                </div>

                <div class="card-body">

                    <form action="{{ route('visitor.store') }}" method="POST">

                        @csrf

                        <label class="form-label">
                            Visitor Name
                        </label>

                        <input
                        type="text"
                        name="visitor_name"
                        class="form-control"
                        required>

                        <label class="form-label mt-3">
                            Relationship
                        </label>

                        <input
                        type="text"
                        name="relation"
                        class="form-control"
                        placeholder="Father / Mother / Sister"
                        required>

                        <label class="form-label mt-3">
                            Mobile Number
                        </label>

                        <input
                        type="text"
                        name="mobile"
                        class="form-control"
                        required>

                        <label class="form-label mt-3">
                            Visit Date
                        </label>

                        <input
                        type="date"
                        name="visit_date"
                        class="form-control"
                        required>

                        <div class="row mt-3">

                            <div class="col-md-6">

                                <label>In Time</label>

                                <input
                                type="time"
                                name="in_time"
                                class="form-control"
                                required>

                            </div>

                            <div class="col-md-6">

                                <label>Out Time</label>

                                <input
                                type="time"
                                name="out_time"
                                class="form-control"
                                required>

                            </div>

                        </div>

                        <label class="form-label mt-3">
                            Reason
                        </label>

                        <textarea
                        name="reason"
                        rows="3"
                        class="form-control"
                        required></textarea>

                        <button class="btn btn-purple w-100 mt-4">

                            Submit Request

                        </button>

                    </form>

                </div>

            </div>

        </div>

        <!-- History -->
        <div class="col-lg-7">

            <div class="card shadow border-0 rounded-4">

                <div class="card-header bg-purple text-white">
                    <h5 class="mb-0">
                        📋 Visitor Pass History
                    </h5>
                </div>

                <div class="card-body">

                    <table class="table table-bordered table-hover">

                        <thead>

                        <tr>

                            <th>Name</th>
                            <th>Date</th>
                            <th>Relation</th>
                            <th>Status</th>

                        </tr>

                        </thead>

                        <tbody>

                        @forelse($passes as $pass)

                        <tr>

                            <td>{{ $pass->visitor_name }}</td>

                            <td>{{ $pass->visit_date }}</td>

                            <td>{{ $pass->relation }}</td>

                            <td>

                                @if($pass->status=='Pending')

                                    <span class="badge bg-warning">
                                        Pending
                                    </span>

                                @elseif($pass->status=='Approved')

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

                            <td colspan="4" class="text-center">

                                No Visitor Requests Found

                            </td>

                        </tr>

                        @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>
</div>

<style>

.visitor-header{

background:linear-gradient(135deg,#6a1b9a,#ab47bc);

color:white;

padding:30px;

border-radius:20px;

display:flex;

justify-content:space-between;

align-items:center;

}

.visitor-icon{

font-size:65px;

}

.bg-purple{

background:#6a1b9a;

}

.btn-purple{

background:#6a1b9a;

color:white;

}

.btn-purple:hover{

background:#4a148c;

color:white;

}

.card{

border-radius:20px;

}

.table th{

background:#f3e5f5;

}

</style>

@include('auth.footer')