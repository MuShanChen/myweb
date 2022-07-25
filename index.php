<!DOCTYPE html>
<html lang="en">
<head>
  <title>My Web</title>
  <?php 
    include_once("includes/header.php");
  ?>
  <script>
    $(document).ready(function(){
      $('#navg').load('includes/navg.php',function(){
        $('#indexRef').addClass("active bg-success rounded-2");
      });
      $('#container-left').load('includes/container-left.html');
      $('#footor').load('includes/footor.php',function(){
        let ele = document.getElementById('container-right');
        $('.container-left').css("height",ele.clientHeight);
      });
    })
  </script>

</head>
<body>

<div class="p-5 bg-primary text-white text-center">
  <h3>My Web</h3>
</div>
<div id="navg"></div>
<div class="container-all d-flex flex-row">
  <div id="container-left" class="container-left container-fluid m-0 p-0">
  </div>


  <div id="container-right" class="container-right container-fluid m-0 p-0">

     <!--   網頁本文   --> 
    <div class="text">
    GGG
	branch
	change2
    </div>
    
    
    
    <!--   網頁本文   -->

    <div id="footor" class="mt-5 p-4 text-center footer"></div>
  </div>
</div>

</body>
</html>