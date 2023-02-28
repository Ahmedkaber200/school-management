<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Boostrap 4 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- Boostrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>

    <?php
    include("../conn.php");
    if(isset($_POST['Submit'])) {	
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact =$_POST['contact'];
    $password =$_POST['password'];
    $address =$_POST['address'];
    $city =$_POST['city'];
    $country =$_POST['country'];
    $result = '';


    if($name != "" & $email != "" & $contact != "" & $password != "" & $address != "" & $city != "" & $country != "") 
    $result = mysqli_query($mysqli, "INSERT INTO users(name,email,contact,password,address,city,country) VALUE
    ('$name','$email','$contact','$password','$address','$city','$country')");
    }

    if(!empty($result))
    {
        echo "Data has been submited succesfully";
    }
    ?>

    <?php
         // define variables and set to empty values
         $nameErr = $emailErr = $contactErr = $passwordErr = $addressErr = $cityErr = $countryErr = "";
         $name = $email = $contact = $password = $address = $city = $country = "";

         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
               $nameErr = "Name is required";
            }
            if (empty($_POST["email"])) {
               $emailErr = "Email is required";
            }

            if (empty($_POST["contact"])) {
                $contactErr = "Contact is required";
             }

             if (empty($_POST["password"])) {
                $passwordErr = "Password is required";
             }

             if (empty($_POST["address"])) {
                $addressErr = "Address is required";
             }

             if (empty($_POST["city"])) {
                $cityErr = "City is required";
             }

             if (empty($_POST["country"])) {
                $countryErr = "Country is required";
             }
            }
            
         
         
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
      ?>
<body>
<div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="card p-4">
                        <form method = "post" action = "<?php 
                            echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <h2 class="text-center">Register</h2>
                            <div class="form-group">
                                <label for="">Name *</label>
                                <input type="text" class="form-control" placeholder="Name" name="name">
                                <span class = "error text-danger" > <?php echo $nameErr;?></span>
                            </div>
                            <div class="row g-3">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" placeholder="Email" name="email" required>
                                        <span class = "error text-danger"> <?php echo $emailErr;?></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Contact</label>
                                        <input type="number" class="form-control" placeholder="Contact" name="contact">
                                        <span class = "error text-danger"> <?php echo $contactErr;?></span>
                                    </div>
                                </div>
                            </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="password">
                                    <span class = "error text-danger"> <?php echo $passwordErr;?></span>
                                </div>

                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" class="form-control" placeholder="Address" name="address">
                                    <span class = "error text-danger"> <?php echo $addressErr;?></span>
                                </div>

                                <div class="form-group">
                                    <label for="">City</label>
                                    <input type="text" class="form-control" placeholder="City" name="city">
                                    <span class = "error text-danger"> <?php echo $cityErr;?></span>
                                </div>

                                <div class="form-group">
                                    <label for="">Country</label>
                                    <input type="text" class="form-control" placeholder="Country" name="country">
                                    <span class = "error text-danger"> <?php echo $countryErr;?></span>
                                </div>

                                <input type="submit" name="Submit" class="btn btn-success btn-md btn-block">
                                <a href="login.php">Redirect to Login</a>
                        </form><!--end of form -->
                    </div>
            </div><!--end of col-sm-6 -->
            <div class="col-sm-3"></div>
        </div><!--end of row -->
    </div>
    <!--end of container -->
   
</body>
</html>