<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $servername = "localhost";
$username = 'root';
$password = '';
$database = 'myshop';
//create connection
$connection = new mysqli($servername, $username, $password, $database);

$sql = "DELETE FROM clinets WHERE id=$id";
$connection->query($sql);

}
header("location: /vica/index.php");
exit;
?>