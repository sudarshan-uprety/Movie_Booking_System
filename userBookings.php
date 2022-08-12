
<?php include('connection.php') ?>
<?php
if(isset($_POST['delete'])){

$id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

$sql = "DELETE FROM bookings WHERE booking_id = $id_to_delete";

if(mysqli_query($conn, $sql)){
    header('Location: index.php');
} else {
    echo 'query error: '. mysqli_error($conn);
}

}
?>




<!DOCTYPE html>
<html lang="en">
<?php include('header.php');
    $userToken = $_SESSION['usertoken'];
        
    
        $sql = "SELECT credits FROM userinfo WHERE id='$userToken'";
        $result = mysqli_query($conn,$sql);
        $car = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $balance = $car['credits'];

?>




<?php 

    $sql = "SELECT user_id,booking_id,time_booking,seat_id,screencode,showcode,movietitle,mor_movie_time,noon_movie_time,eve_movie_time FROM bookings ORDER BY time_booking DESC";
    $result = mysqli_query($conn,$sql);

    $booking = mysqli_fetch_all($result);
    

?>


<title>My Bookings</title>
<body class="wel-mybooking">
    
    <div class="container">
        <div class="row">
            <div class="col-5">

            </div>
            <div class="col-7">
                

                <div class="container">
                    <?php foreach($booking as $bok)
                    
                    $movietitle = $bok[6];
                    if(!isset($bok)){
                            $bok = 'Variable name is not set';
                            echo "<p style='color:red;'>" . "NO Bookings YET!, Please Book a Movie.." . "</p>";
                            }
                    $mor_movie_time = $bok[7];
                    $noon_movie_time =$bok[8];
                    $eve_movie_time =$bok[9];
                    
                    
                    { ?>
                    <?php if($bok[0]==$userToken){ ?>

                    <div class="row" style="margin-top: 20px;">
            
            
                     <div class="col"></div>
                    <div class="col-10">
                        <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                   
                        <div class="card-body" style="background-color:#F2F2F2;">
                        
                        <p class="card-text text-success">


                            <?php 

                            foreach ($booking as $bok)
                                {      
                            
                                ?>
                            <h6><b>Movie Title : </b> <?php echo htmlspecialchars($bok[6]); ?></h6>
                            <h6><b>User ID : </b> <?php echo htmlspecialchars($bok[0]); ?></h6>
                            <div><b>Booking ID : </b><?php echo htmlspecialchars($bok[1]); ?></div>
                            <div><b>Screen No : </b><?php echo htmlspecialchars($bok[4]); ?></div>
                            <div><b>Show Time: </b><?php 
                                
                                if($bok[5]==1){
                                   echo $mor_movie_time.' '.'AM'.' '.'(Morning Show)';

                                }elseif($bok[5]==2){
                                    echo $noon_movie_time.' '.'PM'.' '.'(Afternoon Show)';
                                }else{
                                    echo $eve_movie_time.' '.'PM'.' '.'(Evening/Night Show)';
                                }
                            ?></div>
                            <div><b>Seat No: </b><?php echo htmlspecialchars($bok[3]); ?></div>
                                
                            <div><b>Time : </b>  <?php echo htmlspecialchars($bok[2]); ?></div>  
                            </p>

                        <div class="text-right">
                        <form action="userBookings.php" method="POST">
                            <input type="hidden" name="id_to_delete" value="<?php echo $bok[1]; ?>">
                            <input type="submit" name="delete" value="Cancel" class="btn btn-outline-danger btn-sm">
                        </form>
                    
                        </div>
                   
                       <hr style="border-top: 1px dashed red;" />
<?php
    }
?>
                    </div>
                </div>
            </div>
            
        </div>
       <?php } ?>
        
        <?php } ?>
    </div>
            </div>
        </div>
    </div>

</body>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include('footer.php') ?>
</html>