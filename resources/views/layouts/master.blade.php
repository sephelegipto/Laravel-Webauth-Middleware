
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
    @yield('title')
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Minimal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery.min.js"> </script>
<!-- Mainly scripts -->
<script src="js/jquery.metisMenu.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<!-- Custom and plugin javascript -->
<link href="css/custom.css" rel="stylesheet">
<script src="js/custom.js"></script>
<script src="js/screenfull.js"></script>
          @include('layouts.scripts.scriptOne')
</head>
<body>
<div id="wrapper">


         @include('layouts.header.header')
         @include('layouts.sidebar.sidebar')
            
       <div class="content-main">
 
      
        <!--content-->
       
            @yield('content')
    <!--//grid-->
   
        <div class="clearfix"> </div>
        </div>
        <!---->
    

        <!--//content-->


     
        <!---->
<div class="copy">
            <p> &copy; 2017 CSU. All Rights Reserved </p>
        </div>
        </div>
        <div class="clearfix"> </div>
       </div>
     </div>
     
<!---->
<!--scrolling js-->


    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/scripts.js"></script>
  
    <script src="js/datatable/dataTables.buttons.min.js"> </script>

    <script src="js/datatable/jszip.min.js"> </script>
    <script src="js/datatable/pdfmake.min.js"> </script>
    <script src="js/datatable/vfs_fonts.js"> </script>
    <script src="js/datatable/buttons.html5.min.js"> </script>
    <script src="js/datatable/buttons.print.min.js"> </script>
     <script src="js/datatable/buttons.print.min.js"> </script>
        <script src="js/datatable/buttons.flash.min.js"> </script>

        

    <script src="js/bootstrap.min.js"> </script>
    
    @yield('script')
    
    

    
    
    
</body>
</html>

