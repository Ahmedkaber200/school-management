<?php
    include("function.php");
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
</head>

<body>
    <?php
            include 'admin_dashboard_auth.php';
            ob_start();
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
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <!-- <h1 class="m-0">Add Class</h1> -->
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">User</a></li>
                                <li class="breadcrumb-item active">Add Teacher</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <?php
                if(isset($_POST['Submit'])) {	
                $name          = $_POST['name'];
                $address       = $_POST['address'];  
                $contact       = $_POST['contact'];  
                $qualification = $_POST['qualification'];
                // $alphabet      = $_POST['alphabet'];

                if(!empty($name) && !empty($address) && !empty($contact) && !empty($qualification)){  
                $result = mysqli_query($mysqli, "INSERT INTO teacher(name, address, contact, qualification) VALUE
                ('$name', '$address', '$contact', '$qualification')");
                // header("Location: teacher_view.php");

                if(isset($result)){
                    $msg =  "The record has been inserted successfully!<br>";
                }
            }
                }
            ?>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-10">
                            <!-- SELECT2 EXAMPLE -->
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">Add Teacher</h3>
                                </div>
                                <!-- /.card-header -->
                                <form method="post">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?php  if(isset($msg)) { ?>
                                                <div class="alert alert-success" role="alert">
                                                    <?php echo $msg; ?>
                                                </div>
                                                <?php } ?>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Name</label>
                                                    <input type="text" name="name" class="form-control"
                                                        id="alphabetname" placeholder="Enter Name">

                                                    <span class="error text-danger">
                                                        <p id="name"></p>
                                                    </span>
                                                    <span class="error text-danger">
                                                        <p id="alphabet"></p>
                                                    </span>
                                                </div>
                                                <?php
                                                    studentName();
                                                ?>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Address</label>
                                                    <input type="text" name="address" class="form-control"
                                                        id="exampleInputEmail1" placeholder="Enter Address">

                                                    <span class="error text-danger">
                                                        <p id="address"></p>
                                                    </span>
                                                </div>
                                                <?php
                                                    studentAddress();
                                                ?>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Contact</label>
                                                    <input type="number" name="contact" class="form-control"
                                                        id="exampleInputEmail1" placeholder="Enter Contact">

                                                    <span class="error text-danger">
                                                        <p id="contact"></p>
                                                    </span>
                                                    <span class="error text-danger">
                                                        <p id="alphabet"></p>
                                                    </span>
                                                </div>
                                                <?php
                                                    studentContact();
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Qualification</label>
                                                    <input type="text" name="qualification" class="form-control"
                                                        id="alphabetqualification" autocomplete="off"
                                                        placeholder="Enter Qualification">

                                                    <span class="error text-danger">
                                                        <p id="qualification"></p>
                                                    </span>
                                                    <span class="error text-danger">
                                                        <p id="alphabets"></p>
                                                    </span>
                                                </div>
                                                <?php
                                                    teacherQualification();
                                                ?>
                                            </div>
                                        </div>
                                        <div class="">
                                            <button type="submit" name="Submit" class="btn btn-primary">Submit</button>
                                            <a href="teacher_view.php">
                                                <input type="button" value="Cancel" class="btn btn-danger" />
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <?php include('layouts/footer.php') ?>

    </div>
    <?php include('external_css/bottom_link.php') ?>
</body>

<script>
$(function() {
    $('#alphabetname').keydown(function(e) {
        if (e.shiftKey || e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var key = e.keyCode;
            if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 &&
                    key <= 90))) {
                e.preventDefault();
            }
        }
    });
});

$(function() {
    $('#alphabetqualification').keydown(function(e) {
        if (e.shiftKey || e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var key = e.keyCode;
            if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 &&
                    key <= 90))) {
                e.preventDefault();
            }
        }
    });
});
</script>

</html>