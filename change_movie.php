<html>
    <?php include('header.php'); ?>
    <title>Change Movie</title>
    <body class="wel-change">

            
            <div class="container pt-2" >
                <div class="col-6">

                    <div class="text-center ">
                        <h2 style="text-align: center; font-size: 50px; color: white;">Change Movie</h2>
                        <medium style="color: white;">Get The Best For Audience</medium>
                        
                    </div>
                    <hr>
                    <br>
                </div>
               
                <div class="col-6">
                    <div style="margin-left: 5%; margin-right:5%;">
                        <form method="POST" action="changeProcess.php" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-6">
                                <div class="form-group form-inline">
                                    <label for="screen_code"><span style="color: white; padding-right:20px;">Screen Code : </span></label>
                                    <select class="form-control " id="screen_code" name="screencode">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select>

                                </div>
                                </div>
                                <div class="col">
                                    <div class="form-group text-right">
                                    <input required type="text" class="form-control" id="movie_title" placeholder="Enter Movie Title" name="movie_title">

                                    </div>
                                </div>
                            </div>
                            

                            <div class="form-group">
                                <input required type="url" class="form-control" id="movie_trailer" placeholder="Enter Trailer Link" name="movie_trailer">
                            </div>

                            <label class="text-white">Change Movie Date(ending)  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Screen Status</label>

                            <div class="row">
                                
                                <div class="col-md-6 form-group">
                                    <input required type="date" class="form-control" id="change_date" placeholder="" 
                                    name="change_date">
                                </div>
                                <div class="col-md-6">
                                    <select name="status" id="status" style="    width: 100%; height: calc(1.5em + 0.75rem + 2px);padding: 0.375rem 0.75rem;font-size: 1rem;font-weight: 400;line-height: 1.5;color: #495057;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;border-radius: 0.25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;">

                                    <option value="" disabled selected>--- Screen Status ---</option>
                                    <option value="1">Enabled</option>
                                    <option value="2">Disabled</option>
                                    </select>
                                </div>
                         </div>

                            <label for="mor_movie_time" class="text-white">Choose Movie Timing:</label>

                         <div class="row">
                             <div class="col-md-4 form-group">
                                 <label for="mor_movie_time" class="text-white">Morning Time:</label>
                                   <input required type="time" class="form-control" id="mor_movie_time" placeholder="" 
                                   name="mor_movie_time">
                                </div>
                                <div class="col-md-4 form-group">
                                 <label for="noon_movie_time" class="text-white">Noon Time:</label>

                                   <input required type="time" class="form-control" id="noon_movie_time" placeholder="" 
                                   name="noon_movie_time">
                                </div>
                                <div class="col-md-4 form-group">
                                 <label for="eve_movie_time" class="text-white">Evening Time:</label>
                                   <input required type="time" class="form-control" id="eve_movie_time" placeholder="" 
                                   name="eve_movie_time">
                                </div>
                         </div>


                            <div class="form-group">
                                
                                <input required type="file" class="form-control" id="movie_des" placeholder="Select poster" name="movie_poster">
                            </div>
                            <div class="form-group">
                                
                                <textarea required maxlength="250" type="text" class="form-control" id="movie_des" placeholder="Enter Movie Description" name="movie_des"></textarea>
                            </div>

                            <div class="for-group">
                                <input type="submit" class="btn btn-primary" name="change_movie" value="Change">
                            </div>
                        </form>
                    </div>
                    
                </div>
                
              </div>

         <br><br><br><br><br>
         <?php include('footer.php'); ?>

    </body>
</html>   