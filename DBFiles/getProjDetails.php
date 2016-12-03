<?php

    include_once("db.php");

    $jsonText = file_get_contents('php://input');
    $decodedText = html_entity_decode($jsonText);
    $myArray = json_decode('[' . $decodedText . ']', true);
    $name = $myArray[0]["Name"];
    $type = $myArray[0]["Type"];

    if ($type == 'Course') {
        $sql = "SELECT * FROM Course WHERE Name = '$name'";
        $result = mysqli_query($conn, $sql);
    } else {
        $sql = "SELECT * FROM Project WHERE Name = '$name'";
        $result = mysqli_query($conn, $sql);
    }


    while ($row = mysqli_fetch_assoc($result)) {
        $out[] = $row;
    }


    echo json_encode($out);

?>