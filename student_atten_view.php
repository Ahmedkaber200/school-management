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
                                <li class="breadcrumb-item active">Students Attendence View</li>
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
                                        <!-- <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill"
                                                href="#custom-tabs-four-messages" role="tab"
                                                aria-controls="custom-tabs-four-messages"
                                                aria-selected="false">Messages</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill"
                                                href="#custom-tabs-four-settings" role="tab"
                                                aria-controls="custom-tabs-four-settings"
                                                aria-selected="false">Settings</a>
                                        </li> -->
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-four-tabContent">
                                        <div class="tab-pane fade show active" id="custom-tabs-four-home"
                                            role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                            <form method="post">
                                                <div class="card-header">
                                                    <h3 class="card-title">Students Attendence View</h3>
                                                </div>
                                                <h4 style="text-align: center;" class="m-0 py-3"><strong>Date</strong>:
                                                    <?php echo $cur_date;?></h4>
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
                                                        <tbody>
                                                            <?php
                                                                $res = mysqli_query($mysqli, "SELECT DISTINCT ur.id, ur.name, cl.name, tbl.attend FROM tbl_attendence tbl INNER JOIN classes
                                                                    cl ON tbl.class_id = cl.id INNER JOIN users ur ON ur.id = tbl.stu_id WHERE cl.name = 'One';");
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
                                                                <td>
                                                                    <span
                                                                        class="<?php echo $row['attend'] == "Present" ? 'badge badge-success' : ''; ?>">Present</span>
                                                                </td>
                                                                <td>
                                                                    <span
                                                                        class="<?php echo $row['attend'] == "absent" ? 'badge badge-danger' : ''; ?>">Absent</span>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                    <br>
                                                    <!-- <button name="Submit" class="btn btn-primary">Submit</button> -->
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                                            aria-labelledby="custom-tabs-four-profile-tab">
                                            <div class="tab-pane fade show active" id="custom-tabs-four-home"
                                            role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                            <form method="post">
                                                <div class="card-header">
                                                    <h3 class="card-title">Students Attendence View</h3>
                                                </div>
                                                <h4 style="text-align: center;" class="m-0 py-3"><strong>Date</strong>:
                                                    <?php echo $cur_date;?></h4>
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
                                                        <tbody>
                                                            <?php
                                                                $res = mysqli_query($mysqli, "SELECT DISTINCT ur.id, ur.name, cl.name, tbl.attend FROM tbl_attendence tbl INNER JOIN classes
                                                                    cl ON tbl.class_id = cl.id INNER JOIN users ur ON ur.id = tbl.stu_id WHERE cl.name = 'Two';");
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
                                                                <td>
                                                                    <span
                                                                        class="<?php echo $row['attend'] == "Present" ? 'badge badge-success' : ''; ?>">Present</span>
                                                                </td>
                                                                <td>
                                                                    <span
                                                                        class="<?php echo $row['attend'] == "absent" ? 'badge badge-danger' : ''; ?>">Absent</span>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                    <br>
                                                    <!-- <button name="Submit" class="btn btn-primary">Submit</button> -->
                                                </div>
                                            </form>
                                        </div>
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel"
                                            aria-labelledby="custom-tabs-four-messages-tab">
                                            Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris.
                                            Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu
                                            massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla.
                                            Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit
                                            condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis
                                            velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum
                                            odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla
                                            lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id
                                            fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt
                                            eleifend ac ornare magna.
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel"
                                            aria-labelledby="custom-tabs-four-settings-tab">
                                            Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna,
                                            iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit
                                            dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie
                                            tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec
                                            interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget
                                            aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo
                                            dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan
                                            ex sit amet facilisis.
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card -->
                            </div>
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
<!-- <script>
    $(document).ready(function () {
    if($('#boo1').checked)
{
     $('#boo2').css('color','#39E600');
}
});
</script> -->


</html>