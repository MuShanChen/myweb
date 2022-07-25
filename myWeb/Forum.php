<!DOCTYPE html>
<html lang="en">
<head>
  <title>My Web</title>
  <?php 
    include_once("includes/header.php");
    $_SESSION['last_post_time']='20022-07-01 00:00:00';  
  ?>
  <link rel="stylesheet" href="css/forum.css">
  <script>
    $(document).ready(function(){
      $('#navg').load('includes/navg.php',function(){
        $('#ForumRef').addClass("active bg-success rounded-2");
      });
      $('#footor').load('includes/footor.php');
    })

    function send_msg(){
      clearTimeout(readTimer);
      let str=$('#usermsg').val();
      if(str=="")return;
      let xmlhttp=new XMLHttpRequest();
      xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
          let objDiv = document.getElementById("Msg_box");
          objDiv.scrollTop = objDiv.scrollHeight; 
          read_trigger();
        }
      }
      xmlhttp.open("GET","includes/forum_send_msg.php?q="+str,true);
      xmlhttp.send();
    }

    var readTimer;  // 儲存定時器
    function read_trigger(){
      read_msg();
      readTimer=setTimeout('read_trigger()', 3000); // 3 秒後再呼叫自己
    }
    function read_msg(){
      let xmlhttp=new XMLHttpRequest();
      xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
          let tmp=$('#Msg_box').html();
          $('#Msg_box').html(tmp+this.responseText);
          if(this.responseText!=""){  //scroll down
            let objDiv = document.getElementById("Msg_box");
            if(objDiv.scrollTop>=objDiv.scrollHeight-objDiv.clientHeight-500)
              objDiv.scrollTop = objDiv.scrollHeight; 
          }
        }
      }
      xmlhttp.open("GET","includes/forum_read_msg.php",true);
      xmlhttp.send();
    }
  </script>
</head>
<body onload="read_trigger();">
<div class="p-5 bg-primary text-white text-center">
  <h3>My Web</h3>
</div>
<div id="navg"></div>
<!--   網頁本文   -->

<div class="chat_box col-lg-7  mt-3 rounded-3 p-3 border border-second mx-auto">
  <div id="Msg_box">
  </div>
  <form id='bottom' onsubmit='send_msg();return false;' class='d-flex'>
    <?php 
      if(isset($_SESSION['user_name'])){
        echo(
            "<input type='text' id='usermsg' name='usermsg' class='form-control me-2 mt-4' placeholder='send message...'>
            <button class='btn btn-primary  me-2 mt-4' type='submit'>
              <i class='fa fa-comments'></i>
            </button>"
        );
      }else{
        echo(
          "<a class='btn btn-primary form-control mt-4' href='login.php'>Log in to join the discussion</a>"
        );
      }
    ?>
  </form>
</div>

<!--   網頁本文   -->
<div id="footor" class="mt-5 p-4 text-center footer"></div>

</body>
</html>
