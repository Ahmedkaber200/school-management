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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
                                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                <li class="breadcrumb-item active">Class Edit</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <?php
                if(isset($_POST['Update']))
                {
                    $id = $_GET['id'];
                    $name = $_POST['addclass'];
                    if(!empty($name)){ 
                    $result = mysqli_query($mysqli, "UPDATE classes SET name='$name' WHERE id=$id");
                    if(isset($result)){
                        $msg = "The record has been Updated successfully!<br>";
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
                                    <h3 class="card-title">Update Class</h3>
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
                                    $result = mysqli_query($mysqli, "SELECT * FROM classes WHERE id=$id");
                                    while($res = mysqli_fetch_array($result))
                                    {
                                        $name = $res['name'];
                                    }
                                ?>
                                <form method="post">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?php if(isset($msg)) { ?>
                                                <div class="alert alert-success" role="alert">
                                                    <?php echo $msg; ?>
                                                </div>
                                                <?php } ?>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Name</label>
                                                    <input type="text" name="addclass" id="textsend" onkeyup="success()"
                                                        value="<?php echo $name;?>" class="form-control alphabetname"
                                                        placeholder="Enter Class name">
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit" name="Update" class="btn btn-primary"
                                                id="button">Update</button>
                                            <a href="class_view.php">
                                                <input type="button" value="Cancel" class="btn btn-danger" />
                                            </a>
                                        </div>
                                        <script>
                                        function success() {
                                            if (document.getElementById("textsend").value === "") {
                                                document.getElementById('button').disabled = true;
                                            } else {
                                                document.getElementById('button').disabled = false;
                                            }
                                        }
                                        </script>

                                        <script>
                                        jQuery(function() {
                                            $('.alphabetname').keydown(function(e) {
                                                if (e.shiftKey || e.ctrlKey || e.altKey) {
                                                    e.preventDefault();
                                                } else {
                                                    var key = e.keyCode;
                                                    if (!((key == 8) || (key == 32) || (key == 46) || (
                                                            key >= 35 && key <= 40) || (key >= 65 &&
                                                            key <= 90))) {
                                                        e.preventDefault();
                                                    }
                                                }
                                            });
                                        });
                                        </script>
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

</html>