<table class="table table-bordered">

<tr>

<th>Subject</th>
<th>Message</th>
<th>Status</th>
<th>Date</th>

</tr>


@foreach($complaints as $complaint)

<tr>

<td>
{{$complaint->subject}}
</td>


<td>
{{$complaint->message}}
</td>


<td>

@if($complaint->status=="Pending")

<span class="badge bg-danger">
Pending
</span>

@elseif($complaint->status=="In Progress")

<span class="badge bg-warning">
In Progress
</span>

@else

<span class="badge bg-success">
Resolved
</span>

@endif

</td>


<td>
{{$complaint->created_at->format('d-m-Y')}}
</td>


</tr>

@endforeach


</table>