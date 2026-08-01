@include('auth.header')
@include('auth.sidebar')

<div class="content">

<div class="container-fluid">

    <!-- Health Header -->

    <div class="health-header">

        <div>

            <h2>❤️ Women's Health & Wellness</h2>

            <p>
                Stay healthy, confident and connected with SheConnect 💜
            </p>

        </div>

        <div class="health-icon">
            🩺
        </div>

    </div>

    <!-- AI Assistant -->

    <div class="ai-card mt-4">

        <div>

            <h4>🌸 SheCare AI Assistant</h4>

            <p>Your personal wellness companion.</p>

            <ul>
                <li>💧 Drink enough water</li>
                <li>😴 Maintain proper sleep</li>
                <li>🥗 Eat nutritious food</li>
            </ul>

        </div>

        <button class="btn ai-btn">
            Ask AI
        </button>

    </div>

    <!-- Health Services -->

    <div class="row mt-4 g-4">

        <div class="col-lg-4">

            <div class="health-card">

                <div class="icon">🏥</div>

                <h4>Campus Medical Centre</h4>

                <p>
                    Doctor consultation and medical support available.
                </p>

                <p>
                    🕘 9:00 AM - 5:00 PM
                </p>

                <button class="btn btn-primary">
                    Book Appointment
                </button>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="health-card">

                <div class="icon">🚑</div>

                <h4>Emergency Support</h4>

                <p>
                    Immediate ambulance support for emergency situations.
                </p>

                <a href="tel:108" class="btn btn-danger">
                    Call 108
                </a>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="health-card">

                <div class="icon">💊</div>

                <h4>Daily Health Tip</h4>

                <p>
                    {{ $health->health_tip ?? 'Maintain healthy food habits and drink enough water every day.' }}
                </p>

            </div>

        </div>

    </div>

    <!-- Menstrual Tracker Starts -->
     <!-- Menstrual Tracker -->

<div class="card tracker-box mt-5 shadow">

    <div class="card-header">

        <h4>🌸 Menstrual Health Tracker</h4>

    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-4">

                <div class="tracker">

                    <h5>📅 Last Period</h5>

                    <p>
                        {{ $health->last_period ?? 'Not Added' }}
                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="tracker">

                    <h5>🔄 Cycle Length</h5>

                    <p>
                        {{ $health->cycle_length ?? '28' }} Days
                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="tracker">

                    <h5>🌸 Cycle Status</h5>

                    <p>

                        @if(isset($health->last_period))

                            🟢 Normal

                        @else

                            ⚪ Not Updated

                        @endif

                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- Wellness Score -->

<div class="score-card mt-5">

    <h4>💜 Your Wellness Score</h4>

    <div class="score">

        85%

    </div>

    <div class="progress mt-3">

        <div class="progress-bar bg-success"

             style="width:85%">

        </div>

    </div>

    <div class="row mt-4 text-center">

        <div class="col-md-3">

            💧

            <h6>Water</h6>

            <strong>90%</strong>

        </div>

        <div class="col-md-3">

            😴

            <h6>Sleep</h6>

            <strong>80%</strong>

        </div>

        <div class="col-md-3">

            🏃

            <h6>Exercise</h6>

            <strong>75%</strong>

        </div>

        <div class="col-md-3">

            🥗

            <h6>Nutrition</h6>

            <strong>85%</strong>

        </div>

    </div>

</div>

<!-- Mental Wellness Starts -->
 <!-- Mental Wellness -->

<div class="mental-card mt-5">

    <h4>🧘 Mental Wellness Corner</h4>

    <p>How are you feeling today?</p>

    <div class="mt-3">

        <button class="btn btn-light me-2">😊 Happy</button>

        <button class="btn btn-light me-2">😐 Normal</button>

        <button class="btn btn-light">😔 Stress</button>

    </div>

    <p class="mt-4">
        <b>"You are stronger than you think 💜"</b>
    </p>

</div>

<!-- Reminder -->

<div class="reminder mt-5">

    <h4>🔔 Health Reminders</h4>

    <ul>

        <li>💧 Drink Water</li>

        <li>😴 Maintain Sleep Schedule</li>

        <li>🏃 Exercise Regularly</li>

        <li>🏥 Regular Health Checkup</li>

    </ul>

</div>

<!-- Wellness Tips -->

<div class="wellness mt-5">

    <h4>🌿 Daily Wellness Tips</h4>

    <ul>

        <li>💧 Drink enough water every day</li>

        <li>🥗 Eat iron-rich nutritious food</li>

        <li>😴 Sleep at least 7–8 hours</li>

        <li>🧘 Practice meditation daily</li>

        <li>💜 Take care of your mental health</li>

    </ul>

</div>

<!-- ================= Medical Card ================= -->

<div class="medical-card mt-5">

    <div class="medical-header">

        <div>

            <h3>🪪 Student Medical Card</h3>

            <p>Emergency Health Information</p>

        </div>

        <a href="{{ route('medical.card') }}" class="edit-btn">

            ✏️ Edit Card

        </a>

    </div>

    <div class="row">

        <div class="col-md-6 mb-3">

            <div class="medical-item">

                <span>🩸 Blood Group</span>

                <h5>{{ $medical->blood_group ?? 'Not Added' }}</h5>

            </div>

        </div>

        <div class="col-md-6 mb-3">

            <div class="medical-item">

                <span>📞 Emergency Contact</span>

                <h5>{{ $medical->emergency_contact ?? 'Not Added' }}</h5>

            </div>

        </div>

        <div class="col-md-6 mb-3">

            <div class="medical-item">

                <span>⚠️ Allergies</span>

                <h5>{{ $medical->allergies ?? 'None' }}</h5>

            </div>

        </div>

        <div class="col-md-6 mb-3">

            <div class="medical-item">

                <span>🏥 Medical Conditions</span>

                <h5>{{ $medical->medical_conditions ?? 'None' }}</h5>

            </div>

        </div>

    </div>

</div>

</div>

</div>
<style>

.health-header{

    background:linear-gradient(135deg,#6a1b9a,#ab47bc);
    color:white;
    padding:35px;
    border-radius:25px;
    display:flex;
    justify-content:space-between;
    align-items:center;

}


.health-icon{

    font-size:70px;

}


.ai-card{

    background:#f3e5f5;
    padding:30px;
    border-radius:25px;
    display:flex;
    justify-content:space-between;
    align-items:center;

}


.ai-btn{

    background:#6a1b9a;
    color:white;
    padding:12px 25px;
    border-radius:20px;

}



.health-card{

    background:white;
    padding:30px;
    border-radius:20px;
    text-align:center;
    box-shadow:0 8px 20px rgba(0,0,0,.08);
    height:100%;
    transition:.3s;

}


.health-card:hover{

    transform:translateY(-8px);

}


.icon{

    font-size:45px;

}


.health-card h4{

    color:#6a1b9a;

}



.tracker-box{

    border-radius:20px;
    overflow:hidden;

}


.card-header{

    background:#6a1b9a;
    color:white;

}



.tracker{

    background:#f3e5f5;
    padding:20px;
    border-radius:15px;
    text-align:center;

}


.tracker p{

    font-weight:bold;
    font-size:18px;

}



.score-card{

    background:white;
    padding:35px;
    border-radius:25px;
    box-shadow:0 8px 20px rgba(0,0,0,.08);
    text-align:center;

}



.score{

    font-size:50px;
    font-weight:bold;
    color:#6a1b9a;

}



.mental-card{

    background:#ede7f6;
    padding:30px;
    border-radius:25px;
    text-align:center;

}



.reminder{

    background:#fff3e0;
    padding:30px;
    border-radius:25px;

}



.wellness{

    background:#e8f5e9;
    padding:30px;
    border-radius:25px;

}



.reminder li,
.wellness li{

    margin:10px;

}



/* Medical Card */

.medical-card{

    background:linear-gradient(135deg,#7b1fa2,#ab47bc);
    padding:30px;
    border-radius:25px;
    color:white;
    box-shadow:0 10px 25px rgba(0,0,0,.15);
    margin-top:40px;

}


.medical-header{

    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;

}


.medical-header h3{

    margin:0;
    font-weight:bold;

}


.medical-header p{

    margin-top:5px;
    color:#f3e5f5;

}



.edit-btn{

    background:white;
    color:#7b1fa2;
    padding:10px 20px;
    border-radius:25px;
    text-decoration:none;
    font-weight:bold;

}


.edit-btn:hover{

    background:#f3e5f5;
    color:#6a1b9a;

}



.medical-item{

    background:rgba(255,255,255,.15);
    padding:20px;
    border-radius:18px;
    backdrop-filter:blur(10px);
    height:100%;

}



.medical-item span{

    display:block;
    font-size:14px;
    color:#f3e5f5;
    margin-bottom:10px;

}



.medical-item h5{

    margin:0;
    font-size:18px;
    font-weight:bold;

}



.btn-primary{

    background:#7b1fa2;
    border:none;

}



@media(max-width:768px){

    .medical-header{

        flex-direction:column;
        gap:15px;

    }


    .medical-card{

        padding:20px;

    }

}

</style>

@include('auth.footer')