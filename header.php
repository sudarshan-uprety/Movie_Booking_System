<?php 
@session_start();

?>
<?php 

$welcomeName='';
if(isset($_SESSION['user']))
    {   
       
       $welcomeName = $_SESSION['user'];
    }
?>


<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    
    <link rel="icon" href="images/icons/1logo.svg" type="image/icon type">
    
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


<nav class="navbar navbar-expand-sm navbar-dark fixed-top"  style="background-color: #023E73;">
  <a class="navbar-brand text-center mr-auto" style="font-family: 'Jost', sans-serif;" href="#"><img width = "40" height="40" src="images/icons/1logo.svg" alt="logo">OurCinemas</a>
  
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">Home</a>
    </li>
    
    <li class="nav-item">
      <?php 
        if(isset($_SESSION['user'])){
          
          echo '<a class="nav-link" href="userBookings.php">My Bookings</a>';
        }
      ?>
     
    </li>
    <li class="nav-item">
      <a href="aboutus.php" class="nav-link">About Us</a>
    </li>
    
      <?php 
        
        if(isset($_SESSION['admin'])){
          
          echo '<a class="nav-link" href="change_movie.php">Change Movie</a>';
        }
      ?>
    
    
    <li class="nav-item">
      <?php 
        if(isset($_SESSION['user']) || isset($_SESSION['admin'])){
        

          echo '<a class="nav-link" href="logout.php">Log Out</a>';
        
        }else{
          
          echo '<a class="nav-link" href="login.php">Log In</a>';
        }
      
      ?>
      
    </li>
    
        
    <li class="nav-item">

      <?php 
          if(!isset($_SESSION['user']) && !isset($_SESSION['admin'])){
            echo '<a class="nav-link" href="signup.php">Sign Up</a>';
          }
        
      ?>
        
    </li>

  
  </ul>
  
  
</nav>


<div class="container-fluid" style="margin-top:60px">
</div>







<body>

</body>
</html>