<?php
    session_start();
    
    if (!isset($_SESSION['user_id'])) {
    
        header('location: login.php');
    }
    else{
        $id= $_SESSION['user_id'];
        echo "Hello Mr. ".$_SESSION['user_name'];
        echo "<br>";
        echo "<a href='logout.php'>Logout</a>";
    }

    date_default_timezone_set("Asia/Karachi");
    $time= date("h:i:s a");
   
    
    include "db.php";

    if(isset($_POST['submit']))
    {

    $umpire=htmlspecialchars($_POST['u1']);
	$scorer=htmlspecialchars($_POST['s1']);
	$ground=htmlspecialchars($_POST['grounds']);
    $half=htmlspecialchars($_POST['half']);
    $date=htmlspecialchars($_POST['datemin']);
   

    //Query to get ground id from ground table
	$q1="SELECT `ground_id` FROM `ct_ground` WHERE ground_name='$ground'";
	$r1=mysqli_query($conn,$q1);
	$row = mysqli_fetch_array($r1);
    $g_id = $row[0];
    

    $q5= "Select * from ground_booking where booking_half ='$half' and ground_id='$g_id' and booking_date='$date' and booking_confirmed=1";
    $verify=mysqli_query($conn,$q5);
    $verifyrows=mysqli_num_rows($verify);
     if($verifyrows>0){
         echo "<script>alert('Sorry this slot is already booked')</script>";
    }

    else{
        $q4= "Select * from ground_booking where user_id= '$id' and booking_half ='$half' and ground_id='$g_id' and booking_date='$date'";
        $check=mysqli_query($conn,$q4);
        $checkrows=mysqli_num_rows($check);
    
       if($checkrows>0) {
        echo "<script>alert('You already requested that slot')</script>";
       }
      
       else{
      
    
         //Query to insert data in ground booking table
         $q3 ="INSERT INTO `ground_booking`(`user_id`, `ground_id`, `booking_umpire`, `booking_scorer`, `booking_half`,`booking_date`,booking_timing) VALUES ('$id','$g_id','$umpire','$scorer','$half','$date','$time')";
         $r3=mysqli_query($conn,$q3);
           if($r3){
               echo "<script>alert('Booking added successfully')</script>";
               echo "<script>window.open('groundspage.php','_self')</script>";
           }
           else{
               echo "Error: " . $q3 . "<br>" . mysqli_error($conn);
           }
       }
    }
 

    
	
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">


            <div class="col-md-6 mx-auto">
            <?php       $query="Select * from ct_user where user_id='$id'";
        $result=mysqli_query($conn,$query);
       
       while($roww=mysqli_fetch_array($result)){
            
           $name=$roww[1];
           $email=$roww[2];
           $number=$roww[4];
           $address=$roww[5];
           $cnic=$roww[6];


      
        ?>
                    <div class="jumbotron">
                    <center>Name: <?php echo $name ?></center> <br>
                    <center>Email: <?php echo $email ?></center> <br>
                    <center>Number: <?php echo $number ?></center> <br>
                    <center>Cnic: <?php echo $cnic ?></center> <br>
                    </div>

                    

            
       <?php } ?>


                <form style="padding:10px; " action="#" method="post" onsubmit="" class="bg-light">

                    

                    <div class="form-group">
                        <label class="font-weight-bold"> Umpire booking: </label>
                        <br>
                        <label>
                            <input name="u1" type="radio" value="1"> Yes
                        </label>
                        <br>
                        <label>
                            <input name="u1" type="radio" value="0"> No
                        </label>
                        <div class="form-group">
                            <label class="font-weight-bold"> Scorer booking: </label>
                            <br>
                            <label>
                                <input name="s1" type="radio" value="1"> Yes
                            </label>
                            <br>
                            <label>
                                <input name="s1" type="radio" value="0"> No
                            </label>




                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold"> Grounds </label>
                            <select class="form-control" id="grounds" name="grounds">
                                <option>Asifabad</option>
                                <option>Ubl</option>
                                <option>National bank</option>
                                <option>Hill park</option>
                                <option>National Stadium</option>
                                <option>Naya nazimabad</option>
                                <option>Moin khan</option>
                                <option>Kcca</option>
                                <option>RLCA</option>
                                <option>TMC</option>
                                <option>Young fighter</option>
                            </select>
                            <span id="groundss" class="text-danger font-weight-bold"> </span>
                        </div>
                        <?php
                        $month = date('m');
                        $day = date('d');
                        $year = date('Y');
                        $today = $year . '-' . $month . '-' . $day;
                        ?>
                        <div class="form-group">
                            <label class="font-weight-bold"> Date </label><br>
                            <input type="date" id="mydate" name="datemin" min="<?php echo $today; ?>" value="<?php echo $today; ?>">
                            <span id="timing" class="text-danger font-weight-bold"> </span>
                        </div><br>
                        <span>
                            <button type="button" class="btn btn-success" data-toggle="collapse"
                                data-target="#demo">Click
                                Here To See Charges</button><br>
                            <div id="demo" class="collapse">
                                <b><br>* (Mon To Fri) Half Day= 3000/- Full Day= 5000/-</b><br>
                                <hr>
                                <b>* (On Sat) 1st Half= 7500/- 2nd Half= 8500/- Full Day= 17000/-</b><br>
                                <hr>
                                <b>* (On Sun) 1st Half= 8500/- 2nd Half= 8500/- Full Day= 17000/-</b><br>
                                <hr>
                                <b>* (Public Holiday ) 1st Half= 7500/- 2nd Half= 8500/- Full Day= 17000/-</b>
                            </div>
                        </span>
                        <br>
                        <div class="form-group">
                            <label class="font-weight-bold"> Half </label>
                            <select class="form-control" id="half" name="half">
                                <option>First half</option>
                                <option>Second half</option>
                            </select>
                            <span id="halfs" class="text-danger font-weight-bold"> </span>
                        </div>
                       
                        <input type="submit" name="submit" value="submit" class="btn btn-success " autocomplete="off">

                        <br><br>


                </form>


            </div>


        </div>



    </div>

<script>
    // let today = new Date().toISOString().slice(0, 10)
    // document.getElementById("mydate").value = today;
    // document.getElementById("mydate").setAttribute("min", today);

</script>

</body>

</html>