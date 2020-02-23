<?php
session_start();



$conn= mysqli_connect("localhost","root","","cricktek") or die("Not connected");

if(isset($_POST['submit']))
{
	$name=$_POST['user'];
	$mobilenumber=$_POST['mobile'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$cnic=$_POST['cnic'];
	$umpire=$_POST['u1'];
	$scorer=$_POST['s1'];
	$ground=$_POST['grounds'];
	$half=$_POST['half'];
	
	//Query to get ground id from ground table
	$q1="SELECT `ground_id` FROM `ct_ground` WHERE ground_name='$ground'";
	$r1=mysqli_query($conn,$q1);
	$row = mysqli_fetch_array($r1);
	$g_id = $row[0];
		
	
	//Query to insert data in users table
	$query="INSERT INTO `ct_user`( `user_name`, `user_email`, `user_contact`, `user_address`, `user_cnic`) VALUES ('$name','$email','$mobilenumber','$address','$cnic')";
	 mysqli_query($conn,$query);
	 //getting the last inserted id from the user table
	 $last_id = $conn->insert_id;

	 //Query to insert data in ground booking table
	 $q3 ="INSERT INTO `ground_booking`(`user_id`, `ground_id`, `booking_umpire`, `booking_scorer`, `booking_half`) VALUES ('$last_id','$g_id','$umpire','$scorer','$half')";
	  $r3=mysqli_query($conn,$q3);
		if($r3){
			echo "<script>alert('Record added successfully')</script>";
		}
		else{
			echo "Error: " . $q3 . "<br>" . mysqli_error($conn);
		}
}

?>


<!DOCTYPE html>
<html>

<head>
	<title>Ground Booking Form</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>
	<h1 class="text-white text-center font-weight-bold bg-success" style="font-size: 55px; padding: 10px;"> Ground
		Booking </h1>

	<div class="container">
		<div class="row">


			<div class="col-md-6 mx-auto">

				<form style="padding:10px; " action="#" method="post" onsubmit="return Validate()" class="bg-light">

					<div class="form-group">
						<label for="user" class="font-weight-bold">Name</label>
						<input type="text" name="user" class="form-control" id="user" autocomplete="off"
							placeholder="Enter the name">
						<span id="username_error" class="text-danger font-weight-bold"> </span>
					</div>

					<div class="form-group">
						<label class="font-weight-bold"> Mobile Number: </label>
						<input type="text" name="mobile" class="form-control" id="mobileNumber" autocomplete="off"
							placeholder="Mobile number">
						<span id="mobileno_error" class="text-danger font-weight-bold"> </span>
					</div>

					<div class="form-group">
						<label class="font-weight-bold"> Email: </label>
						<input type="text" name="email" class="form-control" id="emails" placeholder="Email">
						<span id="emailids_error" class="text-danger font-weight-bold"> </span>
					</div>

					<div class="form-group">
						<label class="font-weight-bold"> Address </label>
						<input type="text" name="address" class="form-control" id="add" placeholder="Address">
						<span id="address_error" class="text-danger font-weight-bold"> </span>
					</div>
					<div class="form-group">
						<label class="font-weight-bold"> Cnic number </label>
						<input type="number" name="cnic" class="form-control" id="cnic" autocomplete="off"
							placeholder="Cnic">
						<span id="cnic_error" class="text-danger font-weight-bold"> </span>
					</div>
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
						<div class="form-group">
							<label class="font-weight-bold"> Date </label><br>
							<input type="date" id="datemin" name="datemin" min="2020-02-15">
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



	<script type="text/javascript">




		function Validate() {
			var user = document.getElementById('user');
			var mobileNumber = document.getElementById('mobileNumber');
			var emails = document.getElementById('emails');
			var add = document.getElementById('add');
			var cnic = document.getElementById('cnic');

			var username_error = document.getElementById('username_error');
			var mobileno_error = document.getElementById('mobileno_error');
			var emailids_error = document.getElementById('emailids_error');
			var address_error = document.getElementById('address_error');
			var cnic_error = document.getElementById('cnic_error');

			user.addEventListener('blur', usernameVerify, true);
			mobileNumber.addEventListener('blur', mobileNumberVerify, true);
			emails.addEventListener('blur', emailsVerify, true);
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

			//      if (!isNAN(mobileNumber.value) ) {
			//     user.style.border = "1px solid red";
			//     mobileno_error.textContent = "Only numbers required";
			//     user.focus();
			//     return false;
			// }

			// validate email
			if (emails.value == "") {
				emails.style.border = "1px solid red";
				emailids_error.textContent = "Email is required";
				emails.focus();
				return false;
			}
			// validate address
			if (add.value == "") {
				add.style.border = "1px solid red";
				address_error.textContent = "Address is required";
				add.focus();
				return false;
			}
			// validate address
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

		function mobileNumberVerify() {
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
		function addVerify() {
			if (add.value != "") {
				add.style.border = "1px solid #5e6e66";
				address_error.innerHTML = "";
				return true;
			}
		}

		function cnicVerify() {
			if (cnic.value != "") {
				cnic.style.border = "1px solid #5e6e66";
				cnic_error.innerHTML = "";
				return true;
			}
		}




	</script>

</body>

</html>