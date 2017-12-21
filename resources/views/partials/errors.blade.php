
@if(count($errors) > 0 && isset($errors)  )

<br>
	<div class="alert alert-danger alert-dismissable fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<ul>
			@foreach($errors->all() as $error)
				<li><strong> {{ $error }} </strong></li>
			@endforeach	
		</ul>
	</div>
@endif