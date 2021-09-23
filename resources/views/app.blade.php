<?php

  use Illuminate\Support\Facades\DB;
  require_once $_SERVER['DOCUMENT_ROOT'].'/Classes/function.php';	

?>

<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

@include('header')

<body class="animsition">
    <!-- page loader -->
	<div id="loading" class="loader vertical-align-middle loader-round-circle"></div> 
	 
    @include('nav')
    @include('site_menu')

    @yield('content')
    
    @include('footer')
</body>
</html>
