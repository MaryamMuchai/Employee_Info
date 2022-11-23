<?php
error_reporting(E_ERROR | E_PARSE);
include 'config.php';
include 'head.php';
?>

<section class="content">
<!-- Default box -->
<div class="box">
        <div class="box-header with-border">
        <h3 class="box-title" style="text-align:center;">List Employees</h3>
        <p><a href="add.php"><h3><span class="btn btn-success" style="float:right;"><i class="fa fa-plus fa-lg"></i> Add </span></h3></a></p>
        </div>

<div class="box-body">
<table class="table table-striped">
        <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Employee Name</th>
        <th scope="col">Department</th>
        <th scope="col">Salary</th>
        <th scope="col">Date of Joining</th>
        <th scope="col">Address</th>
        <th style="width:150px">Actions</th>
        </tr>
        </thead>

    <tbody>
<?php
$query = "SELECT * FROM employee WHERE id > 0 AND deleted  = 0 ORDER BY id ASC";
$result = $db->query($query);
while($row = $result->fetch_assoc()){
    echo '<tr>';
    echo '<th scope="row">'.$row['id'].'</th>';
    echo '<td scope="row">'.$row['emp_name'].'</td>';
    echo '<td scope="row">'.$row['emp_dept'].'</td>';
    echo '<td scope="row">'.$row['emp_salary'].'</td>';
    echo '<td scope="row">'.$row['doj'].'</td>';
    echo '<td scope="row">'.$row['emp_address'].'</td>';
    echo '<td>';
    echo '<a title="Edit" href="add.php?id='.$row['id'].'"><i class="fa fa-pencil fa-2x text-info"></i></a>'; 
    if($row['active'] == 1){ echo '<a title="Deactivate" href="act.php?id='.$row['id'].'&active=0"><i class="fa fa-check bx-check fa-2x text-success"></i></a>'; } else { echo '<a title="Activate" href="act.php?id='.$row['id'].'&active=1"><i class="fa fa-times fa-2x text-danger"></i></a>'; }
    echo '<a title="Delete" href="del.php?id='.$row['id'].'" onclick="return confirm(\'Delete '.$row['name'].' \')"><i class="fa fa-trash fa-2x text-danger"></i></a>';
    echo '</td>';
    echo '</tr>'; 
} ?>
    </tbody>
</table>
</div>
</div>
</section>









<?php
include 'footer.php';
?>