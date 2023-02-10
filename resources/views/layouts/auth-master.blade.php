<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V15</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="../resources/third-party/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../resources/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../resources/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="../resources/third-party/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="../resources/third-party/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="../resources/third-party/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="../resources/third-party/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="../resources/third-party/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="../resources/css/util.css">
	<link rel="stylesheet" type="text/css" href="../resources/css/main.css">
</head>
<body>
    @include('layouts.partials.navbar')
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">

                @yield('content')
				
			</div>
		</div>
	</div>
    @include('auth.partials.copy')

	
	<script src="../resources/third-party/jquery/jquery-3.2.1.min.js"></script>
	<script src="../resources/third-party/animsition/js/animsition.min.js"></script>
	<script src="../resources/third-party/bootstrap/js/popper.js"></script>
	<script src="../resources/third-party/bootstrap/js/bootstrap.min.js"></script>
	<script src="../resources/third-party/select2/select2.min.js"></script>
	<script src="../resources/third-party/daterangepicker/moment.min.js"></script>
	<script src="../resources/third-party/daterangepicker/daterangepicker.js"></script>
	<script src="../resources/third-party/countdowntime/countdowntime.js"></script>
	<script src="../resources/js/auth.js"></script>

</body>
</html>