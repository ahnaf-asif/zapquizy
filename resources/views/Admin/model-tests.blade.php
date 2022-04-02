@extends('layouts.admin')

@section('content')
	
	<div class="container bg-white">
		<h1 class="text-center font-bold my-3 text-3xl">All Model Tests</h1>
		<hr>
		<div class="mt-3">
			<table id="modelTestList" class="cell-border ">
				<thead>
					<tr>
						<th>SL</th>
						<th>Name</th>
						<th>Class</th>
						<th>Subject</th>
						<th>Created At</th>
						<th>Action</th>
						<th>Action</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>SL</td>
						<td>Model Test 1</td>
						<td>SSC</td>
						<td>Physics 1</td>
						<td>12-12-59</td>
						<td>Action</td>
						<td>Action</td>
						<td>Action</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	
@stop

@section('js')
	<script >
		$(document).ready( function () {
		    $('#modelTestList').DataTable();
		} );
	</script>
@stop