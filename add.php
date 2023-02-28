<?php 
	include("conn.php");
	include 'session.php';
	include "classes/Student.php"; 
	$stu = new Student();
?>
<?php include('external_css/top_link.php') ?>
<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$name = $_POST['name'];
		$roll = $_POST['roll'];
		$insertdata = $stu->insertStudent($name, $roll);
	}
?>
<?php include('layouts/navbar.php') ?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <?php include('layouts/sidebare.php') ?>
</aside>

<div class="container">
    <?php
	if (isset($insertdata)) {
		echo $insertdata;
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
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>
                            <a class="btn btn-success" href="add.php">Add Student</a>
                            <a class="btn btn-info float-right" href="index2.php">Back</a>
                        </h2>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="name">Student Name</label>
                                <input type="text" class="form-control" name="name" id="name" required="">
                            </div>

                            <div class="form-group">
                                <label for="roll">Student Roll</label>
                                <input type="text" class="form-control" name="roll" id="roll" required="">
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" name="submit" class="btn btn-primary px-5" id="roll" value="Add">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>