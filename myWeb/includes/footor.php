<script>
function getVote(int) {
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("poll").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","includes/poll_vote.php?vote="+int,true);
  xmlhttp.send();
}
</script>

<div class="d-flex justify-content-around align-items-center">
  <button type="button" class="btn btn-outline-secondary col-sm-2">About</button>
  <button type="button" class="btn btn-outline-secondary col-sm-2">Report Error</button>
  <button type="button" class="btn btn-outline-secondary col-sm-2">Forum</button>
  <div id="poll" class="footerText p-0 m-0">
    Do you like us?
    <form class="footerText ">
    Yes: <input type="radio" class="form-check-input" name="vote" value="0" onclick="getVote(this.value)">
    No: <input type="radio" class="form-check-input" name="vote" value="1" onclick="getVote(this.value)">
  </form>
  </div>
</div>
<div class="footerText">
<hr>
W3Schools is optimized for learning and training. Examples might be simplified to improve reading and learning. Tutorials, references, and examples are constantly reviewed to avoid errors, but we 
<br>
cannot warrant full correctness of all content. While using W3Schools, you agree to have read and accepted our terms of use, cookie and privacy policy.
<br>
Copyright 1999-2022 by Refsnes Data. All Rights Reserved.
<br>
W3Schools is Powered by W3.CSS.
</div>
<br>
<a class="navbar-item me-2" href="https://www.w3schools.com/">
  <img src="resource/w3sch.png" alt="Logo"style="width:100px;" >
</a>