@extends('layouts.admin')

@section('content')
	<div class="container">
		<h1 class="text-center font-bold my-3 text-3xl">All Functionality Lists</h1>
		<hr>
		<ul class="list-disc mt-3">
		    <li>
		    	<a href="{{ route('admin.model.tests') }}">Model Tests</a>
		    </li>
		    <li>
		    	<a href="{{ route('admin.question.banks') }}">Question Banks</a>
		    </li>
		    $x^2$
		</ul>
		
	</div>
@stop

@section('js')

@stop