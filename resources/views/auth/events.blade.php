<!DOCTYPE html>
<html>

<head>

<title>Upcoming Events</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f5f7fb;
}

.card-box{

    background:white;
    padding:20px;
    border-radius:15px;
    box-shadow:0 5px 15px #ddd;

}

</style>

</head>


<body>


<div class="container mt-5">


<h2 class="mb-4">
📅 Upcoming Events
</h2>



<div class="row">


@foreach($events as $event)


<div class="col-md-4 mb-4">


<div class="card-box">


<h4>
{{ $event->title }}
</h4>


<p>

<b>Date:</b>

{{ $event->date }}

</p>


<p>

<b>Venue:</b>

{{ $event->venue }}

</p>


<p>

{{ $event->description }}

</p>


</div>


</div>


@endforeach



</div>



</div>


</body>

</html>