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
            ob_start();
        ?>


    <div class="wrapper">
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <?php include('layouts/sidebare.php') ?>
            <!-- /.sidebar -->
        </aside>

        <!-- layout.navbr.php -->

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
                                <li class="breadcrumb-item active">Teacher Edit</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->


            <?php
                if(isset($_POST['Update']))
                {
                $id            = $_GET['id'];
                $name          = $_POST['editname'];
                $address       = $_POST['editaddress'];
                $contact       = $_POST['editcontact'];
                $qualification = $_POST['editqualification'];
                $result = mysqli_query($mysqli, "UPDATE teacher SET name='$name', address='$address', contact='$contact', qualification='$qualification'   WHERE id=$id");
                header("Location: teacher_view.php");
                }
            ?>


            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Update Teacher</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->

                        <?php
                            $id = $_GET['id'];
                            $result = mysqli_query($mysqli, "SELECT * FROM teacher WHERE id=$id");
                            while($res = mysqli_fetch_array($result))
                            {
                                $name          = $res['name'];
                                $address       = $res['address'];
                                $contact       = $res['contact'];
                                $qualification = $res['qualification'];
                            }
                        ?>

                        <form method="post">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input type="text" name="editname" value="<?php echo $name;?>"
                                                class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Address</label>
                                            <input type="text" name="editaddress" value="<?php echo $address;?>"
                                                class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter Address">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Contact</label>
                                            <input type="text" name="editcontact" value="<?php echo $contact;?>"
                                                class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter Contact">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Qualification</label>
                                            <input type="text" name="editqualification"
                                                value="<?php echo $qualification;?>" class="form-control"
                                                id="exampleInputEmail1" placeholder="Enter Qualification">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" name="Update" class="btn btn-primary">Update</button>
                                    <a href="teacher_view.php">
                                        <input type="button" value="Cancel" class="btn btn-danger" />
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>

        <?php include('layouts/footer.php') ?>

    </div>
    <?php include('external_css/bottom_link.php') ?>
</body>

</html>