<?php
include_once 'user.php';    
include_once 'db.php';    
$con = new DBConnector();    
$pdo = $con->connectToDB();
if(isset($_POST['submitpasswords']))
{
    //change password
    // $email = $_POST['email'];
    $password = $_POST['password'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $user = new User();
    // $user->setEmail($email);
    $user->setPassword($password);
    $user->setPassword1($Password1);
    $user->setPassword2($Password2);
     
    echo $user->changePassword($pdo); 


}
?>