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
					<input type="text" name="name" class="form-control" placeholder="Enter user Name" required />
				</div>
			</div>
            
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">User Email</label>
				<div class="col-sm-10">
					<input type="text" name="email" class="form-control" placeholder="Enter user email" required />
				</div>
			</div>
			
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">User Image</label>
				<div class="col-sm-10">
					<input type="file" name="photo" />
				</div>
			</div>
			<div id="recaptcha-container"></div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">User Mobile Number</label>
				<div class="col-sm-8">
					<input type="text" name="phone" id="number" class="form-control" placeholder="Enter user mobile number with state code" required />
					<div id="time_for_otp" class="text-danger"  style="display:none;">
						<div>Time left <span id="timer"></span> sec </div>
					</div>
				</div>
				<div class="col-sm-2">
					<a href="#" id="getcode" class="btn btn-dark btn-sm col-md-12">Send OTP</a>
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Enter OTP</label>
				<div class="col-sm-10">
					<input type="text" name="" id="codeToVerify" name="getcode" class="form-control" placeholder="Enter Code">
					
				</div>
			</div>

			<div class="text-center">
				<input type="submit" class="btn btn-primary btn-sm" value="Submit" id="submit_btn"  style="display:none;"/>
				<a href="#" class="btn btn-dark btn-sm btn-block" id="verifPhNum">Verify Phone No</a>
			</div>	
			
	
		</form>
	</div>
</div>

@endsection

@push('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/firebase/8.0.1/firebase.js"></script>
<script src="{{ asset('assets/js/firebase.js') }}"></script>


@endpush
