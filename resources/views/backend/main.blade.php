<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hệ thống quản trị</title>
    <base href="{{asset('')}}" target="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="public/backend/AdminLTE/AdminLTE.min.css">
    <link rel="stylesheet" href="public/backend/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/backend/AdminLTE/_all-skins.min.css">
    <link rel="stylesheet" href="public/backend/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/backend/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="public/backend/css/style.css">
    <link rel="stylesheet" href="public/backend/css/login.css">
   <!--  <script src="public/backend/js/loader.js"></script> -->
    
     <script>
        function base_url(){
           return "<?php echo asset('');?>" ;
         }
         
     </script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  
        <!-- Vung Header -->
@include('backend/header')
 <!-- ./Vung Header -->
@include('backend/sidebar')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
   @yield('backend')

  </div>
  <!-- /.content-wrapper -->
@include('backend/footer')

    <script src="public/backend/js/jquery-2.2.3.min.js"></script>
    <script src="public/backend/bootstrap/js/bootstrap.min.js"></script>
   <!--  <script src="public/backend/js/jquery-ui.min.js"></script> -->
    <script src="public/backend/AdminLTE/app.min.js"></script>
       <script src="public/backend/tinymce/tinymce.min.js"></script>
    <script src="public/backend/tinymce/main.js"></script>
 

 
</body>
</html>