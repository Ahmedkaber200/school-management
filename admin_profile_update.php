<?php
    include 'function.php';
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
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
</head>

<body>
    <?php
           $email    = $_SESSION['email'];
           $result   = mysqli_query($mysqli, "SELECT * FROM `users` WHERE email = '$email'");
           if($res   = mysqli_fetch_array($result)){
                $id   = $res['id'];
                 $name = $res['name'];
                 $email = $res['email'];
                 $contact = $res['contact'];
                 $address = $res['address'];
                 $city = $res['city'];
                 $country = $res['country'];
                 $role = $res['role'];
                }
              ?>
    <div class="wrapper">
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <?php include('layouts/sidebare.php') ?>
            <!-- /.sidebar -->
        </aside>

        <?php include('layouts/navbar.php') ?>

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
                                <li class="breadcrumb-item active">Admin Profile Update</li>
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
                                    <h3 class="card-title">Admin Profile Update</h3>
                                </div>

                                <?php
                                    if(isset($_POST['Update'])){
                                        $name    = $_POST['name'];
                                        $email   = $_POST['email'];
                                        $contact = $_POST['contact'];
                                        $address = $_POST['address'];
                                        $city    = $_POST['city'];
                                        $country = $_POST['country'];
                                        $role    = $_POST['role'];
                                        if(!empty($name) && !empty($email) && !empty($contact) && !empty($address && !empty($city) && !empty($country) && !empty($role))){ 
                                        $result  = mysqli_query($mysqli, "UPDATE users SET name='$name', email='$email', contact='$contact', address='$address', city='$city', country='$country', role='$role' WHERE id=$id");
                                        // header("Location: class_view.php");
                                        if(isset($result)){
                                            $msg =  "The record has been Updated successfully!<br>";
                                        }
                                    }
                                    }
                                ?>
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
                                                    <label for="">Name</label>
                                                    <input type="text" name="name" id="alphabetname" value="<?php echo $name;?>"
                                                        class="form-control" placeholder="Name">
                                                    <span class="error text-danger">
                                                        <p id="name"></p>
                                                    </span>
                                                    <span class="error text-danger">
                                                        <p id="alphabet"></p>
                                                    </span>
                                                </div>
                                                <?php
                                                    userNameUpdate();
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <input type="text" name="email" value="<?php echo $email;?>"
                                                        class="form-control" placeholder="Email">

                                                    <span class="error text-danger">
                                                        <p id="email"></p>
                                                    </span>
                                                    <span class="error text-danger">
                                                        <p id="alphabet"></p>
                                                    </span>
                                                </div>
                                                <?php
                                                    userEmailUpdate();
                                                ?>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Contact</label>
                                                    <input type="number" name="contact" value="<?php echo $contact;?>"
                                                        class="form-control" placeholder="Contact">

                                                    <span class="error text-danger">
                                                        <p id="contact"></p>
                                                    </span>
                                                    <span class="error text-danger">
                                                        <p id="alphabet"></p>
                                                    </span>
                                                </div>
                                                <?php
                                                    userContactUpdate();
                                                ?>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Address</label>
                                                    <input type="text" name="address" value="<?php echo $address;?>"
                                                        class="form-control" placeholder="Address">

                                                    <span class="error text-danger">
                                                        <p id="address"></p>
                                                    </span>
                                                </div>
                                                <?php
                                                    userAddressUpdate();
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">City</label>
                                                    <input type="text" name="city" value="<?php echo $city;?>"
                                                        class="form-control" placeholder="City">

                                                    <span class="error text-danger">
                                                        <p id="city"></p>
                                                    </span>
                                                    <span class="error text-danger">
                                                        <p id="alphabet"></p>
                                                    </span>
                                                </div>
                                                <?php
                                                    userCityUpdate();
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Country</label>
                                                    <input type="text" name="country" value="<?php echo $country;?>"
                                                        class="form-control" placeholder="Country">
                                                    <span class="error text-danger">
                                                        <p id="country"></p>
                                                    </span>
                                                    <span class="error text-danger">
                                                        <p id="alphabet"></p>
                                                    </span>
                                                </div>

                                                <?php
                                                        userCountryUpdate();
                                                    ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Role</label>
                                                    <input type="text" name="role" value="<?php echo $role;?>"
                                                        class="form-control" placeholder="Role">
                                                    <span class="error text-danger">
                                                        <p id="role"></p>
                                                    </span>
                                                    <span class="error text-danger">
                                                        <p id="alphabet"></p>
                                                    </span>
                                                </div>

                                                <?php
                                                    userRoleUpdate();
                                                ?>
                                            </div>
                                        </div>
                                        <div class="">
                                            <button type="submit" name="Update" id="btnSubmit"
                                                class="btn btn-primary">Update</button>
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
</script>

</html>