<!DOCTYPE html>

<html>

<head>

<title>Complaint</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>


<body>


<div class="container mt-5">


<div class="card p-4">


<h3>
Submit Complaint
</h3>

<form method="POST"
action="{{route('complaints.store')}}">

@csrf


<label>
Subject
</label>

<input 
type="text"
name="subject"
class="form-control"
placeholder="Complaint Subject">


<textarea
name="message"
class="form-control mt-3"
placeholder="Enter your complaint">
</textarea>


<button class="btn btn-primary mt-3">
Submit Complaint
</button>

</form>


</div>


</div>


</body>

</html>