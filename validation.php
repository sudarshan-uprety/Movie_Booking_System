<?php 
include('connection.php');



$errors = array('email' => '', 'password' => '','firstName'=>'','lastName'=>'');

if (empty($_POST)){
    include 'signup.php';
    return;
}
if(isset($_POST)){
 $empty = empty($_POST['first_name']) ||  empty($_POST['last_name']) || empty($_POST['email']) || empty($_POST['pwd']);
 if($empty)
 {
    
   include ('signup.php');
    return;
 }

  $firstnameSign =$_POST['first_name'];
       
if(!preg_match ('/^([a-zA-Z\s]+)$/', $firstnameSign)){
  
         include 'signup.php';
         return;
    }

  $lastnameSign = $_POST['last_name'];
       
if(!preg_match ('/^([a-zA-Z\s]+)$/', $lastnameSign)){
   
         include 'signup.php';
         return;
    }




  $emailSign = $_POST['email'];

  $sql="SELECT * FROM userinfo WHERE email='$emailSign' limit 1";
  $result=$conn->query($sql);
  if ($result->num_rows > 0)
   {

    include 'signup.php';
    print("Email already exist");
    return;
   }




  if (!filter_var($emailSign, FILTER_VALIDATE_EMAIL)){
    include 'signup.php';
    return;

  }
  $passwordSign =$_POST['pwd'];

  if (strlen($passwordSign) < 7) {
   
    include 'signup.php';
    return;
}




      



  $sql = "INSERT INTO userinfo(firstName,lastName,email,password,credits)
  VALUES('$firstnameSign','$lastnameSign','$emailSign','$passwordSign','10000')";

$result = $conn->query($sql);

  if ($result) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();

    
    header('Location:login.php');
}
  

?>