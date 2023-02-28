<?php
      include("conn.php");
      include 'session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include('external_css/top_link.php') ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
</head>



<?php
    error_reporting(0);
	$cur_date = date('Y-m-d');
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	}

    $email = $_SESSION['email'];
    $result = mysqli_query($mysqli, "SELECT * FROM `users` WHERE email = '$email'");
    $res1 = mysqli_fetch_array($result);
    ?>

<body>
    <?php
            // include 'home_auth.php';
        ?>
    <div class="wrapper">
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <?php include('layouts/sidebare.php') ?>
            <!-- /.sidebar -->
        </aside>

        <?php include('layouts/navbar.php') ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6 d-flex">
                            <!-- <a href="class_assign_to_student.php" type="submit" class="btn btn-primary">Add Class
                                Student</a> -->
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Attendence</a></li>
                                <li class="breadcrumb-item active">Students Attendence</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-12 col-sm-12">
                            <div class="card card-primary card-outline card-outline-tabs">
                                <div class="card-header p-0 border-bottom-0">
                                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">

                                        <li class="nav-item">
                                            <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                                                href="#custom-tabs-four-home" role="tab"
                                                aria-controls="custom-tabs-four-home" aria-selected="true">Class One</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                                href="#custom-tabs-four-profile" role="tab"
                                                aria-controls="custom-tabs-four-profile" aria-selected="false">Class
                                                Two</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-four-tabContent">
                                        <div class="tab-pane fade show active" id="custom-tabs-four-home"
                                            role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                            <div class="col-12">
                                                <div class="card">
                                                    <form method="post">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Students Attendence</h3>
                                                        </div>
                                                        <h4 style="text-align: center;" class="m-0 py-3">
                                                            <strong>Date</strong>:
                                                            <?php echo $cur_date;?>
                                                        </h4>
                                                        <!-- /.card-header -->
                                                        <div class="card-body">
                                                            <table id="example2"
                                                                class="table table-bordered table-hover text-center">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">Roll Number</th>
                                                                        <th scope="col">Class Name</th>
                                                                        <th scope="col">Student Name</th>
                                                                        <th scope="col">Present</th>
                                                                        <th scope="col">Absent</th>
                                                                    </tr>
                                                                </thead>

                                                                <?php
                                                                    if(isset($_POST['submit'])) {
                                                                        $roll = $_POST['id'];
                                                                        $classid = $_POST['c_id'];
                                                                        $studentname = $_POST['id'];
                                                                        $attend = $_POST['atten'];
                                                                        $user_id = $_POST['currentUser'];
                                                                            foreach($attend as $key => $val){ 
                                                                                $result = mysqli_query($mysqli, "INSERT INTO `tbl_attendence`(`role`, `attend`, `stu_id` ,`class_id` ,`teacher_id`) VALUES
                                                                                ('$key','$val','$key', '$classid', '$user_id')");
                                                                            }   
                                                    
                                                                        }
                                                                ?>
                                                                <tbody>
                                                                    <?php
                                                                        $res = mysqli_query($mysqli, "SELECT DISTINCT class_students.c_id, users.name, classes.name, users.id
                                                                        FROM class_students INNER JOIN users ON class_students.s_id = users.id
                                                                        INNER JOIN classes ON classes.id = class_students.c_id WHERE classes.name = 'One'");
                                                                        while ($row = mysqli_fetch_array($res)) {
                                                                            // print_r($row);
                                                                        ?>
                                                                    <tr>
                                                                        <td><input type="text" name="id" hidden
                                                                                value="<?php echo $row['id'];?>"><?php echo $row['id'];?>
                                                                        </td>
                                                                        <td><input type="text" name="c_id" hidden
                                                                                value="<?php echo $row['c_id'];?>"><?php echo $row[2];?>
                                                                        </td>

                                                                        <td><input type="text" name="id" hidden
                                                                                value="<?php echo $row['id'];?>"><?php echo $row[1]; ?>
                                                                        </td>
                                                                        <input type="hidden" name="currentUser"
                                                                            value="<?php echo $res1['id']; ?>">
                                                                        <td>
                                                                            <input type="radio"
                                                                                name="atten[<?php echo $row['id'];?>]"
                                                                                value="Present">
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio"
                                                                                name="atten[<?php echo $row['id'];?>]"
                                                                                value="absent">
                                                                        </td>
                                                                    </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                            <br>
                                                            <button name="submit"
                                                                class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </form>
                                                    <!-- /.card-body -->
                                                </div>
                                                <!-- /.card -->
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                                            aria-labelledby="custom-tabs-four-profile-tab">
                                            <div class="col-12">
                                                <div class="card">
                                                    <form method="post">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Students Attendence</h3>
                                                        </div>
                                                        <h4 style="text-align: center;" class="m-0 py-3">
                                                            <strong>Date</strong>:
                                                            <?php echo $cur_date;?>
                                                        </h4>
                                                        <!-- /.card-header -->
                                                        <div class="card-body">
                                                            <table id="example2"
                                                                class="table table-bordered table-hover text-center">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">Roll Number</th>
                                                                        <th scope="col">Class Name</th>
                                                                        <th scope="col">Student Name</th>
                                                                        <th scope="col">Present</th>
                                                                        <th scope="col">Absent</th>
                                                                    </tr>
                                                                </thead>
                                                                <?php
                                                                if(isset($_POST['Submit'])) {
                                                                $roll = $_POST['id'];
                                                                $classid = $_POST['c_id'];
                                                                $studentname = $_POST['id'];
                                                                $attend = $_POST['atten'];
                                                                $user_id = $_POST['currentUser'];
                                                            
                                                                    foreach($attend as $key => $val){ 
                                                                        $result = mysqli_query($mysqli, "INSERT INTO `tbl_attendence`(`role`, `attend`, `stu_id` ,`class_id`,`teacher_id`) VALUES
                                                                        ('$key','$val','$key', '$classid','$user_id')");

                                                                    }   
                                                                }
                                                                ?>
                                                                <tbody>
                                                                    <?php
                                                                        $res = mysqli_query($mysqli, "SELECT DISTINCT class_students.c_id, users.name, classes.name, users.id
                                                                        FROM class_students INNER JOIN users ON class_students.s_id = users.id
                                                                        INNER JOIN classes ON classes.id = class_students.c_id WHERE classes.name = 'Two'");
                                                                        while ($row = mysqli_fetch_array($res)) {
                                                                            // print_r($att);
                                                                        ?>
                                                                    <tr>
                                                                        <td><input type="text" name="id" hidden
                                                                                value="<?php echo $row['id'];?>"><?php echo $row['id'];?>
                                                                        </td>
                                                                        <td><input type="text" name="c_id" hidden
                                                                                value="<?php echo $row['c_id'];?>"><?php echo $row[2];?>
                                                                        </td>

                                                                        <td><input type="text" name="id" hidden
                                                                                value="<?php echo $row['id'];?>"><?php echo $row[1]; ?>
                                                                        </td>
                                                                        <input type="hidden" name="currentUser"
                                                                            value="<?php echo $res1['id']; ?>">
                                                                        <td>
                                                                            <input type="radio"
                                                                                name="atten[<?php echo $row['id'];?>]"
                                                                                value="Present">
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio"
                                                                                name="atten[<?php echo $row['id'];?>]"
                                                                                value="absent">
                                                                        </td>
                                                                    </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                            <br>
                                                            <button name="Submit"
                                                                class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </form>
                                                    <!-- /.card-body -->
                                                </div>
                                                <!-- /.card -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include('layouts/footer.php') ?>

    </div>
    <?php include('external_css/bottom_link.php') ?>
</body>
<!-- <script>
    var getValue= $("input[name=atten]").val();
    alert(getValue);
</script> -->

<script>
$(document).ready(function() {
    $('#my-checkbox').click(function() {
        var checkbox = $.find(':checked');

        console.log(checkbox.length > 0);
    });
});
</script>

</html>