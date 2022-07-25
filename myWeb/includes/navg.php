
<script>
  function showLiveSearch(str) {
    if (str.length==0) {
      document.getElementById("datalistOptions").innerHTML="";
      return;
    }
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("datalistOptions").innerHTML=this.responseText;
      }
    }
    xmlhttp.open("GET","includes/livesearch.php?q="+str,true);
    xmlhttp.send();
  }
  function transform(str) {
    try {
      new URL(str);
    }catch (e){
      return;
    }
    window.location.href=str;
  }
</script>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <a class="navbar-item me-2" href="https://www.w3schools.com/">
        <img src="resource/w3sch.png" alt="Logo" style="width:40px;" class="rounded-pill">
      </a>
      <li class="nav-item">
        <a id = "indexRef" class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a id = "HtmlRef" class="nav-link" href="Html.php">Html</a>
      </li>
      <li class="nav-item">
        <a id = "CssRef" class="nav-link" href="Css.php">Css</a>
      </li>
      <li class="nav-item">
        <a id = "BootstrapRef" class="nav-link" href="Bootstrap.php">Bootstrap</a>
      </li>
      <li class="nav-item">
        <a id = "JQueryRef" class="nav-link" href="JQuery.php">JQuery</a>
      </li>
      <li class="nav-item">
        <a id = "ForumRef" class="nav-link" href="Forum.php">Forum</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                 aria-expanded="false">More</a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">PHP</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">AJAX</a></li>
            <li><a class="dropdown-item" href="#">SQL</a></li>
        </ul>
      </li>
    </ul>
    <div class="d-flex justify-content-end">
      <form class="d-flex">
        <input id="livesreachDataList" class="form-control me-2" list="datalistOptions" placeholder="search..."
                    onkeyup="showLiveSearch(this.value);" oninput='transform(this.value)'>
        <datalist id="datalistOptions">
        </datalist>
        <button class="btn btn-primary  me-2" type="button">Search</button>
      </form>
      <?php
        session_start();
        if(isset($_SESSION["user_name"]))
          echo ("<a class='navbar-item me-2' href='#'>
                  <img src='resource/user_img.png' alt='user_img' style='width:40px;' class='rounded-pill'>
                </a>");
        else
          echo " <a href='login.php' class='btn btn-success rounded-pill'>Log in</a> "
      ?>
      
    </div>
  </div>
</nav>

