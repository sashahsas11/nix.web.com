<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
             
    </head>
  <body>

    <form class="modal"  method="post">
      <h1>Login</h1>
                        
      <div class="">
        <label for="login">Login</label>
        <input type="text" name="login" value="" id="login" style="position: relative; left: 23px; top: 0px;">
      </div>

      <div class="">
        <label for="password">Password</label>
        <input type="password" name="password" value="" id="password">
      </div>

      <div class="">
        <input type="submit" name="" value="Enter">
      </div>

    </form>
  </body>
</html>

<?php
include 'conect_Db.php';




if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $login_db = $_POST['login'];
    $pass_bd = $_POST['password'];
    $conn = mysqli_connect($host, $login, $pass, $db) or die(mysqli_error($conn));
    mysqli_query($conn, 'USE NAME utf8');

    $sql = "SELECT id, name FROM users  WHERE login = '$login_db' and pass = '$pass_bd'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if(isset($row)){
      $_SESSION['id'] = $row['id'];
      $_SESSION['name'] = $row['name'];
      //$_SESSION['name'] = 
      header('Location: welcome.php');
    }
    //var_dump($row);

}

