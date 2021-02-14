<?php
include_once 'user.php';
include_once 'connection.php';
$con = new DBConnector();
$pdo = $con->connectToDB;
if(isset($_POST['register']));{
     $name=$_POST['name'];
     $email=$_POST['email'];;
     $password=$_POST['pass'];
     $residence=$_POST['res'];
     $user = new User();
     $user->setName($name);
     $user->setEmail($email);
     $user->setPassword($password);
     $user->setResidence($residence);
     $user->register($pdo);
     echo '<script>location.href="homepage.php"</script>';;
}



?>