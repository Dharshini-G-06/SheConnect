@include('auth.header')
@include('auth.sidebar')

<div class="content">

<div class="container">

<div class="card shadow">

<div class="card-header bg-primary text-white">
<h3>Add My Profile</h3>
</div>

<div class="card-body">

<form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">

@csrf

<div class="mb-3">
<label>Name</label>
<input type="text" name="name" class="form-control">
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control">
</div>

<div class="mb-3">
<label>Phone</label>
<input type="text" name="phone" class="form-control">
</div>

<div class="mb-3">
<label>Department</label>
<input type="text" name="department" class="form-control">
</div>

<div class="mb-3">
<label>Year</label>
<input type="text" name="year" class="form-control">
</div>

<div class="mb-3">
<label>Address</label>
<textarea name="address" class="form-control"></textarea>
</div>

<div class="mb-3">
<label>Profile Photo</label>
<input type="file" name="photo" class="form-control">
</div>

<button class="btn btn-success">
Save Profile
</button>

</form>

</div>

</div>

</div>

</div>

@include('auth.footer')