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

<div class="container">
    <?php 
	if (isset($insertattend)) {
		echo $insertattend;
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
    <div class="card">
        <div class="card-header">
            <h2>
                <a class="btn btn-success" href="add.php">Add Student</a>
                <a class="btn btn-info float-right" href="index2.php">Take Addendance</a>
            </h2>
        </div>


        <div class="card-body">
            <form action="" method="post">
                <table class="table table-striped">
                    <tr>
                        <th width="30%">S/L</th>
                        <th width="50%">Attendance Date</th>
                        <th width="20%">Action</th>
                    </tr>
                        <?php 
							$getdate = $stu->getDateList();
							if ($getdate) {
								$i = 0;
								while ($value = $getdate->fetch_assoc()) {
									$i++;
						?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $value['att_time']; ?></td>
                        <td>
                            <a class="btn btn-primary"
                                href="student1_view.php?dt=<?php echo $value['att_time']; ?>">View</a>
                        </td>
                    </tr>
                    <?php } } ?>
                </table>
            </form>
        </div>
    </div>
</div>
