<?php
include 'config.php';
error_reporting(E_ERROR | E_PARSE);

include 'head.php';

$username = $_POST['username'];
$password =  $_POST['password'];
if(isset($_POST) && $_POST['login'] == 1) {
$query = "SELECT * FROM `users`  WHERE `username` = '".$username."' AND `password` = '".$password."' ";
// echo $query;exit;
$result = $db->query($query); 
$numrows = mysqli_num_rows($result); 

$link = 'index.php';
header( 'Location: '.$link ); exit;
}
?>

<div class="section-ftco"><br>
<h5 class="heading-section" style="text-align:center";><b>Login Form</b></h5>
<form action="login.php" method="POST" class="signin-form">
<input type="hidden" name="login" id="login" value="1">   

<div class="row">
		<div class="col-xl-6 mx-auto">
      
      <div class="card">
        <div class="card-body p-4">
          <h6 style="text-align:center";>Enter your username and Password then Click 'Login'</h6><br>
        <label><b>Username</b></label>
                <div class="form-group row">
                <input type="text" class="form-control item" id="username" name="username" placeholder="Username" Required>
            </div>
            <label><b>password</b></label>
                <div class="form-group row">
                <input type="password" class="form-control item" id="password" name="password" placeholder="Password" Required>
            </div>
            <div class="form-group row">
                <button type="submit" class="btn btn-primary px-4">Login</button>
            </div>
            <div class="col">
            <h6 style="text-align:center;"><a href="registration.php" style="color:black;">New Here?</a></h6><br>
</div>
<hr>
        </form>
    </div>

<?php
include 'footer.php';
?>





