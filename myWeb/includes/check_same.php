<?php

$method = $_REQUEST['m'];
$q_str = $_REQUEST['q'];

require_once('mycontacts_open.inc.php');
if($method=='email')
    $sql="SELECT user_id From user_data where email = '$q_str'";
else
    $sql="SELECT user_id From user_data where user_name = '$q_str'";
$result = mysqli_query($link, $sql);
$total_records=mysqli_num_rows($result);  // 取得記錄數
mysqli_free_result($result);  // 釋放佔用的記憶體
require_once("mycontacts_close.inc.php");
if($total_records >= 1){
    echo "There have been a same data in database.";
}
else{
    echo "There have not been a same data in database.";
}

?>