<?php
session_start();
$owner_id=$_SESSION['owner_id'];
if(!isset($owner_id)){
    header('location: g_ownerlogin.php');
}
else{

    echo "Hello Mr. ".$_SESSION['owner_name'];
    echo "<br>";
    echo "<a href='logoutt.php'>Logout</a>";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
    table, th, td {
  border: 1px solid black;
}

table{
    margin: auto;
  
}
</style>
</head>
<body>
    <table>
    <tr>
    <th>Booking_id</th>
    <th>Ground_id</th>
    <th>Name</th>
    <th>Date</th>
    <th>Time</th>
    <th>Umpire</th>
    <th>Scorer</th>
    <th>Booking Half</th>
    <th>Current status</th>
    <th>Action</th>
    </tr>
<?php
include "db.php";

$q="Select * from ct_ground_has_ct_ground_owner where ground_owner_id='$owner_id'";
$run= mysqli_query($conn,$q);
$row=mysqli_fetch_array($run);
$ground_id=$row[0];


$q1="Select * from ct_user inner join ground_booking on ct_user.user_id=ground_booking.user_id
where ground_id='$ground_id'";
$run1=mysqli_query($conn,$q1);




while($row1=mysqli_fetch_array($run1)){

  $book_id=$row1[7];
  $ground_id=$row1[8];
  $name=$row1[1];
  $date=$row1[10];
  $umpire=$row1[11];
  $scorer=$row1[12];
  $half=$row1[13];
  $status=$row1[14];
  $time=$row1[15];
    
?>
    <tr>
    <td><?php echo  $book_id;  ?></td>
    <td><?php echo  $ground_id;  ?></td>
    <td><?php echo  $name;  ?></td>
    <td><?php echo  $date;  ?></td>
    <td><?php echo  $time;  ?></td>
    <td><?php echo  $umpire;  ?></td>
    <td><?php echo  $scorer;  ?></td>
    <td><?php echo  $half;  ?></td>
    <td><?php if($status==0){echo"Not approved";}else{echo"Approved";}  ?></td>
    
    <td><a href="approve.php?app=<?php echo $book_id ?>& date=<?php echo $date ?>& g_id=<?php echo $ground_id?>& half=<?php echo $half ?>" ><button style="background-color:blue; color:white">Approve</button></a></td> 

    </tr>
<?php } ?>
    </table>
</body>
</html>