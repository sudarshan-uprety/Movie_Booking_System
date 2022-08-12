<?php 
   
    include('connection.php');
    $screencode = $_SESSION['screen'];
    $showcode = $_SESSION['show'];
    
    
    
    $sql = "SELECT seat_id FROM bookings WHERE screencode = $screencode AND showcode = $showcode"; 
    $result = mysqli_query($conn,$sql);

    $seatid = mysqli_fetch_all($result);
    
    $bookedSeat = array();
    foreach($seatid as $id){
        
           $bookedSeat[] = $id[0];
           
        
    }
    $project='';
    for($i=0;$i<count($bookedSeat);$i++){
        $project = $project . $bookedSeat[$i] . ",";
        }

    $projectcomma = explode(",",$project);
    
        
    function checkme($seatidd,$projectcomma){
        $disabled='';
        
          foreach($projectcomma as $m){
              
            if($seatidd == $m)
            {
                $disabled = $disabled . "disabled";
            }
          }

         echo $disabled;
    }
?>

