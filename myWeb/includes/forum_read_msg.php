<?php
session_start();
require_once('mycontacts_open.inc.php');
$forum_id = 0;
if(isset($_SESSION['user_id']))
  $user_id = $_SESSION['user_id'];
else
  $user_id = -999;
if(isset($_SESSION['last_post_time']))
  $last_post_time = $_SESSION['last_post_time'];
else
  $last_post_time = '20022-07-01 00:00:00';
$_SESSION['last_post_time'] = date('Y-m-d H:i:s');
$sql="SELECT post_user_id , user_name as post_user_name , post_time , message_content
FROM messages
JOIN user_data on messages.post_user_id = user_data.user_id
WHERE forum_id = '$forum_id' && post_time > '$last_post_time'
ORDER BY post_time";
$result = mysqli_query($link, $sql);
$total_records=mysqli_num_rows($result);  // 取得記錄數

for($i=0;$i<$total_records;$i++){
  $row = mysqli_fetch_assoc($result);
  $post_user_id=$row['post_user_id'];
  $post_user_name=$row['post_user_name'];
  $post_time=$row['post_time'];
  $message_content=$row['message_content'];

  $ptr1=$message_content;$ptr2="[".$post_user_name."]&nbsp;".$post_time;
  if($post_user_id==$user_id){
    include("../templates/own_msg.php");
  }else{
    include("../templates/other_msg.php");
  }
  echo $template;
}
mysqli_free_result($result); 
require_once("mycontacts_close.inc.php");
?>