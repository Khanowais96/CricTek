<?php


include "db.php";

if(isset($_POST['submit']))
{
	$name= htmlspecialchars($_POST['user']);   
	$mobilenumber= htmlspecialchars($_POST['mobile']);
    $email=htmlspecialchars($_POST['email']);
    $pass=htmlspecialchars($_POST['pass']);
	$address=htmlspecialchars($_POST['address']);
	$cnic=htmlspecialchars($_POST['cnic']);
    
    //Query to check if record already exist
    $q1="Select * from ct_user where user_email='$email'";
    $run=mysqli_query($conn,$q1);
    $check= mysqli_num_rows($run);
    if($check>0){

        echo "<script>alert('Email Already registered')</script>";
    }
        
    else{
        	//Query to insert data in users table
	$query="INSERT INTO `ct_user`( `user_name`, `user_email`,`user_password`, `user_contact`, `user_address`, `user_cnic`) VALUES ('$name','$email','$pass','$mobilenumber','$address','$cnic')";
	$r= mysqli_query($conn,$query);
	 if($r){
        echo "<script>alert('Record added successfully')</script>";
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
    }
	


	
		
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<style>
    /* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance:textfield;
}
</style>
</head>

<body>
<div class="container">
<form style="padding:10px; " action="#" method="post" onsubmit="return Validate()" class="bg-light">

        <div class="form-group">
            <label for="user" class="font-weight-bold">Name</label>
            <input type="text" name="user" class="form-control" id="user" autocomplete="on"
                placeholder="Enter the name">
            <span id="username_error" class="text-danger font-weight-bold"> </span>
        </div>

        <div class="form-group">
            <label class="font-weight-bold"> Mobile Number: </label>
            <input type="text" name="mobile" class="form-control" id="mobileNumber" autocomplete="on"
                placeholder="Mobile number">
            <span id="mobileno_error" class="text-danger font-weight-bold"> </span>
        </div>

        <div class="form-group">
            <label class="font-weight-bold"> Email: </label>
            <input type="text" name="email" class="form-control" id="emails" placeholder="Email">
            <span id="emailids_error" class="text-danger font-weight-bold"> </span>
        </div>

        <div class="form-group">
            <label class="font-weight-bold"> Password: </label>
            <input type="text" name="pass" class="form-control" id="Pass" placeholder="Password">
            <span id="pass_error" class="text-danger font-weight-bold"> </span>
        </div>

        <div class="form-group">
            <label class="font-weight-bold"> Address </label>
            <input type="text" name="address" class="form-control" id="add" placeholder="Address">
            <span id="address_error" class="text-danger font-weight-bold"> </span>
        </div>
        <div class="form-group">
            <label class="font-weight-bold"> Cnic number </label>
            <input type="number" name="cnic" class="form-control" id="cnic" autocomplete="off" placeholder="Cnic">
            <span id="cnic_error" class="text-danger font-weight-bold"> </span>
        </div>


        <input type="submit" name="submit" value="submit" class="btn btn-success " >

        <a href="login.php">Login</a>


    </form></div>
    

    <script type="text/javascript">
		

	
			
        function Validate() {
       var user = document.getElementById('user');
       var mobileNumber = document.getElementById('mobileNumber');
       var emails = document.getElementById('emails');
       var user_pass = document.getElementById('Pass');
       var add=document.getElementById('add');
       var cnic = document.getElementById('cnic');
    

       var username_error = document.getElementById('username_error');
       var mobileno_error = document.getElementById('mobileno_error');
       var emailids_error = document.getElementById('emailids_error');
       var pass_error=document.getElementById('pass_error');
       var address_error = document.getElementById('address_error');
       var cnic_error = document.getElementById('cnic_error');

           user.addEventListener('blur', usernameVerify, true);
           mobileNumber.addEventListener('blur', mobileNumberVerify, true);
           emails.addEventListener('blur', emailsVerify, true);
           user_pass.addEventListener('blur', passVerify, true);
           add.addEventListener('blur', addVerify, true);
           cnic.addEventListener('blur', cnicVerify, true);



   // validate username
   if (user.value == "") {
       user.style.border = "1px solid red";
       username_error.textContent = "Username is required";
       user.focus();
       return false;
   }
   // validate username
   if (user.value.length < 3) {
       username.style.border = "1px solid red";
       username_error.textContent = "Username must be at least 3 characters";
       user.focus();
       return false;
   }

      if (mobileNumber.value == "") {
       mobileNumber.style.border = "1px solid red";
       mobileno_error.textContent = "Mobile Number is required";
       user.focus();
       return false;
   }



   // validate email
   if (emails.value == "") {
       emails.style.border = "1px solid red";
       emailids_error.textContent = "Email is required";
       emails.focus();
       return false;
   }

   if(user_pass.value == ""){
       user_pass.style.border="1px solid red";
       pass_error.textContent="Password is required";
       user_pass.focus();
       return false;
   }


   // validate address
   if (add.value == "") {
       add.style.border = "1px solid red";
       address_error.textContent = "Address is required";
       add.focus();
       return false;
   }
   // validate cnic
 if (cnic.value == "") {
       cnic.style.border = "1px solid red";
       cnic_error.textContent = "Cnic is required";
       cnic.focus();
       return false;
   }
}

 function usernameVerify() {
   if (user.value != "") {
       user.style.border = "1px solid #5e6e66";
       username_error.innerHTML = "";
       return true;
   }
}

function mobileNumberVerify(){
   if (mobileNumber.value != "") {
       mobileNumber.style.border = "1px solid #5e6e66";
       mobileno_error.innerHTML = "";
      
       return true;
   }

}

function emailsVerify() {
   if (emails.value != "") {
       emails.style.border = "1px solid #5e6e66";
       emailids_error.innerHTML = "";
       return true;
   }
}


function passVerify() {
    if(user_pass.value != ""){
        // user_pass.style.border = "1px solid #5e6e66";
        pass_error.innerHTML = "";
        return true;
    }
}


   function addVerify() {
   if (add.value != "") {
       add.style.border = "1px solid #5e6e66";
       address_error.innerHTML = "";
       return true;
   }
}

function cnicVerify(){
   if (cnic.value!="") {
       cnic.style.border="1px solid #5e6e66";
       cnic_error.innerHTML="";
       return true;
   }
}



       
</script>
</body>

</html>