@if(session()->has('success'))
	<br>
	<div class="alert alert-dismissable alert-success">
		<button type="button" class="close" data-dismiss="alert" area-level="close">
			<span area-hidden="true">&times;</span>
		</button>
		<strong>
			{!! session()->get('success') !!}
		</strong>
	</div>
@endif