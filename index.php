<?php
error_reporting(E_ERROR | E_PARSE);
include 'config.php';
include 'head.php';

if(isset($_GET['clear']) && $_GET['clear'] == 1) {
    unset($_SESSION['filter']);
    unset($_SESSION['search']);
}
if((isset($_SESSION['filter']) && $_SESSION['filter'] == 1) || (isset($_POST['filter']) && $_POST['filter'] == 1))
{
    if($_POST['filter'] == 1) {
        $_SESSION['filter'] = $_POST['filter'];
        $_SESSION['search'] = $_POST['search'];
    }
}
if((isset($_SESSION['filter']) && $_SESSION['filter'] == 1)) {
    if((isset($_SESSION['search']) && $_SESSION['search'] != '')) {
        $search_terms = explode(' ',$_SESSION['search']);
        $where_name = "(";
        foreach($search_terms as $search_term){
            $where_name .= "`c`.`name` LIKE '%".$search_term."%' AND ";
        }
        $where_name = substr($where_name,0,-4);
        $where_name .= ")";
        $where .= " AND (`c`.`id` LIKE '%".['search']."%' OR 
		`c`.`emp_name` LIKE '%".['search']."%' OR 
		`c`.`emp_dept` LIKE '%".['search']."%' OR 
		".$where_name." OR 
		`c`.`emp_salary` LIKE '%".['search']."%' OR 
		`c`.`doj` LIKE '%".['search']."%' OR 
		`c`.`emp_address` LIKE '%".['search']."%')";
    }

    }

    
?>

<section class="content">
<div class="panel panel-default">
        <div class="panel-heading">
          Search Form
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <form action="index.php" method="POST" name="searchform" id="searchform" class="form-inline"><input type="hidden" name="filter" value="1">
                            <div class="form-group"><input name="search" id="search" type="text"  class="form-control input-sm" placeholder="Input search term" value="<?php if((isset($_SESSION['search']) && $_SESSION['search'] != '')) { echo $_SESSION['search']; } ?>" ></div>
                           
                            <br /><br /><input type="submit" class="btn" value="Search" />&nbsp;&nbsp;&nbsp;<?php if(isset($_SESSION['filter']) && $_SESSION['filter'] == 1) { ?><a class="btn btn-link" href="index.php?clear=1">Clear Search</a><?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Default box -->
<div class="box">
        <div class="box-header with-border">
        <h3 class="box-title" style="text-align:center;">List Employees</h3>
        <p><a href="add.php"><h3><span class="btn btn-success" style="float:right;"><i class="fa fa-plus fa-lg"></i>Add</span></h3></a></p>
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