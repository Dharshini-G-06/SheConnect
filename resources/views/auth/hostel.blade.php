@include('auth.header')
@include('auth.sidebar')


<div class="content">


<div class="container-fluid">
    @if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif


@if(session('error'))

<div class="alert alert-danger">

{{ session('error') }}

</div>

@endif


<!-- Header -->

<div class="hostel-header">

    <div>
        <h2>
            🏠 Hostel Management
        </h2>

        <p>
            Safe stay, comfortable living and quick support for students.
        </p>
    </div>


    <div class="hostel-icon">
        🏡
    </div>

</div>

<!-- Hostel Overview -->

<div class="row mt-4 g-4">

    <div class="col-md-3">

        <div class="overview-card">

            <h2>🏢</h2>

            <h5>Total Rooms</h5>

            <h3>120</h3>

        </div>

    </div>


    <div class="col-md-3">

        <div class="overview-card">

            <h2>🟢</h2>

            <h5>Available Rooms</h5>

            <h3>18</h3>

        </div>

    </div>


    <div class="col-md-3">

        <div class="overview-card">

            <h2>🔴</h2>

            <h5>Occupied Rooms</h5>

            <h3>102</h3>

        </div>

    </div>


    <div class="col-md-3">

        <div class="overview-card">

            <h2>👩‍🏫</h2>

            <h5>Hostel Warden</h5>

            <h3>Mrs. Priya</h3>

        </div>

    </div>

</div>



<!-- Occupancy Progress -->

<div class="card shadow mt-4 border-0">

    <div class="card-body">

        <h5 class="mb-3 text-purple">
            🛏 Hostel Occupancy
        </h5>

        <div class="progress" style="height:25px;">

            <div class="progress-bar bg-success"
                 style="width:85%;">

                102 / 120 Occupied

            </div>

        </div>

        <small class="text-muted">

            Available Rooms :
            <b>18</b>

        </small>

    </div>

</div>

<!-- Hostel Information -->

<div class="row mt-4 g-4">


<div class="col-md-4">

<div class="hostel-card">

<h3>
🏢 My Hostel
</h3>


<p>
<b>Hostel Name:</b>
Anitha Women's Hostel
</p>


<p>
<b>Block:</b>
A Block
</p>


<p>
<b>Warden:</b>
Mrs. Priya
</p>


<p>
<b>Contact:</b>
9876543210
</p>


<a href="tel:9876543210"
class="btn btn-primary">

Call Warden

</a>


</div>

</div>





<div class="col-md-4">

<div class="hostel-card">


<h3>
🛏 Room Details
</h3>


<p>
<b>Room No:</b>
204
</p>


<p>
<b>Floor:</b>
2nd Floor
</p>


<p>
<b>Type:</b>
4 Sharing
</p>


<p>
<b>Roommates:</b>
</p>


<ul>

<li>Kavitha</li>

<li>Divya</li>

<li>Harini</li>

</ul>


</div>

</div>





<div class="col-md-4">

<div class="hostel-card">


<h3>
🍽 Mess Menu
</h3>


<p>
🌅 Breakfast
</p>

<p>
Idly + Sambar
</p>


<p>
☀️ Lunch
</p>

<p>
Rice + Curry + Vegetables
</p>


<p>
🌙 Dinner
</p>

<p>
Chapathi + Paneer Curry
</p>


</div>

</div>


</div>






<!-- Complaint & Leave -->

<div class="row mt-5 g-4">


<div class="col-md-6">


<div class="action-box">


<h3>
📝 Hostel Complaint
</h3>


<form method="POST" action="{{ route('hostel.complaint') }}">

@csrf


<label>
Category
</label>


<select name="category" class="form-control">

<option value="Water Problem">
Water Problem
</option>

<option value="Electricity">
Electricity
</option>

<option value="Food Quality">
Food Quality
</option>

<option value="Room Maintenance">
Room Maintenance
</option>

</select>



<label class="mt-3">
Description
</label>


<textarea 
name="description"
class="form-control"
rows="3"
placeholder="Enter your complaint"
required></textarea>



<button class="btn btn-danger mt-3">

Submit Complaint

</button>


</form>

</div>

</div>





<div class="col-md-6">


<div class="action-box">


<h3>
🚶 Leave Request
</h3>

<form method="POST" action="{{ route('hostel.leave') }}">

@csrf


<label>
From Date
</label>

<input 
type="date"
name="from_date"
class="form-control"
required>



<label class="mt-3">
To Date
</label>

<input 
type="date"
name="to_date"
class="form-control"
required>




<label class="mt-3">
Reason
</label>


<textarea
name="reason"
class="form-control"
rows="3"
required></textarea>



<button class="btn btn-success mt-3">

Apply Leave

</button>


</form>

</div>


</div>


</div>
<!-- Visitor Pass Request -->

<div class="card shadow mt-5 border-0">

    <div class="card-header text-white"
         style="background:#6a1b9a;">

        <h4 class="mb-0">
            🎫 Visitor Pass Request
        </h4>

    </div>

    <div class="card-body">

        @if(session('success'))

            <div class="alert alert-success">

                {{ session('success') }}

            </div>

        @endif

        <form action="{{ route('visitor.store') }}"
              method="POST">

            @csrf

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label>Visitor Name</label>

                    <input type="text"
                           name="visitor_name"
                           class="form-control"
                           required>

                </div>

                <div class="col-md-6 mb-3">

                    <label>Relationship</label>

                    <select name="relationship"
                            class="form-control"
                            required>

                        <option value="">Select</option>

                        <option>Father</option>

                        <option>Mother</option>

                        <option>Brother</option>

                        <option>Sister</option>

                        <option>Guardian</option>

                        <option>Relative</option>

                    </select>

                </div>

            </div>


            <div class="row">

                <div class="col-md-6 mb-3">

                    <label>Mobile Number</label>

                    <input type="text"
                           name="mobile"
                           class="form-control"
                           required>

                </div>

                <div class="col-md-6 mb-3">

                    <label>Visit Date</label>

                    <input type="date"
                           name="visit_date"
                           class="form-control"
                           required>

                </div>

            </div>


            <div class="row">

                <div class="col-md-6 mb-3">

                    <label>In Time</label>

                    <input type="time"
                           name="in_time"
                           class="form-control"
                           required>

                </div>

                <div class="col-md-6 mb-3">

                    <label>Out Time</label>

                    <input type="time"
                           name="out_time"
                           class="form-control"
                           required>

                </div>

            </div>


            <div class="mb-3">

                <label>Reason for Visit</label>

                <textarea
                    name="reason"
                    rows="3"
                    class="form-control"
                    required></textarea>

            </div>


            <button class="btn btn-primary">

                🎫 Submit Visitor Pass Request

            </button>

        </form>

    </div>

</div>





<!-- Safety -->

<div class="safety-box mt-5">


<h3>
💜 Hostel Safety Guidelines
</h3>


<ul>

<li>
Always carry hostel ID card.
</li>

<li>
Inform warden during emergency.
</li>

<li>
Maintain room cleanliness.
</li>

<li>
Follow hostel timings.
</li>

<li>
Use SOS feature during emergencies.
</li>


</ul>


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

}


.hostel-header h2{

font-size:32px;

}


.hostel-icon{

font-size:70px;

}




.hostel-card{

background:white;

padding:25px;

border-radius:20px;

box-shadow:0 8px 20px rgba(0,0,0,.08);

height:100%;

transition:.3s;

}


.hostel-card:hover{

transform:translateY(-8px);

}


.hostel-card h3{

color:#6a1b9a;

margin-bottom:20px;

}




.action-box{

background:white;

padding:30px;

border-radius:20px;

box-shadow:0 8px 20px rgba(0,0,0,.08);

}


.action-box h3{

color:#6a1b9a;

margin-bottom:20px;

}




.btn-primary{

background:#7b1fa2;

border:none;

}



.btn-primary:hover{

background:#512da8;

}




.safety-box{

background:#ede7f6;

padding:30px;

border-radius:20px;

}


.safety-box h3{

color:#6a1b9a;

}


.safety-box li{

margin:10px;

font-size:16px;

}
.overview-card{

    background:#fff;

    border-radius:20px;

    padding:25px;

    text-align:center;

    box-shadow:0 8px 20px rgba(0,0,0,.08);

    transition:.3s;

}

.overview-card:hover{

    transform:translateY(-8px);

}

.overview-card h2{

    font-size:45px;

}

.overview-card h5{

    color:#6a1b9a;

    margin-top:10px;

}

.overview-card h3{

    font-weight:bold;

}

.text-purple{

    color:#6a1b9a;

}


</style>



@include('auth.footer')