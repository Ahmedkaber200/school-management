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
                                <li class="breadcrumb-item active">Teacher Attendence</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="card card-primary card-outline card-tabs">
                            <div class="card-header p-0 pt-1 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill"
                                            href="#custom-tabs-three-home" role="tab"
                                            aria-controls="custom-tabs-three-home" aria-selected="true">Class Name</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill"
                                            href="#custom-tabs-three-profile" role="tab"
                                            aria-controls="custom-tabs-three-profile" aria-selected="false">Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill"
                                            href="#custom-tabs-three-messages" role="tab"
                                            aria-controls="custom-tabs-three-messages"
                                            aria-selected="false">Messages</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill"
                                            href="#custom-tabs-three-settings" role="tab"
                                            aria-controls="custom-tabs-three-settings"
                                            aria-selected="false">Settings</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-three-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel"
                                        aria-labelledby="custom-tabs-three-home-tab">
                                        <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover text-center">
                                        <thead>

                                            <tr>
                                                <!-- <th scope="col">Number #</th> -->
                                                <th scope="col">Class Name</th>
                                                <th scope="col">Multiple Student Name</th>
                                                <th scope="col">Multiple Course Name</th>
                                            </tr>

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
                                                        $class = mysqli_query($mysqli, "SELECT DISTINCT class_students.c_id, users.name FROM class_students
                                                                INNER JOIN users ON class_students.s_id = users.id WHERE c_id = " .$showclasses['id']);
                                                        while($show = mysqli_fetch_array($class)) {
                                                    ?>
                                                    <?php echo $show['name']
                                                    ?>
                                                    <?php } ?>
                                                </td>

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

                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel"
                                        aria-labelledby="custom-tabs-three-profile-tab">
                                        Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris
                                        pharetra
                                        purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit
                                        amet,
                                        consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci
                                        luctus et
                                        ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum,
                                        nisl
                                        ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus,
                                        elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque
                                        diam.
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel"
                                        aria-labelledby="custom-tabs-three-messages-tab">
                                        Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris.
                                        Phasellus
                                        volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget
                                        condimentum.
                                        Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras
                                        nec
                                        augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc.
                                        Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non
                                        luctus
                                        efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed
                                        ipsum.
                                        Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id
                                        fermentum
                                        metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare
                                        magna.
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel"
                                        aria-labelledby="custom-tabs-three-settings-tab">
                                        Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis
                                        tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque
                                        tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum
                                        consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec
                                        pharetra.
                                        Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et
                                        felis ut
                                        nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet
                                        accumsan ex sit amet facilisis.
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->

        <?php include('layouts/footer.php') ?>

    </div>
    <?php include('external_css/bottom_link.php') ?>
</body>

</html>