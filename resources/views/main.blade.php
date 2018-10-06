<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>The-fox</title>
	<base href="{{asset('')}}" target="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="public/source/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/source/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="public/source/css/style.css">
	<link rel="stylesheet" href="public/source/css/list.css">
	<link rel="stylesheet" href="public/source/css/detail.css">
	<link rel="stylesheet" href="public/source/css/cart.css">
         
     <script>
        function base_url(){
           return "<?php echo asset('');?>" ;
         }
      
     </script>

	
</head>
<body>
	<header id="header" class="">
		@include('header')
	</header><!-- /header -->
	<main>
		@yield('content')
	</main>
	<footer>
		@include('footer')
	</footer>
</body>
<script src="public/source/js/jquery-3.2.1.min.js"></script>
<script src="public/source/elevatezoom-master/jquery.elevatezoom.js"></script>
<script src="public/source/bootstrap/js/bootstrap.min.js"></script>
<script src="public/source/js/my.js"></script>
<script>
    $("#zoom_01").elevateZoom();
    </script>

</html>