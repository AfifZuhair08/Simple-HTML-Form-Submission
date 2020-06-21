<!DOCTYPE html>

<?php
  session_start();
  $title = "Gym Registration";

  require "./functions/mysql.php";
  $conn = db_connect();

  if(isset($_POST['register'])){
    $f_name = trim($_POST['f_name']);
    $f_name = mysqli_real_escape_string($conn, $f_name);

    $l_name = trim($_POST['l_name']);
    $l_name = mysqli_real_escape_string($conn, $l_name);

    $gender = trim($_POST['gender']);
    $gender = mysqli_real_escape_string($conn, $gender);

    $lastexercise = trim($_POST['lastexercise']);
    $lastexercise = mysqli_real_escape_string($conn, $lastexercise);

    $timeslot = trim($_POST['timeslot']);
    $timeslot = mysqli_real_escape_string($conn, $timeslot);
    
    // $query = "INSERT INTO gym VALUES ('','".$f_name."','".$l_name."','".$gender."','".$lastexercise."','". $timeslot ."')";
    $query = "INSERT INTO gym VALUES ('"."','".$f_name."','".$l_name."','".$gender."','".$lastexercise."','".$timeslot."')";
    $result = mysqli_query($conn,$query);

    if(!$result){
      echo "<h3>Registration unsuccessful <h3><br><br>";
    }else{
      echo "<h3>Registration Success !</h3>";
    }
  }
?>

<head>
  <header class="head1">
    <h2>GYM Application Form</h2>
    <h4>Register Today</h4>
  </header>
  
  <style>
  .head1 {
    border: 5px outset black;
    background-color: lightblue;    
    text-align: left;
    padding-left: 25px;
    width: 50%;
  }

  .div1 {
    border: 2px outset black;
    background-color: white;
    padding-left: 30px;
    padding-top: 20px;
    padding-bottom: 20px;
    width: 50%;
    float: left;
  }

  </style>
</head>
<body>
  <div class="div1">
    <form method="post" action="form.php" enctype="multipart/form-data">
      
      <label><b>Full Name</b></label><br>
      <input type="text" id="fname" name="f_name" required><br/>
      <label for="fname">First</label><br>
      <input type="text" id="lname" name="l_name" required><br/>
      <label for="lname">Last</label><br><br>

      <label for="gender"><b>Gender</b>:</label><br>
      <input type="radio" id="male" name="gender" value="Male">
      <label for="Male">Male</label><br>
      <input type="radio" id="female" name="gender" value="Female">
      <label for="Female">Female</label><br><br>
      

      <label for="cars"><b>When was the last time you exercise?</b>:</label><br>
      <select name="lastexercise" id="lastexercise" required>
        <option value="Currently">Currently</option>
        <option value="Less than 1 year">Less than 1 year</option>
        <option value="1-2 years">1-2 years</option>
        <option value="2++ years">2++ years</option>
      </select><br><br>

      <label for="timeslot"><b>Time Slot</b></label><br>
      <input type="radio" id="timeslot" name="timeslot" value="Morning : 7.30 - 9.30 am">
      <label for="timeslot">Morning : 7.30 - 9.30 am</label><br>
      <input type="radio" id="timeslot" name="timeslot" value="Evening : 4.30 - 6.30 pm">
      <label for="timeslot">Evening : 4.30 - 6.30 pm</label><br>
      <input type="radio" id="timeslot" name="timeslot" value="Night : 8.30 - 10.30 pm">
      <label for="timeslot">Night : 8.30 - 10.30 pm</label>

      <br><br>
      <input type="submit" value="Submit" name="register">
    </form>

  </div>
</body>
</html>

<?php
	if(isset($conn)) {mysqli_close($conn);}
?>