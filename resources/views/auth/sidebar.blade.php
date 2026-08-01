<div class="sidebar">

    <div class="logo">

        <h3>🌸 SheConnect</h3>

        <small>Smart Women's Campus Portal</small>

    </div>

    <div class="menu-container">

        <a href="{{ route('dashboard') }}">
    🏠 <span>Dashboard</span>
</a>
<a href="{{ route('profile') }}">
    👤 <span>My Profile</span>
</a>
<a href="{{ route('sos') }}">
    🆘 <span>SOS Emergency</span>
</a>

        <a href="{{ route('health') }}">
    ❤️ <span>Health</span>
</a>

       <a href="{{ route('hostel') }}">
    🏠 <span>Hostel</span>
</a>

        <a href="{{ route('scholarship') }}">
    🎓 <span>Scholarship</span>
</a>
        <a href="{{ route('student.events') }}">
            📅 Events
        </a>

        <a href="{{ route('complaints') }}">
    📝 <span>Complaints</span>
</a>

    </div>

    <div class="logout">

        <a href="/login">

            🚪 Logout

        </a>

    </div>

</div>

<style>

.sidebar{

    position:fixed;

    width:250px;

    height:100vh;

    left:0;

    top:0;

    background:linear-gradient(180deg,#7b1fa2,#512da8);

    color:white;

    padding:20px;

}

.logo{

    text-align:center;

    padding-bottom:20px;

    border-bottom:1px solid rgba(255,255,255,.2);

}

.menu-container{

    margin-top:20px;

}

.menu-container a{

    display:block;

    color:white;

    text-decoration:none;

    padding:12px;

    border-radius:10px;

    margin-bottom:8px;

}

.menu-container a:hover{

    background:white;

    color:#6a1b9a;

}

.logout{

    position:absolute;

    bottom:20px;

    width:210px;

}

.logout a{

    display:block;

    text-align:center;

    background:white;

    color:#6a1b9a;

    padding:12px;

    border-radius:10px;

    text-decoration:none;

}

</style>