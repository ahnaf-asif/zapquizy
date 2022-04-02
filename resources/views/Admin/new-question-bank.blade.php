@extends('layouts.admin')

@section('content')
	 
	<div class="container">
		<h1 class="text-center font-bold my-3 text-3xl">Add New Question Bank</h1>
		{{-- <hr> --}}
		<div class="border-2 p-5">
			<form method="POST" action="{{ route('admin.add.new.question.bank') }}">
				@csrf 
				<label for="name "><span class="text-xl font-bold">QB Name</span></label>
				<input class="mt-3 w-full h-8 text-lg outline-0" autofocus type="text" name="name" id="name">
				<hr>

				<div class="w-full md:w-1/3 mb-6 mt-3">
			      <label class="block tracking-wide text-gray-700 text-xl font-bold mb-2" for="level">
			        Select Level
			      </label>
			      <div class="relative ">
			        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="level" name="level">
			          @foreach ($levels as $level)
			          	<option>{{ $level->name }}</option>
			          @endforeach
			        </select>
			        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
			          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
			        </div>
			      </div>
		    	</div>

		    	<div class="w-full md:w-1/3 mb-6 mt-3">
			      <label class="block  tracking-wide text-gray-700 text-xl font-bold mb-2" for="subject">
			        Select Subject
			      </label>
			      <div class="relative ">
			        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="subject" name="subject">
			          @foreach ($subjects as $subject)
			          	<option>{{ $subject->name }}</option>
			          @endforeach
			        </select>
			        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
			          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
			        </div>
			      </div>
		    	</div>

		    	<button type="submit" class="my-3 py-2 px-5 text-lg bg-green-600 hover:bg-green-500 text-white">Add Question Bank</button>
			</form>
			
			
		</div>
	</div>

@stop