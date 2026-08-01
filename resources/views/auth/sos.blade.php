@include('auth.header')
@include('auth.sidebar')

<div class="content">
<div class="container-fluid">

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show">
    {{ session('success') }}
    <button class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="row">

<div class="col-md-8 mx-auto">

<div class="card shadow-lg border-0">

<div class="card-header bg-danger text-white text-center">

<h2>🆘 Emergency SOS</h2>
<p class="mb-0">Send an emergency alert immediately</p>

</div>

<div class="card-body text-center">

<div class="mb-4">

<i class="fa-solid fa-triangle-exclamation text-danger"
style="font-size:90px;"></i>

</div>

<form action="{{ route('sos.send') }}" method="POST">

@csrf

<div class="mb-3">

<label class="fw-bold">
Current Location
</label>
<div class="input-group">

    <input
        type="text"
        id="location"
        name="location"
        class="form-control"
        placeholder="Click Get Current Location"
        readonly
        required>

    <button
        type="button"
        class="btn btn-primary"
        onclick="getLocation()">

        📍 Get Location

    </button>

</div>

</div>

<div class="mb-3">

<label class="fw-bold">
Emergency Message
</label>

<textarea
name="message"
class="form-control"
rows="3">Emergency Help Needed</textarea>

</div>

<button type="submit" class="btn btn-danger btn-lg w-100">
    <i class="fa-solid fa-bell"></i>
    SEND SOS
</button>
@if(session('success'))

<hr>

<h5 class="text-center mt-3">
    Emergency Contacts
</h5>

<div class="d-grid gap-2">

    <!-- Warden -->
    <a href="tel:9047161363"
       class="btn btn-danger btn-lg">
       📞 Call Warden
    </a>

    <!-- Parent -->
    <a href="tel:{{ $student->parent_phone }}"
       class="btn btn-warning btn-lg">
       📞 Call Parent
    </a>

</div>

@endif
</form>

</div>

</div>

</div>

</div>

<br>

<div class="card shadow">

<div class="card-header bg-dark text-white">

<h4>📜 SOS History</h4>

</div>

<div class="card-body">

<table class="table table-bordered table-hover">

<thead class="table-danger">

<tr>

<th>ID</th>

<th>Location</th>

<th>Message</th>

<th>Status</th>

<th>Date</th>

</tr>

</thead>

<tbody>

@forelse($sosHistory as $sos)

<tr>

<td>{{ $sos->id }}</td>

<td>
    <a href="{{ $sos->location }}"
       target="_blank"
       class="btn btn-sm btn-primary">
        📍 View Location
    </a>
</td>

<td>{{ $sos->message }}</td>

<td>

@if($sos->status=="Pending")

<span class="badge bg-warning">
Pending
</span>

@else

<span class="badge bg-success">
Resolved
</span>

@endif

</td>

<td>{{ $sos->created_at->format('d-m-Y h:i A') }}</td>

</tr>

@empty

<tr>

<td colspan="5" class="text-center">

No SOS Alerts Yet

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

</div>
<script>

function getLocation()
{

    if(navigator.geolocation)
    {

        navigator.geolocation.getCurrentPosition(

            function(position)
            {

                let latitude = position.coords.latitude;
                let longitude = position.coords.longitude;

                document.getElementById("location").value =
"https://www.google.com/maps?q=" +
latitude + "," + longitude;
            },

            function(error)
            {

                alert("Unable to fetch location.");

            }

        );

    }
    else
    {

        alert("Geolocation is not supported.");

    }

}

</script>

@include('auth.footer')