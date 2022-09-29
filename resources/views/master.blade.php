<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>User Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="{{ asset('assets/jquery.validate.js') }}"></script>
	<!-- CSS -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />

	
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
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
			
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
		<!-- JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
		<script>

			$(function () {
						
				$(".gfgselect").click(function () {
					var id = $(this).attr("#data-id");
					console.log(id);
					var user_id = $(this).parents("tr").find(".usid").text();
					var user_name = $(this).parents("tr").find(".usname").text();
					var user_email = $(this).parents("tr").find(".usemail").text();
					var user_phone = $(this).parents("tr").find(".usphone").text();
					document.getElementById("user_name").innerHTML=user_name;
					document.getElementById("user_email").innerHTML=user_email;
					document.getElementById("user_phone").innerHTML=user_phone;
					$("#number").val(user_phone);
					$("#user_id").val(user_id)
					
				});
			});
		</script>
		
		@stack('scripts')
        
    </div>
	

		
</body>
</html>