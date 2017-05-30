<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{{ config('base-admin.title_name_browser') }}</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Libraries -->
	{!! Assets::renderCss() !!}
	@stack('css-push')
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="skin-red-light sidebar-mini fixed">
<div class="wrapper">
	<!--Header-->
	@include('base::admin.partials.header')
	<!-- Left side column. contains the logo and sidebar -->
	@include('base::admin.partials.aside')
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Dashboard
				<small>Version 2.0</small>
			</h1>
			<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">Dashboard</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
				@yield('content')
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	<!-- Footer -->
	@include('base::admin.partials.footer')
</div>
<!-- ./wrapper -->
<!-- Js render -->
{!! Assets::renderJs() !!}
@stack('js-push')
<script type="text/javascript">
	$(document).ready(function () {
		$('body').on('click',  '#check-all', function () {
			$('.check-item').not(this).prop('checked', this.checked)
		})
	})
</script>
</body>
</html>
