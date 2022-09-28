@extends('master')

@section('content')

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>User Details</b></div>
			<div class="col col-md-6">
				<a href="{{ route('users.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>User Name</b></label>
			<div class="col-sm-10">
				{{ $user->name }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>User Email</b></label>
			<div class="col-sm-10">
				{{ $user->email }}
			</div>
		</div>
		<div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>User Mobile Number</b></label>
			<div class="col-sm-10">
                {{ $user->phone }} 
			</div>
		</div>
		<div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>User Image</b></label>
			<div class="col-sm-10">
                <?php $bHasLink = strpos($user->photo, 'http') !== false || strpos($user->photo, 'www.') !== false;
                    if($bHasLink==1){
                ?>
                    <img src="{{ $user->photo }}" width="200" class="img-thumbnail" />
                <?php } else{ ?>
                    <img src="{{ asset('images/' .  $user->photo) }}" width="200" class="img-thumbnail" />
                <?php } ?>
				
			</div>
		</div>
	</div>
</div>

@endsection('content')