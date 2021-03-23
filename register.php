<?php
include_once 'user.php';
include_once 'connection.php';
$con = new DBConnector();
$pdo = $con->connectToDB;
if(isset($_POST['register'])){
     $name=$_POST['name'];
     $email=$_POST['email'];
     $pass=$_POST['pass'];
     $residence=$_POST['res'];
     $user = new User();
     $user->setName($name);
     $user->setEmail($email);
     $user->setPassword($pass);
     $user->setResidence($residence);
     $user->register($pdo);
     echo '<script>location.href="homepage.php"</script>';
}
else{
     echo "error";
}


?>