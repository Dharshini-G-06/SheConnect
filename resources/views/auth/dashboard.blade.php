@include('auth.header')
@include('auth.sidebar')

<div class="main-content">

    <!-- Welcome Banner -->

    <div class="welcome-box">

        <div>

            <h2>
                👋 Welcome Back, Student
            </h2>

            <p>
                Stay Connected • Stay Safe • Stay Empowered with
                <strong>SheConnect Smart Women's Campus Portal</strong>
            </p>

        </div>

        <div class="welcome-icon">
            👩‍🎓
        </div>

    </div>


    <!-- Statistics -->

    <div class="row mt-4">

        <div class="col-lg-4 col-md-6 mb-4">

            <div class="stat-card purple">

                <div class="icon">
                    🆘
                </div>

                <h3>SOS</h3>

                <p>Emergency Assistance</p>

            </div>

        </div>


        <div class="col-lg-4 col-md-6 mb-4">

            <div class="stat-card blue">

                <div class="icon">
                    📅
                </div>

                <h3>Events</h3>

                <p>Upcoming Campus Events</p>

            </div>

        </div>


        <div class="col-lg-4 col-md-6 mb-4">

            <div class="stat-card orange">

                <div class="icon">
                    📝
                </div>

                <h3>Complaints</h3>

                <p>Track Your Complaints</p>

            </div>

        </div>

    </div>


    <!-- Quick Actions -->

    <div class="section-box mt-4">

        <h4 class="mb-4">
            ⚡ Quick Actions
        </h4>

        <div class="action-grid">

            <a href="{{ route('sos') }}" class="action-card">

                <div class="action-icon">
                    🆘
                </div>

                <h5>Send SOS</h5>

                <small>Emergency Help</small>

            </a>

            <a href="{{ route('complaints') }}" class="action-card">

                <div class="action-icon">
                    📝
                </div>

                <h5>Complaint</h5>

                <small>Raise an Issue</small>

            </a>

            <a href="{{ route('student.events') }}" class="action-card">

                <div class="action-icon">
                    📅
                </div>

                <h5>Events</h5>

                <small>View Programs</small>

            </a>

            <a href="{{ route('profile') }}" class="action-card">

                <div class="action-icon">
                    👤
                </div>

                <h5>My Profile</h5>

                <small>Update Details</small>

            </a>

        </div>

    </div>
        <!-- Women's Safety Section -->

    <div class="row mt-4">

        <div class="col-lg-8 mb-4">

            <div class="safety-box">

                <h4>💜 Women's Safety Reminder</h4>

                <p class="mt-3">
                    Your safety is our priority.
                    If you ever feel unsafe inside or outside the campus,
                    immediately use the <strong>SOS</strong> feature to alert
                    the college administration and your emergency contacts.
                </p>

                <a href="{{ route('sos') }}" class="btn btn-danger mt-3">
                    🆘 Send SOS
                </a>

            </div>

        </div>


        <div class="col-lg-4 mb-4">

            <div class="info-card">

                <h5 class="mb-3">
                    📢 Today's Highlights
                </h5>

                <ul class="list-group">

                    <li class="list-group-item">
                        🎓 Scholarship Applications Open
                    </li>

                    <li class="list-group-item">
                        📅 Campus Events Updated
                    </li>

                    <li class="list-group-item">
                        🏠 Hostel Visitor Pass Available
                    </li>

                    <li class="list-group-item">
                        💜 Stay Safe & Stay Strong
                    </li>

                </ul>

            </div>

        </div>

    </div>



    <!-- Recent Notifications -->

    <div class="section-box mt-2">

        <h4 class="mb-4">
            🔔 Recent Notifications
        </h4>

        <div class="table-responsive">

            <table class="table table-hover">

                <thead class="table-dark">

                    <tr>

                        <th>Date</th>

                        <th>Notification</th>

                        <th>Status</th>

                    </tr>

                </thead>

                <tbody>

                    <tr>

                        <td>{{ date('d-m-Y') }}</td>

                        <td>Welcome to SheConnect Portal</td>

                        <td>
                            <span class="badge bg-success">
                                New
                            </span>
                        </td>

                    </tr>

                    <tr>

                        <td>{{ date('d-m-Y') }}</td>

                        <td>Check Upcoming College Events</td>

                        <td>
                            <span class="badge bg-primary">
                                Active
                            </span>
                        </td>

                    </tr>

                    <tr>

                        <td>{{ date('d-m-Y') }}</td>

                        <td>Scholarship Applications Available</td>

                        <td>
                            <span class="badge bg-warning text-dark">
                                Open
                            </span>
                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>



    <!-- Motivation -->

    <div class="quote-box mt-4">

        <h4>🌸 Daily Inspiration</h4>

        <p class="mt-3 mb-0">

            "Empowered women empower the world.
            Believe in yourself, learn continuously,
            and never stop growing."

        </p>

    </div>

</div>
<style>

body{
    background:#f4f6fb;
    font-family:'Segoe UI',sans-serif;
}

/* Main */

.main-content{
    margin-left:250px;
    margin-top:80px;
    padding:30px;
}

/* Welcome */

.welcome-box{
    background:linear-gradient(135deg,#7b1fa2,#ab47bc);
    color:#fff;
    border-radius:20px;
    padding:35px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    box-shadow:0 10px 25px rgba(0,0,0,.12);
}

.welcome-box h2{
    font-size:32px;
    font-weight:700;
}

.welcome-box p{
    margin-top:10px;
    opacity:.95;
}

.welcome-icon{
    font-size:70px;
}

/* Statistics */

.stat-card{
    color:#fff;
    border-radius:18px;
    padding:30px;
    text-align:center;
    transition:.3s;
    box-shadow:0 10px 20px rgba(0,0,0,.08);
}

.stat-card:hover{
    transform:translateY(-8px);
}

.stat-card .icon{
    font-size:45px;
}

.stat-card h3{
    margin-top:15px;
    font-weight:bold;
}

.stat-card p{
    margin-bottom:0;
}

.purple{
    background:linear-gradient(135deg,#8e24aa,#ba68c8);
}

.blue{
    background:linear-gradient(135deg,#1976d2,#42a5f5);
}

.orange{
    background:linear-gradient(135deg,#ef6c00,#ffa726);
}

/* Section */

.section-box{
    background:#fff;
    border-radius:20px;
    padding:25px;
    box-shadow:0 8px 20px rgba(0,0,0,.08);
}

/* Quick Actions */

.action-grid{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:20px;
}

.action-card{
    background:#f3e5f5;
    border-radius:15px;
    text-align:center;
    padding:25px;
    text-decoration:none;
    color:#6a1b9a;
    transition:.3s;
}

.action-card:hover{
    background:#7b1fa2;
    color:#fff;
    transform:translateY(-5px);
}

.action-icon{
    font-size:40px;
    margin-bottom:10px;
}

/* Safety */

.safety-box{
    background:#ede7f6;
    border-radius:20px;
    padding:30px;
    box-shadow:0 8px 20px rgba(0,0,0,.08);
}

.safety-box h4{
    color:#6a1b9a;
}

/* Highlights */

.info-card{
    background:#fff;
    border-radius:20px;
    padding:25px;
    height:100%;
    box-shadow:0 8px 20px rgba(0,0,0,.08);
}

/* Notifications */

.table{
    margin-bottom:0;
}

/* Quote */

.quote-box{
    background:linear-gradient(135deg,#6a1b9a,#8e24aa);
    color:white;
    border-radius:20px;
    padding:30px;
    text-align:center;
    box-shadow:0 10px 20px rgba(0,0,0,.1);
}

/* Responsive */

@media(max-width:992px){

.action-grid{
    grid-template-columns:repeat(2,1fr);
}

}

@media(max-width:768px){

.main-content{
    margin-left:0;
    margin-top:70px;
}

.welcome-box{
    flex-direction:column;
    text-align:center;
}

.welcome-icon{
    margin-top:20px;
}

.action-grid{
    grid-template-columns:1fr;
}

}

</style>
<!-- Footer -->

<footer class="mt-5">

    <div class="text-center text-muted py-4">

        <hr>

        <h6 class="mb-2">
            🌸 SheConnect – Smart Women's Campus Portal
        </h6>

        <p class="mb-1">
            Empowering Women Through Technology & Safety
        </p>

        <small>
            © {{ date('Y') }} SheConnect. All Rights Reserved.
        </small>

    </div>

</footer>

@include('auth.footer')