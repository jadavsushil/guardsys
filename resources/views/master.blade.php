<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="{{ asset('assets/jquery.validate.js') }}"></script>
    <script>
	$().ready(function() {
		$("#userForm").validate({
			rules: {
                name: {
					required: true,
					minlength: 2
				},
				phone: "required",
                email: {
					required: true,
					email: true
				}
			},
			messages: {
				name: {
					required: "Please enter a name",
					minlength: "Name must consist of at least 2 characters"
				},
				email: "Please enter a valid email address",
				phone: "Please enter mobile number"
			}
		});
	});
	</script>
    <style>
    
        #userForm label.error, #userForm input.submit {
            margin-left: 253px;
        }
        
        #userForm label.error {
            margin-left: 10px;
            color: red;
            width: auto;
            display: inline;
        }
	
	</style>
</head>
<body>
    <div class="container mt-5">
        
        <h1 class="text-primary mt-3 mb-4 text-center"><b>User Information</b></h1>
        
        @yield('content')
        
    </div>
    
</body>
</html>