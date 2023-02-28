<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- <style>
p::after { 
  content: "";
}
</style> -->

<!-- Brand Logo -->
<a href="index3.html" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
    <span class="brand-text font-weight-light">Good Luck</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block"><?php echo $_SESSION['name']; ?></a>
        </div>
    </div>

    <?php
           $email = $_SESSION['email'];
           $result = mysqli_query($mysqli, "SELECT * FROM `users` WHERE email = '$email'");
           $res = mysqli_fetch_array($result);
           $role =  $res['role'];
    ?>
    
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <!-- user_profile_update.php -->
            <?php if($role == 'user'){ ?>
            <li class="nav-item">
                <a href="user_dashboard.php" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Dashbaord
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="user_profile_update.php" class="nav-link">
                    <i style="font-size:21px" class="fa fa-users" aria-hidden="true"></i> &nbsp;
                    <p>
                        User Profile Update
                    </p>
                </a>
            </li>
            <?php } ?>
            <?php if($role == 'admin'){ ?>
            <li class="nav-item">
                <a href="class_view.php" class="nav-link">
                    <i style="font-size:21px" class="fa fa-file-image"></i> &nbsp;&nbsp;
                    <p>
                        View Class
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="course_view.php" class="nav-link">
                    <i style="font-size:21px" class="fa fa-file-archive"></i> &nbsp;&nbsp;
                    <p>
                        View Course
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="class_course_add.php" class="nav-link">
                    <i style="font-size:21px" class="fa fa-clone"></i> &nbsp;&nbsp;
                    <p>
                        Class Course Add
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="student_reg.php" class="nav-link">
                    <i style="font-size:21px" class="fa">&#xf0c0;</i> &nbsp;&nbsp;
                    <p>
                        Students
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="class_assign_to_student.php" class="nav-link">
                    <i style="font-size:21px" class="fa fa-user"></i> &nbsp;&nbsp;
                    <p>
                        Class Assign To Student
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="class_course_view.php" class="nav-link">
                    <i style="font-size:21px" class="fa fa-sticky-note"></i> &nbsp;&nbsp;
                    <p>
                        Class Course View
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="class_student_view.php" class="nav-link">
                    <i style="font-size:21px" class="fas">&#xf501;</i> &nbsp;&nbsp;
                    <p>
                        Class Student View
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="country.php" class="nav-link">
                    <i style="font-size:21px" class="fa fa-globe"></i> &nbsp;&nbsp;
                    <p>
                        Country
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="teacher_view.php" class="nav-link">
                    <i style="font-size:21px" class="fa fa-address-book"></i> &nbsp;&nbsp;
                    <p>
                        Teacher
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="admin_profile_update.php" class="nav-link">
                    <i style="font-size:21px" class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;&nbsp;
                    <p>
                        Admin Profile Update
                    </p>
                </a>
            </li>
            <?php } ?>

            <?php if($role == 'teacher'){ ?>
            <li class="nav-item">
                <a href="home.php" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Home
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="student_view.php" class="nav-link">
                    <i style="font-size:21px" class="fa fa-users" aria-hidden="true"></i> &nbsp;
                    <p>
                        Students View
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="teacher_attendence.php" class="nav-link">
                    <i style="font-size:21px" class="fa fa-users" aria-hidden="true"></i> &nbsp;
                    <p>
                        Attendence
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="student_attendence_record.php" class="nav-link">
                    <i style="font-size:21px" class="fa fa-users" aria-hidden="true"></i> &nbsp;
                    <p>
                        Student Attendence
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="student_atten_view.php" class="nav-link">
                    <i style="font-size:21px" class="fa fa-users" aria-hidden="true"></i> &nbsp;
                    <p>
                        Student Atten View
                    </p>
                </a>
            </li>
            <?php } ?>



            <?php if($role == 'teachers'){ ?>
            <li class="nav-item">
                <a href="home.php" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Home
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="student_view.php" class="nav-link">
                    <i style="font-size:21px" class="fa fa-users" aria-hidden="true"></i> &nbsp;
                    <p>
                        Students View
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="teacher_attendence.php" class="nav-link">
                    <i style="font-size:21px" class="fa fa-users" aria-hidden="true"></i> &nbsp;
                    <p>
                        Attendence
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="student_attendence_record.php" class="nav-link">
                    <i style="font-size:21px" class="fa fa-users" aria-hidden="true"></i> &nbsp;
                    <p>
                        Student Attendence
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="student_atten_view.php" class="nav-link">
                    <i style="font-size:21px" class="fa fa-users" aria-hidden="true"></i> &nbsp;
                    <p>
                        Student Atten View
                    </p>
                </a>
            </li>
            <?php } ?>

            <!-- <li class="nav-item">
                <a href="home.php" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Home
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="student_view.php" class="nav-link">
                    <i style="font-size:21px" class="fa fa-users" aria-hidden="true"></i> &nbsp;
                    <p>
                        Students View
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="teacher_attendence.php" class="nav-link">
                    <i style="font-size:21px" class="fa fa-users" aria-hidden="true"></i> &nbsp;
                    <p>
                        Attendence
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="student_attendence_record1.php" class="nav-link">
                    <i style="font-size:21px" class="fa fa-users" aria-hidden="true"></i> &nbsp;
                    <p>
                        Student Attendence
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="student_atten_view1.php" class="nav-link">
                    <i style="font-size:21px" class="fa fa-users" aria-hidden="true"></i> &nbsp;
                    <p>
                        Student Atten View
                    </p>
                </a>
            </li>   -->
            <!-- <li class="nav-item">
                <a href="add.php" class="nav-link">
                    <i style="font-size:21px" class="fa fa-users" aria-hidden="true"></i> &nbsp;
                    <p>
                        Add Student
                    </p>
                </a>
            </li> -->
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>