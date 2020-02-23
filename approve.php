<?php
include("db.php");
$book_id=$_GET['app'];
$date=$_GET['date'];
$g_id=$_GET['g_id'];
$half=$_GET['half'];


$q2="Select * from ground_booking where ground_id='$g_id' and booking_date='$date' and booking_half='$half' and booking_confirmed=1";
$r1=mysqli_query($conn,$q2);
if(mysqli_num_rows($r1)>0){

    
echo "<script>alert('This slot is booked ')</script>";

echo "<script>window.open('owner_dashboard.php','_self')</script>";


}


else{
	
$query="Select booking_confirmed from ground_booking where booking_id='$book_id'";
$r=mysqli_query($conn,$query);
$row=mysqli_fetch_array($r);
$status_id= $row[0];

if($status_id==1){
    echo "<script>alert('Already approved')</script>";
    echo "<script>window.open('owner_dashboard.php','_self')</script>";
}


    else{
        $q="UPDATE `ground_booking` SET `booking_confirmed`= 1 WHERE booking_id='$book_id'";
        $run=mysqli_query($conn,$q);
        if($run)
        {
        //javascript function to open in the same window
        echo "<script>alert('Request has been approved')</script>";
        echo "<script>window.open('owner_dashboard.php','_self')</script>";

        }
    }


}














?>