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
    <script src=" https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php include('external_css/top_link.php') ?>
</head>

<body>
    <?php
        include 'admin_dashboard_auth.php';
    ?>
    <?php
    if(isset($_POST['Submit'])) {
        $name = $_POST['name'];    	 
        @$cours = $_POST['course']; 

        foreach($cours ?: [] as $co)
        {
            $result = mysqli_query($mysqli, "INSERT INTO `class_courses_pivot`(`class_id`, `cours_id`) VALUES 
            ('$name','$co')");

            if(isset($result)){
            $msg =  "The record has been inserted successfully!<br>";
        }
        }  
    }
    ?>
    <?php
         // define variables and set to empty values
         $nameErr =  $courseErr = "";
         $name = $cours = "";

         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
               $nameErr = "Select Class Name";
            }
            if (empty($_POST["course"])) {
                $courseErr = "Select Course Name";
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
                                <li class="breadcrumb-item active">Class Course Add</li>
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
                                    <h3 class="card-title">Class Course Add</h3>
                                    <!-- <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div> -->
                                </div>
                                <form method="post" action="class_course_add.php">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">

                                                    <?php  if(isset($msg)) { ?>
                                                    <div class="alert alert-success" role="alert">
                                                        <?php echo $msg; ?>
                                                    </div>
                                                    <?php } ?>
                                                    <label for="class_name">Class Name</label>
                                                    <select class="form-select" name="name" id="class_name"
                                                        style="width: 100%;">
                                                        <option value="">Select Classes</option>
                                                        <?php
                                                            $query = "select * from classes";
                                                            $result = $mysqli->query($query);
                                                            if ($result->num_rows > 0) {
                                                                while ($row = mysqli_fetch_assoc($result)) {
                                                            ?>
                                                            
                                                        <option value="<?php echo $row['id']; ?>">
                                                            <?php echo $row['name']; ?>
                                                        </option>
                                                        <?php
                                                                }
                                                            }
                                                            ?>
                                                    </select>
                                                    <span class="error text-danger"> <?php echo $nameErr;?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="class_name">Course Name</label>
                                                    <select id="course" class="select2" name="course[]"
                                                        multiple="multiple" data-placeholder="Select Courses"
                                                        style="width: 100%;">
                                                        <option value="">Select Courses</option>
                                                    </select>
                                                    <span class="error text-danger"> <?php echo $courseErr;?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" name="Submit" class="btn btn-primary"
                                            fdprocessedid="7qwqq1">Submit</button>
                                        <a href="class_course_view.php">
                                            <input type="button" value="Cancel" class="btn btn-danger" />
                                        </a>
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
            $("#class_name").on('change', function() {
                var classid = $(this).val();
                if (classid) {
                    $.ajax({
                        method: "POST",
                        url: "responses.php",
                        data: {
                            id: classid
                        },
                        datatype: "html",
                        success: function(data) {
                            console.log(data)
                            $("#course").html(data);
                        }
                    });
                } else {
                    $("#course").html('<option value="">Select Courses</option');
                }
            });
        });
    </script>

</html>