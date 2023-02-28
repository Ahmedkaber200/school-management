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
                                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                <li class="breadcrumb-item active">Add Class</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <!-- <div id="app"> -->
                <div class="container-fluid">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-10">
                            <!-- SELECT2 EXAMPLE -->
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">Add Class</h3>
                                </div>
                                <!-- /.card-header -->
                                <form action="add_class.php" method="post">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="alert alert-success" id="notificationaclass"
                                                        role="alert" style="display: none;">
                                                    </div>
                                                    <label for="message">Name</label>
                                                    <input type="text" name="addclass" id="message" class="form-control"
                                                        placeholder="Enter Class name">
                                                    <span class="error text-danger">
                                                        <p id="name"></p>
                                                    </span>
                                                    <span class="error text-danger">
                                                        <p id="alphabet"></p>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <?php
                                                addClass();
                                            ?>
                                            <button type="submit" name="Submit" class="btn btn-primary">Submit</button>
                                            <a href="class_view.php">
                                                <input type="button" value="Cancel" class="btn btn-danger" />
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
        </div>
        </section>
        <?php include('layouts/footer.php') ?>
    </div>

    <?php include('external_css/bottom_link.php') ?>
</body>

<!-- <script>
function myFunction() {
  document.getElementById("myForm").submit();
}
</script> -->

</html>