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
</head>

<body>
    <?php
            include 'admin_dashboard_auth.php';
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
                            <a href="add_teacher.php" type="submit" class="btn btn-primary">Add Teacher</a>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                <li class="breadcrumb-item active">Teacher View</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Teacher View</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover text-center">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Contact</th>
                                                <th scope="col">Qualification</th>
                                                <th scope="col">Operation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $teacher = mysqli_query($mysqli, "SELECT * FROM `teacher`");
                                                while($showTeacher = mysqli_fetch_array($teacher)){
                                             ?>
                                            <tr>
                                                <th scope="row"><?php echo $showTeacher['id']; ?></th>
                                                <td><?php echo $showTeacher['name']; ?></td>
                                                <td><?php echo $showTeacher['address']; ?></td>
                                                <td><?php echo $showTeacher['contact']; ?></td>
                                                <td><?php echo $showTeacher['qualification']; ?></td>
                                                <td>
                                                    <a href="teacher_edit.php?id=<?php echo $showTeacher['id']; ?>"
                                                        class="listing-buttons-spacing btn btn-outline-success btn-xs"
                                                        title="Edit">
                                                        <i class="fa fa-fw fa-edit"></i>
                                                    </a>
                                                    <a href="student_delete.php?id=<?php echo $showTeacher['id']; ?>"
                                                        class="listing-buttons-spacing btn btn-outline-danger btn-xs delete-text-category-library">
                                                        <i class="fa fa-trash"></i>
                                                    </a>

                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
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

</html>