<?php
session_start();
if(!isset($_SESSION['user_id'])){
    $a="register.php";
    
}
else{
    $a="groundregister.php";
    echo "<a href='logout.php'>Logout</a>";
    date_default_timezone_set("Asia/Karachi");
    echo date("h:i:s a"); 


    

    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grounds</title>
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
        <div class="row mx-auto">
            
                <div class="container">
                    <div class="card" style="width:500px">
                        <img class="card-img-top" src="img/img1.jpeg" alt="Card image" style="width:100%">
                        <div class="card-body">
                            <h4 class="card-title">Book Your Ground Now!!</h4>
                            <p class="card-text">Some example text some example text. John Doe is an architect and
                                engineer</p>
                            <a href="<?php echo $a; ?>" class="btn btn-primary" onclick="">Book Now</a>
                            
                        </div>
                    </div>
                </div>
            
           
        </div>






       

</body>

</html>