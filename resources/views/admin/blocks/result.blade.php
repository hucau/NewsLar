@if(Session::has('error_msg'))
	<div class="{{ Session::get('error_msg') }}">
		{{ Session::get('result_msg') }}
	</div>
@endif