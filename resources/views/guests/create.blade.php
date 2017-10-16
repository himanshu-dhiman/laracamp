@extends('layouts.app')

@section('content')
<div class="container">
	<div style="font-size: 36px;">Add Guest</div>
	<hr style="border: 1px solid black; ">
	<div class="col-md-6 col-sm-12 ">	
		<form action="/guests" method="POST">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="email">Guest Name:</label>
				<input type="text" class="form-control" name="name">
			</div>
			<div class="form-group">
				<label for="pwd">Guest email:</label>
				<input type="email" class="form-control" name="email">
			</div>
			<button type="submit" class="btn btn-primary">Add Guest</button>
		</form>
	</div>
</div>
@endsection