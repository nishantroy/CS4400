<?php

    session_start();
    include_once("../authentication/db.php");

    $user = $_SESSION['username'];
    

    $sql = "SELECT Project_name, Date, Status FROM Apply WHERE Student_name = '$user'";
    $result = mysqli_query($conn, $sql);

    
    $out = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $out[] = $row;
    }

    echo json_encode($out);

   



?>