<?php
    include 'test_conn.php';
?>
<!DOCTYPE html>
<html>
<body>
<?php
  $sql = ("SELECT ts.id, ts.test_name, el.emp_name, el.emp_email, el.emp_contact, el.emp_address
            FROM test ts INNER JOIN employee el WHERE ts.id = el.id");
  $result = $mysqli->query($sql);
  
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<pre>";
        print_r($row);
        echo "</pre>";
      echo "id: " . $row["id"]. "Name". $row["test_name"] . "<br>";
    }
  } else {
    echo "0 results";
  }
?>
</body>
</html>