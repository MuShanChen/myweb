<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link href="css/login.css" rel="stylesheet">

  <script>
    let agreeok=0,emailok=0,usernameok=0,passwordok=0;
    function agreecheck(){
      if ($("#agreement").is(":checked")) {
        $("#agreement").addClass("is-valid");
        $("#agreement").removeClass("is-invalid");
        agreeok=1;
      }else{
        $("#agreement").addClass("is-invalid");
        $("#agreement").removeClass("is-valid");
        agreeok=0;
      }
    }
    function emailcheck() {
      let reg1 = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
      let email = $("#email").val();
      console.log(email);
      if (reg1.test(email) && email.length<=50){
        email_in_database(email);
      }else{
        $('#email_error').text("Invalid email format.");
        $("#email").addClass("is-invalid");
        $("#email").removeClass("is-valid");
        emailok=0;
      }
    }
    function email_in_database(str) {
      if (str.length==0) {return;}
      let xmlhttp=new XMLHttpRequest();
      xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
          let res=this.responseText;
          if(res=="There have not been a same data in database."){
            $("#email").addClass("is-valid");
            $("#email").removeClass("is-invalid");
            emailok=1;
          }else{
            $('#email_error').text("The email is already signed up!");
            $("#email").addClass("is-invalid");
            $("#email").removeClass("is-valid");
            emailok=0;
          }
        }
      }
      xmlhttp.open("GET","includes/check_same.php?m=email&q="+str,true);
      xmlhttp.send();
    }
    function passwordcheck() {
      let reg1 = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,16}$/;
      let password = $("#password").val();
      if (reg1.test(password)){
        $("#password").addClass("is-valid");
        $("#password").removeClass("is-invalid");
        passwordok=1;
      }else{
        $("#password").addClass("is-invalid");
        $("#password").removeClass("is-valid");
        passwordok=0;
      }
    }
    function username_in_database(str) {
      if (str.length==0) {return;}
      let xmlhttp=new XMLHttpRequest();
      xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
          let res=this.responseText;
          if(res=="There have not been a same data in database."){
            $("#username").addClass("is-valid");
            $("#username").removeClass("is-invalid");
            emailok=1;
          }else{
            $('#username_error').text("This username is already in use!");
            $("#username").addClass("is-invalid");
            $("#username").removeClass("is-valid");
            emailok=0;
          }
        }
      }
      xmlhttp.open("GET","includes/check_same.php?m=username&q="+str,true);
      xmlhttp.send();
    }
    function usernamecheck() {
      let reg1 = /^([A-Za-z0-9_\-\.]{1,20})$/;
      let username = $("#username").val();
      console.log(username);
      if (reg1.test(username) && username.length<=50){
        username_in_database(username);
      }else{
        $("#username").addClass("is-invalid");
        $("#username").removeClass("is-valid");
        emailok=0;
      }
    }
    function signup(){
      if(agreeok&&emailok&&usernameok&&passwordok) 
        return true;
      return false;
    }

  </script>
</head>
<body>

<?php
if (isset($_POST["signup"])) {
    session_start(); 
    require_once("includes/mycontacts_open.inc.php");
    $email = $_POST["email"];
    $password = $_POST["password"];
    $user_name = $_POST["username"];
    $sql="INSERT INTO user_data (email, `password`, `user_name`, permission)
          VALUES ('$email','$password', '$user_name', 1)";
    if(mysqli_query($link, $sql)){
      echo "<script> alert('註冊成功!') </script>";
      echo "<script>window.location = 'index.php';</script>";
    }else{
      echo "<script> alert('註冊失敗! 錯誤代碼:". mysqli_error($link) . "')</script>";
    }
    require_once("includes/mycontacts_close.inc.php");
}
?>

<div class="container-fluid d-flex justify-content-center">
    <a href="index.php"><img src="resource/w3sch.png" alt="Logo"></a>
</div>
<div class="col-sm-4  mt-1 rounded-3 p-3 border border-second mx-auto" >
  <h3>Sigh up</h3>
  <form action="signUp.php" method="POST" onsubmit="signup()">
    <div class="mb-3 mt-3 email">
      <label for="email" class="form-label">Email:</label>
      <span>Already have an account? 
        <a href="login.php"> Log in</a>
      </span>
      <input onkeyup="emailcheck();" type="text" class="form-control is-invalid"  id="email" placeholder="Enter email" name="email" required>
      <div class="valid-feedback">Valid.</div>
      <div id="email_error" class="invalid-feedback">Invalid email format.</div>
    </div>
    <div class="mb-3">
      <label for="username" class="form-label">User name:</label>
      <input onkeyup="usernamecheck()" type="username" class="form-control is-invalid" id="username" placeholder="Enter username" name="username" required>
      <div class="valid-feedback">Valid.</div>
      <div id="username_error" class="invalid-feedback">Username must be less than 20 characters and only contain numbers or letters</div>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password:</label>
      <input onkeyup="passwordcheck()" type="password" class="form-control is-invalid" id="password" placeholder="Enter password" name="password" required>
      <div class="valid-feedback">Valid.</div>
      <div id="password_error" class="invalid-feedback">Password must be 8~16 characters and contain both numbers and letters.</div>
    </div>
    <div class="form-check mb-3">
        <input onchange="agreecheck();" class="form-check-input is-invalid"  
                  type="checkbox" id="agreement" name="agreement" required>
        <label class="form-check-label" for="myCheck">I agree to
        <a href="https://www.w3schools.com/about/about_copyright.asp" target="_blank" rel="noopener noreferrer">Terms of Service</a>
            and 
        <a href="https://www.w3schools.com/about/about_copyright.asp" target="_blank" rel="noopener noreferrer">Privacy Policy</a>.
        </label>
    </div>
    <div class="container-fluid d-flex justify-content-center">
      <button id="signup" name="signup" type="submit" class="rounded-pill col-sm-5 btn btn-success">Sign up</button>
    </div>
  </form>
</div>
</body>
</html>
