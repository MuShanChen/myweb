<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="css/login.css" rel="stylesheet">
</head>
<body>

<?php
if (isset($_POST["login"])) {
    session_start(); 
    require_once("includes/mycontacts_open.inc.php");
    $email = $_POST["email"];
    $password = $_POST["password"];
    //防範SQL注入
    $email = addslashes($email);
    $email = str_replace("_","/_",$email);
    $email = str_replace("%","/%",$email);
    $password = addslashes($password);
    $password = str_replace("_","/_",$password);
    $password = str_replace("%","/%",$password);
    $sql="SELECT * From user_data where email = '$email' AND `password` = '$password'";
    $result = mysqli_query($link, $sql);
    //$total_fields=mysqli_num_fields($result); // 取得欄位數
    $total_records=mysqli_num_rows($result);  // 取得記錄數
    $row = mysqli_fetch_assoc($result);
    mysqli_free_result($result);  // 釋放佔用的記憶體
    require_once("includes/mycontacts_close.inc.php");
    if($total_records == 1){
        $_SESSION["email"]=$email;
        $_SESSION["password"]=$password;
        $_SESSION["permission"]=$row["permission"];
        $_SESSION["user_id"]=$row["user_id"];
        $_SESSION["user_name"]=$row["user_name"];
        echo "<script> alert('登入成功!!') </script>";
        echo "<script> window.location.href='index.php'</script>";
    }
    else{
        echo "<script> alert('帳號或密碼有誤!!') </script>";
        echo "<script> window.location.href='login.php'</script>";
    }
}
?>

<div class="container-fluid d-flex justify-content-center">
  <a href="index.php"><img src="resource/w3sch.png" alt="Logo"></a>
</div>
<div class="col-sm-4  mt-1 rounded-3 p-3 border border-second mx-auto" >
  <h3>Log in</h3>
  <form action="login.php" class="was-validated" method="POST">
    <div class="mb-3 mt-3 email">
      <label for="email" class="form-label">Email:</label>
      <span>Need an account? 
        <a href="signUp.php"> Sign up</a>
      </span>
      <input name="email" type="text" class="form-control" id="email" placeholder="Enter Email..." required>
    </div>
    <div class="mb-3">
      <label for="pwd" class="form-label">Password:</label>
      <input name="password" type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required>
    </div>
    <div class="form-check mb-3">
      <input class="form-check-input" type="checkbox" id="myCheck"  name="remember">
      <label class="form-check-label" for="myCheck"> Remember me.</label>
    </div>
    <div class="container-fluid d-flex justify-content-center">
      <button name="login" id="login" type="submit" class="rounded-pill col-sm-5 btn btn-success">Log in</button>
    </div>

  </form>
</div>
</body>
</html>
