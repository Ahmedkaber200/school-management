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
                            <a href="class_course_add.php" type="submit" class="btn btn-primary">Add Class Course</a>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                <li class="breadcrumb-item active">Class Course View</li>
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
                                    <h3 class="card-title">Class Course View</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover text-center">

                                        <tr>
                                            <!-- <th scope="col">Number #</th> -->
                                            <th scope="col">Class Name</th>
                                            <th scope="col">Multiple Course Name</th>
                                            <th scope="col">Operation</th>
                                        </tr>

                                        <thead>
                                            <?php 
                                                $classes = mysqli_query($mysqli, "SELECT * FROM `classes`");
                                                while($showclasses = mysqli_fetch_array($classes)){
                                            ?>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $showclasses['name']; ?></td>
                                                <td>
                                                    <?php 
                                                        $class = mysqli_query($mysqli, "SELECT DISTINCT class_courses_pivot.cours_id, courses.name FROM
                                                        class_courses_pivot INNER JOIN courses ON class_courses_pivot.cours_id = courses.id WHERE class_id = " .$showclasses['id']);
                                                        while($show = mysqli_fetch_array($class)) {
                                                    ?>
                                                    <?php echo $show['name'];
                                                    ?>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <a href="#"
                                                        class="listing-buttons-spacing btn btn-outline-success btn-xs"
                                                        title="Edit">
                                                        <i class="fa fa-fw fa-edit"></i>
                                                    </a>
                                                    <a href="#"
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