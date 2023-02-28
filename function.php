<?php
    include("conn.php");
    function addClass()
    {
        //checking name
        if(isset($_POST['Submit'])) {
        if(empty($_POST['addclass'])){
        // header("Location: class_view.php");

        echo '<script type="text/javascript">',
        'document.getElementById("name").innerHTML = "Name is required";',
        '</script>';
        }
        else{
        $namec = $_POST['addclass'];
        $name_pattern = '/^[a-zA-Z]*$/';
        if(!preg_match($name_pattern, $namec)){

        echo '<script type="text/javascript">',
        'document.getElementById("alphabet").innerHTML = "Only alphabets";',
        '</script>';
        }
        else{
        $conn = mysqli_connect('localhost', 'root', '', 'management');
        $result = mysqli_query($conn, "INSERT INTO classes(name) VALUE('$namec')");
        if($result)
        {
          echo "<script type='text/javascript'>
          document.getElementById('notificationaclass').innerHTML = 'The record has been inserted successfully!';
          document.getElementById('notificationaclass').style.display = 'block';
          </script>";
        }
        }
      }
    }
  }

    function addCourse(){

      //checking name
      if(isset($_POST['Submit'])) {
        if(empty($_POST['addcourse'])){
        // header("Location: class_view.php");
    
        echo '<script type="text/javascript">',
        'document.getElementById("name").innerHTML = "Name is required";',
        '</script>';
    
        }
        else{
        $nameco = $_POST['addcourse'];
        $name_pattern = '/^[a-zA-Z]*$/';
        if(!preg_match($name_pattern, $nameco)){
        // $msg2_name = "";
    
        echo '<script type="text/javascript">',
        'document.getElementById("alphabet").innerHTML = "Only alphabets";',
        '</script>';
    
        }
        else{
        $conn = mysqli_connect('localhost', 'root', '', 'management');
        $result = mysqli_query($conn, "INSERT INTO courses(name) VALUE
        ('$nameco')");
        if($result)
        {
          echo "<script type='text/javascript'>
          document.getElementById('notificationacourse').innerHTML = 'The record has been inserted successfully!';
          document.getElementById('notificationacourse').style.display = 'block';
          </script>";
        }
        }
        }
    }
}

    function studentName(){
    if(isset($_POST['Submit'])) {
      if(empty($_POST['name'])){
  
      echo '<script type="text/javascript">',
      'document.getElementById("name").innerHTML = "Name is required";',
      '</script>';

      }
      else{
      $stuname = $_POST['name'];
      $name_pattern = '/^[a-zA-Z]*$/';
      if(!preg_match($name_pattern, $stuname)){
  
      echo '<script type="text/javascript">',
      'document.getElementById("alphabet").innerHTML = "Only alphabets";',
      '</script>';
      
      }
      }
  }
}

    function studentEmail(){
      if(isset($_POST['Submit'])) {
        if(empty($_POST['email'])){

        echo '<script type="text/javascript">',
        'document.getElementById("email").innerHTML = "Email is not valid.";',
        '</script>';
        }
        else{
        $email = $_POST ["email"];  
        $name_pattern = '^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^';
        if(!preg_match($name_pattern, $email)){

        echo '<script type="text/javascript">',
        'document.getElementById("alphabet").innerHTML = "Your valid email address is:" .$email;',
        '</script>';
        }
        }
    }
    }

    function studentContact(){
      //checking name
      if(isset($_POST['Submit'])) {
        if(empty($_POST['contact'])){
        // header("Location: class_view.php");

        echo '<script type="text/javascript">',
        'document.getElementById("contact").innerHTML = "Contact is required.";',
        '</script>';
        
        }
        else{
        $contact = $_POST ["contact"];
        if (!preg_match ("/^[0-9]*$/", $contact)){

        echo '<script type="text/javascript">',
        'document.getElementById("alphabet").innerHTML = echo $mobileno;',
        '</script>';
        
        }
      }
    }
  }

    function studentPasword(){
      if (isset($_POST['Submit'])){
      $password = $_POST['password'];

      // Validate password strength
      $uppercase = preg_match('@[A-Z]@', $password);
      $lowercase = preg_match('@[a-z]@', $password);
      $number    = preg_match('@[0-9]@', $password);
      $specialChars = preg_match('@[^\w]@', $password);

      if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
          echo 'Password is not Strong.';
      }else{
          echo 'Strong password.';
      }
    }
  }

    function studentAddress(){
      if (isset($_POST['Submit'])){
        if(empty($_POST['address'])){
        
        echo '<script type="text/javascript">',
        'document.getElementById("address").innerHTML = "Address is required";',
        '</script>';
    }
  }
}

    function studentCity(){
          //checking name
    if(isset($_POST['Submit'])) {
      if(empty($_POST['city'])){
      // header("Location: class_view.php");
  
      echo '<script type="text/javascript">',
      'document.getElementById("city").innerHTML = "City is required";',
      '</script>';

      }
      else{
      $cityname = $_POST['city'];
      $name_pattern = '/^[a-zA-Z]*$/';
      if(!preg_match($name_pattern, $cityname)){
  
      echo '<script type="text/javascript">',
      'document.getElementById("alphabet1").innerHTML = "Only alphabets";',
      '</script>';
      }
      }
  }
}

    function studentCountry(){
      //checking name
    if(isset($_POST['Submit'])) {
    if(empty($_POST['country'])){

    echo '<script type="text/javascript">',
    'document.getElementById("country").innerHTML = "Country is required";',
    '</script>';

    }
    else{
    $countryname = $_POST['country'];
    $name_pattern = '/^[a-zA-Z]*$/';
    if(!preg_match($name_pattern, $countryname)){

    echo '<script type="text/javascript">',
    'document.getElementById("alphabet2").innerHTML = "Only alphabets";',
    '</script>';
    }
    }
  }
}

  function teacherQualification(){
    if(isset($_POST['Submit'])) {
      if(empty($_POST['qualification'])){

      echo '<script type="text/javascript">',
      'document.getElementById("qualification").innerHTML = "Qualification is required";',
      '</script>';

      }
      else{
      $teaqualification = $_POST['qualification'];
      $name_pattern = '/^[a-zA-Z]*$/';
      if(!preg_match($name_pattern, $teaqualification)){

      echo '<script type="text/javascript">',
      'document.getElementById("alphabets").innerHTML = "Only alphabets";',
      '</script>';
      
      }
    }
  }
}

  // user profile update work

  function userNameUpdate(){
    if(isset($_POST['Update'])) {
      if(empty($_POST['name'])){

      echo '<script type="text/javascript">',
      'document.getElementById("name").innerHTML = "Name is required";',
      '</script>';

      }
    }
  }

  function userEmailUpdate(){
    if(isset($_POST['Update'])) {
      if(empty($_POST['email'])){

      echo '<script type="text/javascript">',
      'document.getElementById("email").innerHTML = "Email is not valid.";',
      '</script>';
      
      }
      else{
      $email = $_POST ["email"];  
      $name_pattern = '^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^';
      if(!preg_match($name_pattern, $email)){

      echo '<script type="text/javascript">',
      'document.getElementById("alphabet").innerHTML = "Your valid email address is:" .$email;',
      '</script>';
      
      }
      }
    }
  }

  function userContactUpdate(){
    if(isset($_POST['Update'])) {
      if(empty($_POST['contact'])){

      echo '<script type="text/javascript">',
      'document.getElementById("contact").innerHTML = "Contact is required.";',
      '</script>';
      
      }
      else{
      $contact = $_POST ["contact"];
      if (!preg_match ("/^[0-9]*$/", $contact)){

      echo '<script type="text/javascript">',
      'document.getElementById("alphabet").innerHTML = echo $mobileno;',
      '</script>';
      
      }
    }
  }
}

  function userAddressUpdate(){
    if (isset($_POST['Update'])){
      if(empty($_POST['address'])){
      
      echo '<script type="text/javascript">',
      'document.getElementById("address").innerHTML = "Address is required";',
      '</script>';
    }
  }
}

  function userCityUpdate(){
      //checking name
    if(isset($_POST['Update'])) {
    if(empty($_POST['city'])){
    // header("Location: class_view.php");

    echo '<script type="text/javascript">',
    'document.getElementById("city").innerHTML = "City is required";',
    '</script>';

    }
    else{
    $cityname = $_POST['city'];
    $name_pattern = '/^[a-zA-Z]*$/';
    if(!preg_match($name_pattern, $cityname)){

    echo '<script type="text/javascript">',
    'document.getElementById("alphabet1").innerHTML = "Only alphabets";',
    '</script>';
      }
    }
  }
}



  function userCountryUpdate(){
      //checking name
    if(isset($_POST['Update'])) {
    if(empty($_POST['country'])){

    echo '<script type="text/javascript">',
    'document.getElementById("country").innerHTML = "Country is required";',
    '</script>';

    }
    else{
    $countryname = $_POST['country'];
    $name_pattern = '/^[a-zA-Z]*$/';
    if(!preg_match($name_pattern, $countryname)){

    echo '<script type="text/javascript">',
    'document.getElementById("alphabet2").innerHTML = "Only alphabets";',
    '</script>';
      }
    }
  }
}

  function userRoleUpdate(){
      //checking name
    if(isset($_POST['Update'])) {
    if(empty($_POST['role'])){

    echo '<script type="text/javascript">',
    'document.getElementById("role").innerHTML = "Role is required";',
    '</script>';

    }
    else{
    $countryname = $_POST['role'];
    $name_pattern = '/^[a-zA-Z]*$/';
    if(!preg_match($name_pattern, $countryname)){

    echo '<script type="text/javascript">',
    'document.getElementById("alphabet2").innerHTML = "Only alphabets";',
    '</script>';
      }
    }
  }
}



?>