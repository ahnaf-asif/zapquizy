@extends('layouts.admin')

@section('content')
	
	<div class="container bg-white">

		<h1 class="text-center font-bold my-3 text-3xl">All Question Banks</h1>
		<a href="{{ route('admin.new.question.bank') }}">
			<button class="my-3 py-2 px-5 bg-green-600 hover:bg-green-500 text-white">Add New Question Bank</button>
		</a>
		<hr>
		<div class="mt-3">
			<table id="questionBankList" class="cell-border">
				<thead>
					<tr>
						<th>SL</th>
						<th>Name</th>
						<th>Level</th>
						<th>Subject</th>
						<th>Created At</th>
						<th>Action</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($question_banks as $indx => $bank)
						<tr>
							<td>{{ $indx+1 }}</td>
							<td>{{ $bank->name }}</td>
							<td>{{ $bank->level }}</td>
							<td>{{ $bank->subject }}</td>
							<td>{{ $bank->created_at->format('d M Y h:i a') }}</td>
							<td class="">
								<a href="{{ route('visit.question.bank', ['id' => $bank->id]) }}">
									<button class="py-1 px-3 bg-blue-400 text-white">Enter</button>
								</a>
							</td>
							<td>
								<a href="{{ route('admin.delete.question.bank', ['id' => $bank->id]) }}" onclick="return confirm('Do you really want to delete this question bank?')">
									<button class="py-1 px-3 bg-red-400 text-white">Delete</button>
								</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	
@stop

@section('js')
	<script >
		$(document).ready( function () {
		    $('#questionBankList').DataTable();
		} );
	</script>
@stop