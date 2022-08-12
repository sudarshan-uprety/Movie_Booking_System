<?php include('header.php'); ?>
<?php 
include('connection.php');
 

$userid = $_SESSION['usertoken'];
$sql = "SELECT credits FROM userinfo WHERE id='$userid'";
$result = mysqli_query($conn,$sql);
$car = mysqli_fetch_array($result,MYSQLI_ASSOC);
 
$balance = $car['credits'];
 
 

if(isset($_POST['promo_submit'])){
 
    if($_POST['user_promo'] == "project"){
        $_SESSION['totalcost']-=100;
        $promo_error="";
        $promo_flag="set";
 
    }else{
        $promo_error = "Enter Valid Promocode";
        $promo_flag="unset";
    }
}
 
 
if(isset($_POST['makepayment'])){
 
   
    $userid = $_SESSION['usertoken'] ;
    $screencode = $_SESSION['screen'];
    $showcode = $_SESSION['show'];
    $data  =$_SESSION['seatname'];
        $getTitle = "SELECT title FROM changemovie WHERE screencode=$screencode";
        $getMorTime = "SELECT mor_movie_time FROM changemovie WHERE screencode=$screencode";
        $getNoonTime = "SELECT  noon_movie_time FROM changemovie WHERE screencode=$screencode";
        $getEveTime = "SELECT  eve_movie_time FROM changemovie WHERE screencode=$screencode";

        $result = mysqli_query($conn,$getTitle);
        $result1 = mysqli_query($conn,$getMorTime);
        $result2 = mysqli_query($conn,$getNoonTime);
        $result3 = mysqli_query($conn,$getEveTime);
 
        $titleResult = mysqli_fetch_array($result);

        $MorResult = mysqli_fetch_array($result1);

        $NoonResult = mysqli_fetch_array($result2);

        $EveResult = mysqli_fetch_array($result3);

 
        $movie_title = $titleResult['title'];
        $movie_mor_time = $MorResult['mor_movie_time'];
        $movie_noon_time = $NoonResult['noon_movie_time'];
        $movie_eve_time = $EveResult['eve_movie_time'];


 
 
 
        $sql = "INSERT INTO bookings (seat_id,user_id,screencode,showcode,movietitle,mor_movie_time,noon_movie_time,eve_movie_time ) VALUES ('$data','$userid','$screencode','$showcode','$movie_title','$movie_mor_time','$movie_noon_time','$movie_eve_time')";
 
        if ($conn->query($sql) === TRUE) {
            
            $last_id = $conn->insert_id;
            $_SESSION['booking_id'] = $last_id;
 
            
            $totalcost = $_SESSION['totalcost'];
            $balance-=$totalcost;
 
            $up = "UPDATE userinfo SET credits=$balance WHERE id=$userid";
            if(mysqli_query($conn, $up)){ 
 
            } else { 
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn); 
            } 
 
 
 
 
            header('Location:confirmation.php?$last_id');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
 
        $conn->close();
}
 
if(isset($_POST['submit'])){
    $promo_error="";
    $promo_flag="unset";
    if(empty($_POST['seats'])){
        
 
        header('location:select_seat.php?error_seat=select atleast one seat');
    }else{
 
        $totalseats = $_POST['seats'];
        $totalcost=0;
        $numberofseats=0;
 
 
        foreach($totalseats as $seat){
            $totalcost+=200;
            $numberofseats+=1;
        }
 
        $_SESSION['totalcost'] = $totalcost;
        $_SESSION['noseats'] = $numberofseats;
        $bookedSeats = $_POST['seats'];
        $data = array();
 
        foreach($bookedSeats as $seat)
 
           
            $data[] = addslashes($seat);
 
        $data = implode("," , $data);
        $_SESSION['seatname'] = $data;
    }
 
}
 
?>
 
 
 
<!DOCTYPE html>
<html lang="en">
 
    <title>Payment</title>
    <link rel="stylesheet" type="text/css" href="css/payment.css">
    <body class="wel-pay">
        <div class="container" style="margin-bottom: 70px;">
            <div class="row">
                <div class="col-6"></div>
                <div class="col-5">
                    <div class="card">
                        <div class="card-inner">
                        <div class="card-title">
                            <h4>Make Payment To Book Your Tickets</h4>
                            <hr style="border:#464E59 solid 0.5px">
                            <?php 
                            $remBalance=$_SESSION['totalcost']+1000;
                            if($remBalance < $_SESSION['totalcost']){
                                echo "<h6 style='color:red;'>Your credits are lower than total cost of tickets!</h6>";
                            }
 
                            ?>
                        </div>
                        <div class="card-body">
                            <table>
                                <tr>
                                    <td><b>Cost / Ticket :</b> RS 200</td>
                                </tr>
                                <tr>
                                    <td><b>Total Seats :</b> <?php echo $_SESSION['noseats']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Total Cost  : </b>RS <?php echo $_SESSION['totalcost']; ?></td>
                                </tr>
                                <tr>
 
                                </tr>
                                <br>
 
                            </table>
 
 
                        </div>
                        <hr style="border:#464E59 solid 0.5px">
 
                        <div class="row">
                            <div class="col-8">
 
                            
                            </div>
                            <div class="col-4">
 
                                <form action="payment.php" method="POST">
                                <?php 
                                    if($remBalance >= $_SESSION['totalcost']){
                                        echo "<input class='btn btn-success' style='float: right;' type='submit' name='makepayment' value='Pay' >";
                                    }else{
                                        echo '<a href="select_seat.php" class="btn btn-danger" style="float:right;">Go Back</button></a>';
                                    }
 
                                ?> 
                                </form>
 
                            </div>
                        </div>
 
 
 
 
                        </div>
 
                    </div>
 
                    
 
                    <?php 
 
                    if($promo_flag=="unset"){
                        echo '<form method="POST" action="payment.php">
                        <div class="row" style="margin-top:20px;">
                            <div class="col-9">
                                <div class="form-group">
 
 
                                </div>
                            </div>
                            <div class="col-3">
 
                                <div class="form-group" style="float: right;">
 
                                </div>
 
                            </div>
 
                        </div>
 
                    </form>';
                    }elseif($promo_flag=="set"){
                        echo "<h6 style='color:green; padding-left:30px; margin-top:10px;'>Promocode Applied Succesfully<h6>";
                    }
 
 
 
 
                    ?>
 
                    
                    <?php echo "<h6 style='color:red;'>$promo_error</h6>";;?>
                </div>
                <div class="col"></div>
            </div>
        </div>
        <br><br><br><br><br>
        <?php include('footer.php'); ?>
    </body>
</html>

