@extends('master')

@section('content')

<div class="card">
	<div class="card-header">Edit User</div>
	<div class="card-body">
		<form id="userForm" method="post" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">User Name</label>
				<div class="col-sm-10">
					<input type="text" name="name" class="form-control" value="{{ $user->name }}" />
				</div>
			</div>
			
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">User Mobile Number</label>
				<div class="col-sm-10">
                        <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" />
				</div>
			</div>
            <div class="row mb-3">
				<label class="col-sm-2 col-label-form">User Email</label>
				<div class="col-sm-10">
					<input type="text" name="email" class="form-control" value="{{ $user->email }}" />
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">User Image</label>
				<div class="col-sm-10">
					<input type="file" name="image" />
					<br />
                    <?php $bHasLink = strpos($user->photo, 'http') !== false || strpos($user->photo, 'www.') !== false;
                        if($bHasLink==1){
                    ?>
                        <img src="{{ $user->photo }}" width="200" class="img-thumbnail" />
                    <?php } else{ ?>
                        <img src="{{ asset('images/' . $user->photo) }}" width="100" class="img-thumbnail" />
                    <?php } ?>
					
					<input type="hidden" name="hidden_user_image" value="{{ $user->photo }}" />
				</div>
			</div>
			<div class="text-center">
				<input type="hidden" name="hidden_id" value="{{ $user->id }}" />
				<input type="submit" class="btn btn-primary" value="Edit" />
			</div>	
		</form>
	</div>
</div>

@endsection('content')