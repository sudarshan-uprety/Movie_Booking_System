<?php

$errors = array('email' => '', 'password' => '','firstName'=>'','lastName'=>'');

?>

<!DOCTYPE html>
<html>
   
  <title>Sign Up</title>
    <body class="wel-signup">
    <?php include('header.php')  ?>
      <head>

      <meta charset="utf-8">
    
    
    
    <link href="css/1.css" rel="stylesheet">

    
    <link rel="stylesheet" href="css/fontawesome.css">
   
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/2.css">
    <link rel="stylesheet" type="text/css" href="css/main copy.css">
    <link rel="stylesheet" type="text/css" href="css/maintwo.css">
    

    
    <script type="text/javascript" src="js/1.js"></script>
    <script type="text/javascript" src="js/2.js"></script>
    <script type="text/javascript" src="js/3.js"></script>

</head>


<script type="text/javascript">


function validate() {
    var firstname = document.forms["form"]["first_name"].value;
    var nameformat = /^[a-zA-Z\s]*$/;
    if (firstname.trim() == "") {

        return false;
    } else if (!nameformat.test(firstname)) {

        return false;
    }
    

    var lastname = document.forms["form"]["last_name"].value;
    var nameformat = /^[a-zA-Z\s]*$/;
    if (firstname.trim() == "") {

        return false;
    } else if (!nameformat.test(lastname)) {

        return false;
    }
   

    
  var pass = document.forms["form"]["pwd"].value;
  if (pass.trim() == "") {

    return false;
  }

  var email = document.forms["form"]["email"].value;
  var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if (email.trim() == "") {

    return false;
  } else if (!mailformat.test(email)) {

    return false;
}
}
</script>


<script type="text/javascript">



function firstname_validate() {
    var name = document.forms["form"]["first_name"].value;
    var nameformat = /^[a-zA-Z\s]*$/;
    if (name.trim() == "") {
        document.getElementById('ferror').innerHTML = "firstname required";
        
    } else if (!nameformat.test(name)) {
        document.getElementById('ferror').innerHTML = "Name only contain alphabates";
        
    } else {
        document.getElementById('ferror').innerHTML = "";
       
    }

}


function lastname_validate() {
    var name = document.forms["form"]["last_name"].value;
    var nameformat = /^[a-zA-Z\s]*$/;
    if (name.trim() == "") {
        document.getElementById('lerror').innerHTML = "lastame required";
        
    } else if (!nameformat.test(name)) {
        document.getElementById('lerror').innerHTML = "lastname only contain alphabates";
        
    } else {
        document.getElementById('lerror').innerHTML = "";
       
    }

}

function password_validate(){
    var len = document.form.pwd.value.length;
    if(len<8){
      document.getElementById("perror").innerHTML ="Must be 8 character long";
    }
    else if(len>8){
      document.getElementById("perror").innerHTML ="";
    }
    
}

function email_validate(){
    var email = document.forms["form"]["email"].value;
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (email.trim() == "") {
        document.getElementById('eerror').innerHTML = "Email required";
       
    } else if (!mailformat.test(email)) {
        document.getElementById('eerror').innerHTML = "Email is not valid";
       
    } else {
        document.getElementById('eerror').innerHTML = "";
       
    }
}
















  


</script>

       
        <div class="container">
            <div class="row">

                

                <div class="col-md-6 login" >
                  <div style="margin-left: 10%; margin-right:10%;">
                              
                  <div class="text-center ">
                          <h2 style="text-align: center; font-size: 40px; color: white;">Sign Up</h2><hr>
                          
                          
                  </div>
                  
                    <form style="margin-top: 30px; margin-bottom:30px;" action="validation.php" method="POST" name="form" onsubmit="validate()">
                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            
                            <span id="ferror" style="color: red;"></span>
                            <input type="text" class="form-control" id="first_name" placeholder="Enter First Name" name="first_name" oninput="firstname_validate()">
                            <div class="text-danger"><?php echo $errors['firstName']; ?></div>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">

                            <span id="lerror" style="color: red;"></span>
                            <input type="text" class="form-control" id="last_name" placeholder="Enter Last Name" name="last_name" oninput="lastname_validate()">
                            <div class="text-danger"><?php echo $errors['lastName']; ?></div>
                          </div>
                        </div>
                      </div>
                        
                        
                        <div class="form-group">
                            <span id="eerror" style="color: red;"></span>
                            <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email" oninput="email_validate()">
                            <div class="text-danger"><?php echo $errors['email']; ?></div>
                        </div>

                        <div class="row">
                        <div class="col-9">
                          <div class="form-group">

                                  <span id="perror" style="color: red;"></span>  
                                  <input type="password" class="form-control" id="pwd" placeholder="Enter Password" name="pwd" oninput="password_validate()">

                        
                              <div class="text-danger"><?php echo $errors['password']; ?></div>
                          </div>  
                        </div>
                        <div class="col-3">
                          <button style="float: right;" type="submit" class="btn btn-primary" name="submit" onclick="return confirm('Every data is correct?')">Sign Up</button>
                        </div>
                      </div>
                      <p style="font-size:15px; text-align:center;">Already have an account?<a href="login.php"> Log In</a>.</p>

          
    
                    </form>
                  </div>
                  
                        

                </div>

                <div class="col-md-6">
                   

                </div>



            </div>
            
          </div>




          
      
    </body>
</html>