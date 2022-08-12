<?php 

include('connection.php');

if(isset($_POST['change_movie'])){
    $screencode = $_POST['screencode'];
    $title = $_POST['movie_title'];
    $more = $_POST['movie_des'];
    $trailer = $_POST['movie_trailer'];
    $mor_movie_time = $_POST['mor_movie_time'];
    $noon_movie_time = $_POST['noon_movie_time'];
    $eve_movie_time = $_POST['eve_movie_time'];
    $change_date = $_POST['change_date'];
    $status = $_POST['status'];
    $poster="No Picture";
    if($_FILES['movie_poster']['error']==0 && $_FILES['movie_poster']['size']!=0)  
 		{
 			  $iname=$_FILES['movie_poster']['name'];
 			  move_uploaded_file($_FILES['movie_poster']['tmp_name'], 'images/'.$iname);
        $sql = "UPDATE changemovie SET  title='$title', more='$more', trailer='$trailer', mor_movie_time='$mor_movie_time',
        noon_movie_time='$noon_movie_time', eve_movie_time='$eve_movie_time', change_date='$change_date', status='$status',  
        poster='$iname' WHERE screencode=$screencode";
 		}
     else{
        $sql = "UPDATE changemovie SET  title='$title', more='$more', trailer='$trailer', mor_movie_time='$mor_movie_time',
        noon_movie_time='$noon_movie_time', eve_movie_time='$eve_movie_time', change_date='$change_date', status='$status', 
        poster='$poster' WHERE screencode=$screencode";
     }
   
    if(mysqli_query($conn, $sql)){
        $del ="DELETE FROM bookings where screencode=$screencode";
        if ($conn->query($del) === TRUE) {
            header('location:index.php');
          } else {
            echo "Error deleting record: " . $conn->error;
          }
        

    } else { 
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn); 
    }
}


?>