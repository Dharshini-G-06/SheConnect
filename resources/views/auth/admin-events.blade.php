<!DOCTYPE html>
<html>

<head>

<title>Event Management</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<style>

body{
    background:#f5f7fb;
}


.box{

    background:white;
    padding:25px;
    border-radius:15px;
    box-shadow:0 5px 15px #ddd;

}

</style>


</head>


<body>


<div class="container mt-5">


<div class="box">


<h2 class="mb-4">
📅 Event Management
</h2>



<!-- Add Event Form -->


<form method="POST"
action="{{route('admin.events.store')}}">


@csrf


<div class="row">


<div class="col-md-6">

<label>
Event Title
</label>

<input type="text"
name="title"
class="form-control"
placeholder="Enter Event Name">

</div>



<div class="col-md-6">

<label>
Event Date
</label>

<input type="date"
name="date"
class="form-control">

</div>



</div>



<br>


<label>
Venue
</label>

<input type="text"
name="venue"
class="form-control"
placeholder="Event Venue">


<br>


<label>
Description
</label>


<textarea
name="description"
class="form-control"
rows="3"
placeholder="Event Description">
</textarea>


<br>


<button class="btn btn-primary">

Add Event

</button>


</form>


</div>



<br>



<!-- Event List -->


<div class="box">


<h3>
Upcoming Events
</h3>



<table class="table table-bordered table-hover">


<thead class="table-dark">


<tr>

<th>
Title
</th>


<th>
Date
</th>


<th>
Venue
</th>


<th>
Description
</th>


<th>
Action
</th>


</tr>


</thead>



<tbody>



@foreach($events as $event)


<tr>


<td>
{{$event->title}}
</td>


<td>
{{$event->date}}
</td>


<td>
{{$event->venue}}
</td>


<td>
{{$event->description}}
</td>


<td>


<form method="POST"
action="{{route('admin.events.delete',$event->id)}}">


@csrf

@method('DELETE')


<button class="btn btn-danger btn-sm">

Delete

</button>


</form>


</td>


</tr>


@endforeach



</tbody>


</table>



</div>



</div>



</body>

</html>