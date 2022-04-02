@extends('layouts.admin')

@section('content')
	
	<div class="container">
		
		<edit-question-bank 
		prop-question-bank="{{ json_encode($bank) }}"
		prop-levels="{{ json_encode($levels) }}"
		prop-subjects="{{ json_encode($subjects) }}"
		prop-chapters="{{ json_encode($chapters) }}"
		 />
	</div>

@stop