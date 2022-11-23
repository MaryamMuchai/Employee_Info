<?php
include 'config.php';
include 'head.php';

$username = $_POST['username'];
$password =  $_POST['password'];
if(isset($_POST) && $_POST['login'] == 1) {
$query = "SELECT * FROM `users`  WHERE `username` = '".$username."' AND `password` = '".$password."' ";
echo $query;exit;
$result = $db->query($query); 
$numrows = mysqli_num_rows($result); 

}

?>
<div class="section-ftco">
<div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h2 class="text-center text-dark mt-5">Login Form</h2>
        <div class="card my-5" style="background-color:#D3D3D3 ;">
            <form action="login.php" method="POST" class="card-body cardbody-color p-lg-5">
              <div class="text-center mb-5 text-dark"><b>Enter Login Credentials</b></div>
            <div class="mb-3">
              <input type="text" class="form-control" id="username" placeholder="User Name" required>
            </div>
            <div class="mb-3">
              <input type="password" class="form-control" id="password" placeholder="password" required>
            </div>
            <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-5 w-100">Login</button></div>
            <div id="emailHelp" class="form-text text-center mb-5 text-dark">New Here ?<a href="#" class="text-dark fw-bold"> 
            Sign Up</a>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>
<?php
include 'footer.php';
?>





