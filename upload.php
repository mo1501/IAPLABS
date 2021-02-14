<?php
error_reporting(0);
require_once("connection.php");
?>
<?php
$msg = "";

// if upload button is clicked
if (isset($_POST['upload'])){
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "photos/".$filename;
    
    $db = mysqli_connect("localhost","root","","App","photos");

    //Get all the submitted data from the form
    $sql = "INSERT INTO photos (filename) VALUES ('$filename')";
    //execute the query
    mysqli_query($db,$sql);
    //Now let's move the uploaded image into the folder
    if(move_uploaded_file($tempname,$folder)){
        $msg="Image uploaded successfully";
    }else {
        $msg="Failed to upload image";
    }
}
$result = mysqli_query($db,"SELECT * FROM photos");
?>