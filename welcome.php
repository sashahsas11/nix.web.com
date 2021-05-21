<?php 
session_start();

if(isset($_SESSION['id'])){
  $id = $_SESSION['id'];
}else{
  header('Location: index.php');
}





$name = $_SESSION['name'];

include 'conect_DB.php';

$conn = mysqli_connect($host, $login, $pass, $db) or die(mysqli_error($conn));
mysqli_query($conn, 'USE NAME utf8');

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Welcome</title>
  </head>
  <body>
    <h1>Hi <?=$name?>, your id=<?=$id?></h1>

    <form action="" method="POST">

    <div>
        <p>Text<BR>
        <textarea name="coment" cols="40" rows="10"></textarea></p>
        <p><input type="submit" value="Enter">
        <input type="reset" value="Reset"></p>
    </div>
    </form>



<?php
include 'conect_Db.php';
@$text_post = $_POST['coment'];

$conn = mysqli_connect($host, $login, $pass, $db) or die(mysqli_error($conn));

if(isset($text_post)){
    date_default_timezone_set('Europe/Kiev');
    $date_db = date('Y-m-d H:i:s');
    $sql = "INSERT INTO list VALUES (NULL, '$id', '$name', '$date_db', '$text_post')";
    mysqli_query($conn, $sql);
}

$sql1 = "SELECT * FROM list WHERE autor_id = '$id' and autor = '$name' ORDER BY date DESC";
$result = mysqli_query($conn,  $sql1);





echo '<table>';
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    
    echo "<tr><th>ID text:{$row['id']}</th><th> Autor_id {$row['autor_id']} </th><th> Autor {$row['autor']} </th></tr>";
    echo "<tr><td colspan=\"3\">{$row['text']}</td></tr>";
    echo "<tr><td>Date: {$row['date']}</td></tr>";      
    

}

echo '</table>';


?>

</body>
</html>
