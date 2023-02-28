<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Boostrap 4 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <!-- Boostrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="style.css">
</head>

<?php
    include('../conn.php');
    // When form submitted, check and create user session.
    if (isset($_POST['email'])) {
        $email = stripslashes($_REQUEST['email']);    // removes backslashes
        $email = mysqli_real_escape_string($mysqli, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($mysqli, $password);
        // Check user is exist in the database
        $query = "SELECT * FROM `users` WHERE email='$email'
                    AND password= '$password'";
        $result = mysqli_query($mysqli, $query);
        $rows = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);

        if ($rows > 0) {
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];

            $result = mysqli_query($mysqli, "SELECT * FROM `users` WHERE email = '$email'");
            $res = mysqli_fetch_array($result);
            $role =  $res['role'];

            // Redirect to user dashboard page
            if($role == 'user')
                {
                    header("Location: ../user_dashboard.php");
                }
            elseif($role == 'admin')
                {
                    header("Location: ../admin_dashboard.php");
                }
            else{
               header("Location: ../home.php");
            } 
                
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
        } else {
    ?>

<?php
         // define variables and set to empty values
         $emailErr = $passwordErr = "";
         $email = $password = "";
         
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["email"])) {
               $emailErr = "Email is required";
            }else {
               $email = test_input($_POST["email"]);
            }
            
            if (empty($_POST["password"])) {
               $passwordErr = "Password is required";
            }else {
               $password = test_input($_POST["password"]);
            }
             

            //    check if e-mail address is well-formed
            //    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            //       $emailErr = "Invalid email format"; 
            //    }
            }
         
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
?>

<body>
    <div class="container min-vh-100 d-flex align-items-center justify-content-center">
        <div class="row">
            <div class="col-sm-12">
                <div class="card p-4">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" placeholder="Email" name="email">
                            <span class="error text-danger"> <?php echo $emailErr;?></span>
                        </div>

                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" placeholder="password" name="password">
                            <span class="error text-danger"> <?php echo $passwordErr;?></span>
                        </div>
                        <input type="submit" name="save" value="Login" class="btn btn-success btn-md btn-block">
                        <a href="register.php">Redirect to Register</a>
                    </form>
                    <!--end of form -->

                    <?php
                        }
                        ?>

                </div>
            </div>
            <!--end of col-sm-6 -->
        </div>
        <!--end of row -->
    </div>
    <!--end of container -->
</body>

</html>