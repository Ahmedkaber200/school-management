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
if(isset($_POST['Submit'])) {
    	
    @$fea = $_POST['feature']; 
    foreach($fea ?? [] as $fa)
{
    $result = mysqli_query($mysqli, "INSERT INTO `feacture`(`fea`) VALUES
    ('$fa')");
}
}
?>

<body>
        <?php
            include 'home_auth.php';
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
                        <div class="col-12">
                            <div class="card">
                                <form method="post">
                                    <div class="card-header">
                                        <h3 class="card-title">Students Attendence</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example2" class="table table-bordered table-hover text-center">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Student Name</th>
                                                    <th scope="col">Attendence</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $res = mysqli_query($mysqli, "SELECT DISTINCT class_students.c_id, users.name, classes.name, users.id
                                                FROM class_students INNER JOIN users ON class_students.s_id = users.id
                                                INNER JOIN classes ON classes.id = class_students.c_id WHERE classes.name = 'One'");
                                                while ($row = mysqli_fetch_array($res)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $row[1]; ?></td>
                                                    <td>
                                                </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <br>
                                        <button name="Submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
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

<script>
$(document).ready(function() {
    $('#my-checkbox').click(function() {
        var checkbox = $.find(':checked');

        console.log(checkbox.length > 0);
    });
});
</script>

</html>