<?php 
	include("conn.php");
	include 'session.php';
	include "classes/Student.php";
	$stu = new Student();
?>
<?php include('external_css/top_link.php') ?>
<?php include('layouts/navbar.php') ?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <?php include('layouts/sidebare.php') ?>
</aside>
<?php 
	// error_reporting(0);
	$dt = $_GET['dt'];
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		 $attend = $_POST['attend'];
		 $attattend = $stu->updateAttendance($dt, $attend);
	}
?>
<div class="container">
    <?php 
	if (isset($attattend)) {
		echo $attattend;
	}
?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1 class="m-0">Add Class</h1> -->
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Class Assign To Student</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div> 
    <div class='alert alert-danger' style="display: none;"><strong>Error !</strong> Student Roll Missing !</div>
    <div class="card">
        <div class="card-header">
            <h2>
                <a class="btn btn-success" href="add.php">Add Student</a>
                <a class="btn btn-info float-right" href="date_view.php">Back</a>
            </h2>
        </div>

        <div class="card-body">
            <div class="card bg-light text-center mb-3">
                <h4 class="m-0 py-3"><strong>Date</strong>: <?php echo $dt; ?></h4>
            </div>
            <form action="" method="post">
                <table class="table table-striped">
                    <tr>
                        <th width="25%">S/L</th>
                        <th width="25%">Student Name</th>
                        <th width="25%">Student Roll</th>
                        <th width="25%">Attendance</th>
                    </tr>
                    <?php 
					$getstudent = $stu->getAllData($dt);
					if ($getstudent) {
						$i = 0;
						while ($value = $getstudent->fetch_assoc()) {
							$i++;
				?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $value['name']; ?></td>
                        <td><?php echo $value['roll']; ?></td>
                        <td>
                            <input type="radio" name="attend[<?php echo $value['roll']; ?>]" value="present"
                                <?php if($value['attend'] == "present") {echo "checked";} ?>>P
                            <input type="radio" name="attend[<?php echo $value['roll']; ?>]" value="absent"
                                <?php if($value['attend'] == "absent") {echo "checked";} ?>>A
                        </td>
                    </tr>
                    <?php } } ?>

                    <tr>
                        <td colspan="4" class="text-center">
                            <input type="submit" name="submit" class="btn btn-primary px-5" value="Update">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>