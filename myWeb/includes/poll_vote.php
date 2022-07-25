<?php


//get content of textfile
$filename = "../resource/poll_result.txt";
$content = file($filename);

//put content in array
$array = explode("||", $content[0]);
$yes = $array[0];
$no = $array[1];
$vote=$_GET["vote"];

if ($vote == 0) {
  $yes = $yes + 1;
}
if ($vote == 1) {
  $no = $no + 1;
}
$insertvote = $yes."||".$no;
$fp = fopen($filename,"w");
fputs($fp,$insertvote);
fclose($fp);
?>
<div class="d-flex align-items-center">
    <div class="me-3">
        Result:
    </div>
    <table style="text-align:left;">
    <tr>
    <td>Yes:</td>
    <td><img src="resource/poll.gif"
    width='<?php echo(100*round($yes/($no+$yes),2)); ?>'
    height='8'>
    <?php echo(100*round($yes/($no+$yes),2)); ?>%
    </td>
    </tr>
    <tr>
    <td>No:</td>
    <td><img src="resource/poll.gif"
    width='<?php echo(100*round($no/($no+$yes),2)); ?>'
    height='8'>
    <?php echo(100*round($no/($no+$yes),2)); ?>%
    </td>
    </tr>
    </table>
</div>
