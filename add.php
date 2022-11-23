<?php
error_reporting(E_ERROR | E_PARSE);
include 'config.php';
include 'head.php';

if(isset($_GET['id']) && (int)$_GET['id'] > 0){ $q="SELECT * FROM employee WHERE id=".$_GET['id']; $r = $db->query($q); $data=$r->fetch_assoc(); $id=$_GET['id']; } else { $id=0; }

if((isset($_POST) && $_POST['add'] == 1)) {
    $emp_name = $_POST['emp_name'];
    $emp_dept = $_POST['emp_dept'];
    $emp_salary = $_POST['emp_salary'];
    $doj = $_POST['doj'];
    $emp_address = $_POST['emp_address'];

    if((int)$_POST['id'] !=0) { $query = "UPDATE ";}
    else { $query = "INSERT INTO "; }
    $query .= "employee SET `emp_name` = '$emp_name', `emp_dept` = '$emp_dept', `emp_salary` = '$emp_salary', `doj` = '$doj', `emp_address` = '$emp_address'";
    if((int)$_POST['id'] != 0) {
        $query .= "WHERE `id` = '".$_POST['id']."'";
    // echo $query;exit;
    }
    if($db->query($query)){ $msg = "Successfully Created"; } else { $msg = "Error creating record"; }
    $_SESSION['msg'] = $msg;
    $link = 'index.php';
    header( 'Location: '.$link ); exit;
}
?>
<form action="add.php" method="POST" name="form" id="form">
    <input type="hidden" name="add" id="add" value="1" />
    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
    <div class="row">
		<div class="col-xl-9 mx-auto"><br>
            <h2 style="text-align:center;">Add/Edit Employee Information</h2><br>
			<div class="card">
				<div class="card-body p-4">
                        <div class="col-md-12">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="emp_name" name="emp_name" value="<?php if(isset($data['emp_name']) && $data['emp_name']){ echo $data['emp_name']; } ?>">
                        </div>
                        <div class="col-md-12">
                            <label for="name" class="form-label">Department</label>
                            <input type="text" class="form-control" id="emp_dept" name="emp_dept" value="<?php if(isset($data['emp_dept']) && $data['emp_dept']){ echo $data['emp_dept']; } ?>">
                        </div>
                        <div class="col-md-12">
                            <label for="name" class="form-label">Salary</label>
                            <input type="text" class="form-control" id="emp_salary" name="emp_salary" value="<?php if(isset($data['emp_salary']) && $data['emp_salary']){ echo $data['emp_salary']; } ?>">
                        </div>
                        <div class="col-md-12">
                            <label for="name" class="form-label">Date of Joining</label>
                            <input type="date" class="form-control" id="doj" name="doj" value="<?php if(isset($data['doj']) && $data['doj']){ echo $data['doj']; } ?>">
                        </div>
                        <div class="col-md-12">
                            <label for="name" class="form-label">Address</label>
                            <input type="text" class="form-control" id="emp_address" name="emp_address" value="<?php if(isset($data['emp_address']) && $data['emp_address']){ echo $data['emp_address']; } ?>">
                        </div>
                        <br>
                    <div class="panel-footer clearfix">
                    <div class="pull-right">
                        <button class="btn btn-lg btn-danger" type="submit">
                            <span>SAVE DETAILS</span>
                        </button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<?php
include 'footer.php';
?>