<!DOCTYPE html>
<?php
  session_start();
  $title = "Gym Registration";
  require "./functions/mysql.php";
  $conn = db_connect();
  $result = getAllRegistrationInfo($conn);
  $result2 = getTimeSlot1($conn);

?>

<head>
    <header class="head1">
    <h2>GYM Registration Info</h2>
  </header>

    <style>
    .head1 {
    border: 5px outset black;
    background-color: lightblue;    
    text-align: left;
    padding-left: 25px;
    width: 60%;
    }

    .div1{
        border: 2px outset black;
        background-color: white;
        padding-left: 30px;
        padding-top: 20px;
        padding-bottom: 20px;
        width: 60%;
        float: left;
    }

    .table1{
        margin-top: 20px;
        padding-right: 20px;
        border-collapse: separate;
        border-spacing: 50px 0;
        border: 2px solid black;
    }

    .td{
        padding: 10px 0;
    }
    </style>
</head>
<body>


<div class="div1">
<h3>Time Slot : Morning : 7.30 - 9.30 am</h3>
    <table class="table1">
        <tr>
            <th>Gym ID</th>
            <th>First Name </th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Last Exercise</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)){?>
        <tr>
            <td><?php echo $row['gym_id']; ?></td>
            <td><?php echo $row['f_name']; ?></td>
            <td><?php echo $row['l_name']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['lastexercise']; ?></td>
        </tr>
        <?php
            }?>
    </table>
</div>
</body>

<?php
    if(isset($conn)){mysqli_close($conn);}
?>