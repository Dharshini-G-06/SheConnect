@include('auth.header')
@include('auth.sidebar')


<div class="content">


<div class="container-fluid">


<div class="health-title">

    <h2>
        💜 Health Management
    </h2>

    <p>
        Manage student wellness information
    </p>

</div>



@if(session('success'))

<div class="alert alert-success mt-3">

{{session('success')}}

</div>

@endif





<div class="card health-admin-card mt-4 shadow">


<div class="card-header">

<h4>
🌸 Update Health Information
</h4>

</div>




<div class="card-body">


<form method="POST"
action="{{route('admin.health.update')}}">


@csrf



<div class="row">



<div class="col-md-6 mb-3">


<label>
Health Tip
</label>


<textarea
name="health_tip"
class="form-control"
rows="4"
placeholder="Enter health tips">

{{

$health->health_tip ?? ''

}}

</textarea>


</div>





<div class="col-md-6 mb-3">


<label>
Medical Centre
</label>


<input type="text"
name="medical_center"
class="form-control"
value="{{

$health->medical_center ?? ''

}}">


</div>





<div class="col-md-6 mb-3">


<label>
Doctor Name
</label>


<input type="text"
name="doctor_name"
class="form-control"
value="{{

$health->doctor_name ?? ''

}}">


</div>





<div class="col-md-6 mb-3">


<label>
Emergency Contact
</label>


<input type="text"
name="contact_number"
class="form-control"
value="{{

$health->contact_number ?? ''

}}">


</div>



</div>





<button class="btn update-btn">

Update Health Information

</button>



</form>


</div>


</div>







<!-- Preview Card -->


<div class="preview mt-5">


<h4>
👩‍🎓 Student View Preview
</h4>



<div class="row mt-3">



<div class="col-md-4">


<div class="preview-card">


<h5>
🏥 Medical Centre
</h5>


<p>

{{$health->medical_center ?? 'Not Added'}}

</p>


</div>


</div>





<div class="col-md-4">


<div class="preview-card">


<h5>
👨‍⚕️ Doctor
</h5>


<p>

{{$health->doctor_name ?? 'Not Added'}}

</p>


</div>


</div>






<div class="col-md-4">


<div class="preview-card">


<h5>
☎ Emergency
</h5>


<p>

{{$health->contact_number ?? 'Not Added'}}

</p>


</div>


</div>



</div>



</div>




</div>


</div>



<style>


.content{

margin-left:250px;

margin-top:70px;

padding:30px;

}



.health-title{

background:linear-gradient(135deg,#6a1b9a,#ab47bc);

padding:35px;

border-radius:25px;

color:white;

}



.health-admin-card{

border-radius:25px;

overflow:hidden;

}



.card-header{

background:#6a1b9a;

color:white;

padding:20px;

}



.form-control{

border-radius:15px;

padding:12px;

}



.update-btn{

background:#7b1fa2;

color:white;

padding:12px 30px;

border-radius:25px;

border:none;

}



.update-btn:hover{

background:#512da8;

}




.preview{

background:#f3e5f5;

padding:30px;

border-radius:25px;

}



.preview-card{

background:white;

padding:25px;

border-radius:20px;

text-align:center;

box-shadow:0 5px 15px rgba(0,0,0,.08);

}



.preview-card h5{

color:#6a1b9a;

}



</style>



@include('auth.footer')