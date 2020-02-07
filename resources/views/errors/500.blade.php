<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>خطا</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:700,900" rel="stylesheet">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="/errors/css/style.css" />
	<link href="/dashboard/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<style>
		h2, a {
			font-family: iranyekan !important;
			font-size: 20px;
			color: white;
		}
		a:hover {
			text-decoration:none!important;
		}
	</style>
</head>

<body>

	<link href="https://fonts.googleapis.com/css?family=Encode+Sans+Semi+Condensed:100,200,300,400" rel="stylesheet">

	<body class="loading">
		<h2 class="pb-5" style="padding-top:5%;line-height: 1.7;">با عرض پوزش , در روند عملیات خطایی رخ داده است <br> این خطا به تیم فنی ارسال شده است و به زودی برطرف خواهد شد . با تشکر از صبر و شکیبایی شما</h2>
		<div class="gears">
			<div class="gear one">
				<div class="bar"></div>
				<div class="bar"></div>
				<div class="bar"></div>
			</div>
			<div class="gear two">
				<div class="bar"></div>
				<div class="bar"></div>
				<div class="bar"></div>
			</div>
			<div class="gear three">
				<div class="bar"></div>
				<div class="bar"></div>
				<div class="bar"></div>
			</div>
			<div class="d-flex justify-content-center">
				<a href="{{ \URL::previous() }}" class="button b-blue">بازگشت</a>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
		<script src="js/main.js" type="text/javascript"></script>
	</body>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

<script>
	$(function() {
		setTimeout(function() {
			$('body').removeClass('loading');
		}, 800);
	});
</script>

</html>
