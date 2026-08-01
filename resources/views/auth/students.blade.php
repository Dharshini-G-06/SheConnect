<!DOCTYPE html>
<html>

<head>

<title>Student Management</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">


<style>

body{
    background:#f5f7fb;
}


.container-box{

    background:white;
    padding:25px;
    border-radius:15px;
    box-shadow:0 5px 15px #ddd;

}


.table img{

    width:50px;
    height:50px;
    object-fit:cover;

}


</style>

</head>


<body>


<div class="container mt-5">


<div class="container-box">


<div class="d-flex justify-content-between mb-4">

<h3>
<i class="bi bi-people"></i>
Student Management
</h3>


<input type="text"
class="form-control w-25"
placeholder="Search Student">


</div>



<table class="table table-bordered table-hover">


<thead class="table-dark">


<tr>

<th>
Photo
</th>

<th>
Name
</th>

<th>
Register No
</th>

<th>
Department
</th>

<th>
Year
</th>

<th>
Email
</th>

<th>
Phone
</th>

<th>
Action
</th>


</tr>


</thead>



<tbody>


@forelse($students as $student)


<tr>


<td>


@if($student->photo)

<img src="{{asset('storage/'.$student->photo)}}"
class="rounded-circle">


@else

<img src="https://via.placeholder.com/50"
class="rounded-circle">

@endif


</td>



<td>
{{ $student->name }}
</td>


<td>
{{ $student->register_no }}
</td>


<td>
{{ $student->department }}
</td>


<td>
{{ $student->year }}
</td>


<td>
{{ $student->email }}
</td>


<td>
{{ $student->phone }}
</td>


<td>


<a href="{{route('admin.student.details',$student->id)}}"
class="btn btn-info btn-sm">

View

</a>


<a href="{{route('admin.student.edit',$student->id)}}"
class="btn btn-warning btn-sm">

Edit

</a>



<form action="{{route('admin.student.delete',$student->id)}}"
method="POST"
style="display:inline">


@csrf
@method('DELETE')


<button class="btn btn-danger btn-sm"
onclick="return confirm('Delete Student?')">

Delete

</button>


</form>


</td>


</tr>


@empty


<tr>

<td colspan="8" class="text-center">

No Students Found

</td>

</tr>


@endforelse


</tbody>


</table>


{{ $students->links() }}


</div>


</div>


</body>

</html>