@extends ('layouts.app')

@section('content')
<div class="container">
	<div style="font-size: 36px;">Enter Email to Respond to Invitation</div>
	<hr style="border: 1px solid black; ">
	<div class="col-md-6 col-sm-12 ">	
		<form action="/rsvp/response" method="POST">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="pwd">Guest email:</label>
				<input type="email" class="form-control" name="email" required>
			</div>
			<button type="submit" class="btn btn-primary">Verify</button>
		</form>
	</div>
</div>
@endsection