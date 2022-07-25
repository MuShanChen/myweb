<?php
$xmlDoc=new DOMDocument();
$xmlDoc->load("../resource/sreach.xml");

$x=$xmlDoc->getElementsByTagName('link');

//get the q parameter from URL
$q=$_GET["q"];

//lookup all links from the xml file if length of q>0
if (strlen($q)>0) {
  $hint="";
  for($i=0; $i<($x->length); $i++) {
    $y=$x->item($i)->getElementsByTagName('title');
    $z=$x->item($i)->getElementsByTagName('url');
    if ($y->item(0)->nodeType==1) {
      //find a link matching the search text
      if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q)) {
        if ($hint=="") {
          $hint=" <option value=\"" .
          $z->item(0)->childNodes->item(0)->nodeValue .          
          "\">" .
          $y->item(0)->childNodes->item(0)->nodeValue . "</option>";
        } else {
          $hint=$hint .  " <option value=\"" .
          $z->item(0)->childNodes->item(0)->nodeValue .          
          "\">" .
          $y->item(0)->childNodes->item(0)->nodeValue . "</option>";
        }
      }
    }
  }
}

if($hint=="")
  echo "<option disabled>no suggestion</option>";
else
  echo $hint;
?>