<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Regist</title>
  </head>
  <body>

    <form class="modal"  method="post">
      <h1>Regist form</h1>

      <div class="">
        <label for="name">Name</label>
        <input type="text" name="name" value="" id="name" style="position: relative; left: 23px; top: 0px;">
      </div>

      <div class="">
        <label for="login">Login</label>
        <input type="text" name="login" value="" id="login" style="position: relative; left: 23px; top: 0px;">
      </div>

      <div class="">
        <label for="email">Email</label>
        <input type="text" name="email" value="" id="email" style="position: relative; left: 23px; top: 0px;">
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



include 'conect_DB.php';
/** Values from POST*/









/**DB Query */

if($_SERVER['REQUEST_METHOD'] === 'POST'){
$name_db = $_POST['name'];
$login_db = $_POST['login'];
$pass_db = $_POST['password'];
$email_db = $_POST['email'];
date_default_timezone_set('Europe/Kiev');
$date_db = date('Y-m-d H:i:s');
$conn = mysqli_connect($host, $login, $pass, $db) or die(mysqli_error($conn));
mysqli_query($conn, 'USE NAME utf8');
$query = "INSERT INTO users VALUES (NULL, '$name_db', '$login_db', '$pass_db', '$email_db', '$date_db')";
mysqli_query($conn, $query);
//var_dump($query);
}




 
?>
