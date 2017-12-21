
@if(session()->has('success'))
<br>
	<div class="alert alert-success fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

		<strong> {{ session()->get('success') }} </strong>

	</div>
@endif