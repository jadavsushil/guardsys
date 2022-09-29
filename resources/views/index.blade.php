@extends('master')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success">
	{{ $message }}
</div>

@endif

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>User Data</b></div>
			<div class="col col-md-6">
				<a href="{{ route('users.create') }}" class="btn btn-success btn-sm float-end">Add</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<table class="table table-bordered">
			<tr>
				<th>Image</th>
				<th>Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Action</th>
			</tr>
			@if(count($data) > 0)

			@foreach($data as $row)
			<tr>
				<td class="usid">{{ $row->id }}</td>
				<td>
					<?php $bHasLink = strpos($row->photo, 'http') !== false || strpos($row->photo, 'www.') !== false;
					if ($bHasLink == 1) {
					?>
						<img src="{{ $row->photo }}" width="75" />
					<?php } else { ?>
						<img src="{{ asset('images/' . $row->photo) }}" width="75" />
					<?php } ?>

				</td>
				<td class="usname">{{ $row->name }}</td>
				<td class="usemail">{{ $row->email }}</td>
				<td class="usphone">{{ $row->phone }}</td>
				<td>
					<form method="post" action="{{ route('users.destroy', $row->id) }}">
						@csrf
						@method('DELETE')
						<a href="{{ route('users.show', $row->id) }}" class="btn btn-primary btn-sm">View</a>
						<a href="{{ route('users.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
						<a data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{ $row->id }}" class="gfgselect btn btn-danger btn-sm "> Delete </a>
					</form>

				</td>
			</tr>
			@endforeach

			@else
			<tr>
				<td colspan="5" class="text-center">No Data Found</td>
			</tr>
			@endif

		</table>
		{!! $data->links() !!}
	</div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">User Delete</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="card-body">
						<input type="text" id="user_id" style="display: none;" />
						<div class="row mb-3">
							<label class="col-sm-4 col-label-form">User Name</label>
							<div class="col-sm-8">
								<span id="user_name"></span>
							</div>
						</div>

						<div class="row mb-3">
							<label class="col-sm-4 col-label-form">User Email</label>
							<div class="col-sm-8">
								<span id="user_email"></span>
							</div>
						</div>
						<div id="recaptcha-container"></div>
						<div class="row mb-3">
							<label class="col-sm-4 col-label-form">Mobile Number</label>
							<div class="col-sm-8">
								<input type="text" name="phone" id="number" class="form-control"  style="display:none;"  />
								<span id="user_phone"></span>
							</div>						
						</div>
						<div class="row mb-3">
							<label class="col-sm-4 col-label-form">Enter OTP</label>
							<div class="col-sm-8">							
								<input type="text" name="" id="codeToVerify" name="getcode" class="form-control" placeholder="Enter Code">
							</div>
							<div id="time_for_otp" class="text-danger"  style="display:none;">
								<div>Time left <span id="timer"></span> sec </div>
							</div>
						</div>

						<div class="text-center">
							
							<a href="#" id="getcode" class="btn btn-dark btn-sm ">Send OTP</a>
							<a href="#" class="btn btn-dark btn-sm btn-block" id="verifPhNum">Verify Phone No</a>
						</div>

					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" id="submit_btn" data-url="{{ route('users.delete') }}" style="display:none;">Submit</button>
					
				</div>
			
		</div>
	</div>
</div>


@endsection


@push('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/firebase/8.0.1/firebase.js"></script>
<script src="{{ asset('assets/js/firebase.js') }}"></script>
<script>
	$('#submit_btn').on('click', function (e) {
		
		var id = document.getElementById("user_id").value;
		$.ajax({
			url: $(this).attr('data-url'),
			type: 'POST',
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			data: {'id': id},
			success: function (response) {
				window.location.reload();
				console.log('response',response);
			},
			error: function (response) {
				window.location.reload();
				console.error(response.responseText);
			}
		});
	});
</script>

@endpush
