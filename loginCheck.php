<?php
session_start();

$inputEmail = $_POST['email'];
$inputPassword = $_POST['pwd'];

include('connection.php');

$sql = "SELECT * FROM userinfo ";
$result = mysqli_query($conn,$sql);

$mail = mysqli_fetch_all($result);

foreach($mail as $project){
    if(($inputEmail == $project[3]) and ($inputPassword == $project[4])){
        
        $_SESSION['user'] = $project[1];
        $_SESSION['usertoken'] = $project[0];
        header('Location:index.php');
    }else{
         $loginFlag = "false";
    }

}

?>

