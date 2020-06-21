<?php

function db_connect(){
    $conn = mysqli_connect("localhost", "root", "", "gymdata");
    if(!$conn){
        echo "Can't connect database " . mysqli_connect_error($conn);
        exit;
    }
    return $conn;
}

function getAllRegistrationInfo($conn){
    $query = "SELECT * from gym";
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "Can't retrieve data " . mysqli_error($conn);
        exit;
    }
    return $result;
}

function getTimeSlot1($conn){
    $query = "SELECT * from gym WHERE timeslot = 'Morning : 7.30 - 9.30 am'";
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "Can't retrieve data " . mysqli_error($conn);
        exit;
    }
    return $result;
}

?>