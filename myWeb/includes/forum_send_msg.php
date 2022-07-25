<?php
session_start();
require_once('mycontacts_open.inc.php');
$usermsg = $_REQUEST['q'];
$forum_id = 0;
$post_user_id = $_SESSION['user_id'];
$post_time = date('Y-m-d H:i:s');
$sql="INSERT INTO messages (forum_id, post_user_id, post_time, message_content)
  VALUES ('$forum_id','$post_user_id', '$post_time','$usermsg')";
if (!mysqli_query($link, $sql)){
  echo("alert('" . mysqli_error($link) ."');");
}
require_once("mycontacts_close.inc.php");

$ptr1=$usermsg;$ptr2="[".$_SESSION['user_name']."]&nbsp;".$post_time;
include_once("../templates/own_msg.php");
echo $template;
?>