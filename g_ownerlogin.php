<?php 
session_start();



 ?>



<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <title>Ground Owner</title>
</head>
<style>
    .card{

    
        margin-top: -20px;


 }   

    body{    background: url(images/bur.jpg);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    padding-top: 200px;
    padding-bottom: 140px;}

</style>

<body>

<div class="container ">
    <div class="row">
        <div class="col-4">
            <div class="card">
                
                <div class="card-header bg-primary ">

                    <h3 style="color: white">Owner Sign In</h3>
                </div>
                
                <div class="card-body">
                    <form role="form" method="post" action="g_ownerlogin.php">
                      
                            <div class="form-group"  >
                                <input class="form-control" placeholder="Name" name="email" type="email" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="pass" type="password" value="">
                            </div>

                            <!-- <div class="form-group">
                                <a href="register.php" >Register Now</a>
                            </div> -->


                            <input class="btn btn-lg btn-success btn-block " type="submit" value="login" name="login" >


                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>






</body>


</html>

<?php

include "db.php";


if(isset($_POST['login']))
{
    $email=htmlspecialchars($_POST['email']);
    $pass=htmlspecialchars($_POST['pass']);

    $check_user="SELECT * FROM `ct_user` INNER JOIN ct_ground_owner ON ct_user.user_id=ct_ground_owner.user_id WHERE user_email='$email' and user_password='$pass' and ct_user.user_id=ct_ground_owner.user_id";

    $run=mysqli_query($conn,$check_user);
    $row=mysqli_fetch_array($run);
    $ground_owner_id=$row[7];
    if(mysqli_num_rows($run))
    {
         echo "<script>window.open('owner_dashboard.php','_self')</script>";

        $_SESSION['owner_id']=$ground_owner_id;
        $_SESSION['owner_name']=$row[1];
    }
    else
    {
        echo "<script>alert('Email or password is incorrect!')</script>";
    }
}
?>