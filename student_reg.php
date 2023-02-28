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
    if(isset($_POST['Submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        if(!empty($name) && !empty($email) && !empty($contact) && !empty($password) && !empty($address) && !empty($city) && !empty($country)){
        $result = mysqli_query($mysqli, "INSERT INTO users(name,email,contact,password,address,city,country) VALUE
        ('$name','$email','$contact','$password','$address','$city','$country')");
        }
        if(isset($result)){
            $msg =  "The record has been inserted successfully!<br>";
        }
    }
    ?>
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
        <br>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">User</a></li>
                                <li class="breadcrumb-item active">Student Register</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-10">
                            <!-- SELECT2 EXAMPLE -->
                            <div class="card card-default">
                                <div class="card-header">
                                    <div class="card-tools">
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <form method="post" action="<?php 
                                    echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                    <div class="card-body">
                                        <h2 class="text-center">Student Registration</h2>
                                        <?php if(isset($msg)) { ?>
                                        <div class="alert alert-success" role="alert">
                                            <?php echo $msg; ?>
                                        </div>
                                        <?php } ?>
                                        <div class="form-group">
                                            <label for="">Name *</label>
                                            <input type="text" class="form-control" placeholder="Name" name="name">
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
                                        <div class="row g-3">
                                            <div class="col">
                                                <div class="alert alert-success" id="notificationaclass123456"
                                                    role="alert" style="display: none;">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <input type="email" class="form-control" placeholder="Email"
                                                        name="email">
                                                </div>
                                                <span class="error text-danger">
                                                    <p id="email"></p>
                                                </span>
                                                <span class="error text-danger">
                                                    <p id="alphabet"></p>
                                                </span>
                                            </div>
                                            <?php
                                                studentEmail();
                                            ?>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="">Contact</label>
                                                    <input type="number" class="form-control" placeholder="Contact"
                                                        name="contact">

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
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" class="form-control" placeholder="Password"
                                                name="password">
                                            <?php
                                                    studentPasword();
                                                ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Address</label>
                                            <input type="text" class="form-control" placeholder="Address"
                                                name="address">

                                            <span class="error text-danger">
                                                <p id="address"></p>
                                            </span>

                                            <?php
                                                studentAddress();
                                             ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="">City</label>
                                            <input type="city" class="form-control" placeholder="City" name="city">

                                            <span class="error text-danger">
                                                <p id="city"></p>
                                            </span>
                                            <span class="error text-danger">
                                                <p id="alphabet1"></p>
                                            </span>
                                        </div>

                                        <?php
                                            studentCity();
                                        ?>

                                        <div class="form-group">
                                            <label for="">Country</label>
                                            <input type="text" class="form-control" placeholder="Country"
                                                name="country">

                                            <span class="error text-danger">
                                                <p id="country"></p>
                                            </span>
                                            <span class="error text-danger">
                                                <p id="alphabet2"></p>
                                            </span>

                                        </div>
                                        <?php
                                            studentCountry();
                                        ?>
                                        <input type="submit" name="Submit" class="btn btn-success">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <!--end of col-sm-6 -->
    <div class="col-sm-3"></div>
    </div>
    <!--end of row -->




    <?php include('layouts/footer.php') ?>


    <?php include('external_css/bottom_link.php') ?>
</body>

</html>