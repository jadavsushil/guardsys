@extends('master')

@section('content')

@if($errors->any())

<div class="alert alert-danger">
	<ul>
	@foreach($errors->all() as $error)

		<li>{{ $error }}</li>

	@endforeach
	</ul>
</div>

@endif

<div class="card">
	<div class="card-header">Add User</div>
	<div class="card-body">
		<form id="userForm" method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">
			@csrf
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">User Name</label>
				<div class="col-sm-10">
					<input type="text" name="name" class="form-control" required />
				</div>
			</div>
            <div class="row mb-3">
				<label class="col-sm-2 col-label-form">User Mobile Number</label>
				<div class="col-sm-10">
					<input type="text" name="phone" class="form-control" required />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">User Email</label>
				<div class="col-sm-10">
					<input type="text" name="email" class="form-control" required />
				</div>
			</div>
			
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">User Image</label>
				<div class="col-sm-10">
					<input type="file" name="photo" />
				</div>
			</div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Add" />
			</div>	
		</form>
	</div>
</div>

@endsection('content')
