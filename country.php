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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- jquery cdn -->
    <!-- <script src=" https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <?php include('external_css/top_link.php') ?>
</head>

<body>

    <?php
        if(isset($_POST['Submit'])) {
        $country = $_POST['cname'];    	 
        $city    = $_POST['ciname'];
        $town    = $_POST['tname'];
        }
    ?>

    <?php
        // define variables and set to empty values
        $countryErr =  $cityErr = $townErr = "";
        $country = $city = $town = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["cname"])) {
            $countryErr = "Select Country Name";
        }
        if (empty($_POST["ciname"])) {
            $cityErr = "Select City Name";
            }
        if (empty($_POST["tname"])) {
            $townErr = "Select Town Name";
            }
        }
        
        
        function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }
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
                                <li class="breadcrumb-item active">Country</li>
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
                                    <h3 class="card-title">Country</h3>
                                </div>
                                <form method="post" action="<?php 
                                    echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="country">Country Name</label>
                                                    <select class="form-select" id="country" name="cname"
                                                        style="width: 100%;">
                                                        <option value="">Select Country</option>
                                                        <?php
                                                            $query3 = "select * from country";
                                                            // $query = mysqli_query($con, $qr);
                                                            $result3 = $mysqli->query($query3);
                                                            if ($result3->num_rows > 0) {
                                                                while ($row = mysqli_fetch_assoc($result3)) {
                                                            ?>
                                                        <option value="<?php echo $row['id']; ?>">
                                                            <?php echo $row['name']; ?>
                                                        </option>
                                                        <?php
                                                                }
                                                            }
                                                         ?>
                                                    </select>
                                                    <span class="error text-danger"> <?php echo $countryErr;?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="country">City Name</label>
                                                    <select class="form-select" id="city" name="ciname"
                                                        style="width: 100%;">
                                                        <option value="">Select City</option>
                                                    </select>
                                                    <span class="error text-danger"> <?php echo $cityErr;?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="country">Town Name</label>
                                                    <select class="form-select" id="town" name="tname"
                                                        style="width: 100%;">
                                                        <option value="">Select Town</option>
                                                    </select>
                                                    <span class="error text-danger"> <?php echo $townErr;?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" name="Submit" class="btn btn-primary"
                                            fdprocessedid="7qwqq1">Submit</button>
                                    </div>
                                </form>
                            </div>
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
$(document).ready(function() {
    $("#country").on('change', function() {
        var countryid = $(this).val();
        if (countryid) {
            $.ajax({
                method: "POST",
                url: "response.php",
                data: {
                    id: countryid
                },
                success: function(res) {
                    $("#city").html(res);
                    if (res == '') {
                        $("#city").html('<option value="">Select City</option');
                    }
                    console.log(data)
                }
            });
        } else {
            $("#city").html('<option value="">Select City</option');
        }
    });

    $("#city").on('change', function() {
        var cityid = $(this).val();
        if (cityid) {
            $.ajax({
                method: "POST",
                url: "response.php",
                data: {
                    sid: cityid,
                },
                success: function(data) {
                    $("#town").html(data);
                    console.log(data)
                    if (data == '') {
                        $("#town").html('<option value="">Select Town</option');
                    }
                }
            });
        } else {
            {
                $("#town").html('<option value="">Select Town</option');
            }
        }
    });
});
</script>

</html>