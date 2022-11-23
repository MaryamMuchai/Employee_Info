<?php
include 'config.php';
if ($_POST['user_add'] ==1) {
    $name = $_POST['name'];
	  $username = $_POST['username'];
    $email = $_POST['email'];
	  $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];
    $query = "INSERT INTO  users(name,username,email,password,password_confirmation)
    VALUES ('$name','$username','$email','$password','$password_confirmation')";
    $db->query($query);
    // echo $query;exit;
}
include 'head.php';
?>

<div class="section-ftco"><br>
  <h2 style="text-align:center;">Create Account</h2>
  <form action="registration.php" method="POST" name="mifosform" id="mifosform">
	<input type="hidden" name="user_add" id="user_add" value="1" /> 
	<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
	<div class="row">
		<div class="col-xl-9 mx-auto">
			<div class="card">
				<div class="card-body p-4">
            
					<div class="form-group row">
						<input type="text" class="form-control" id="name" name="name" placeholder="Name">
					</div>
					<div class="form-group row">
						<input type="text" class="form-control" id="email"  name="email" placeholder="email">
					</div>
					<div class="form-group row">
						<input type="text" class="form-control" id="number"  name="number" placeholder="Number">
					</div>
          <div class="form-group row">
						<input type="text" class="form-control" id="username"  name="username" placeholder="Username">
					</div>
          <div class="form-group row">
						<input type="text" class="form-control" id="password"  name="password" placeholder="Password">
					</div>
          <div class="form-group row">
						<input type="text" class="form-control" id="password_confirmation"  name="password_confirmation" placeholder="Confirm Password">
					</div>
					<hr>
					<div class="form-group row">
						<div class="d-md-flex d-grid align-items-center gap-3">
							<button type="submit" class="btn btn-primary px-4">Submit</button>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</form>
    </div>


<?php
include 'footer.php';
?>