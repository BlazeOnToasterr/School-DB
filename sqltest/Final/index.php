<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli('localhost', 'root', 'Aamvdog321', 'school_list');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}

$sql = "SELECT classid, grades, sections, teachers FROM classlist"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Home Page Student Data Base</title>
        <style>
            .center-box {
                width: 800px;
                height: 300px;
                margin-top: 30px;
                margin-left: 330px;
                align-items: center;
                font-size: x-large;
            }

            .texts {
                color: white;
            }

            .button {
                background-color: rgb(160,28,76);
                color: white;
                border: none;
                padding: 10px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 10px;
                cursor: pointer;
                border-radius: 10px;
                font-family: Arial, Helvetica, sans-serif;
            }

            .longbutton {
                background-color: rgb(160, 28, 76);
                color: white;
                border: none;
                padding: 10px 355px;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 10px;
                cursor: pointer;
                border-radius: 10px;
                font-family: Arial, Helvetica, sans-serif;
                margin-left: 0px;
            }
        </style>
    </head>
    <body bgcolor='#111' class='texts'>
        <h1>Student Data Base Of School</h1>
        <hr>
        <div class='center-box'>
            <pre>";
    $classes1 = array();

    while ($row = $result->fetch_assoc()) {

        if (!in_array($row["grades"], $classes1)) { // Check if the grade is not already in $classes
            array_push($classes1, $row['grades']);
            echo "<a href='allsections.php?grade_id=" . $row["grades"] . "'><button class='button'><b>View</b></button></a> &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;<span style='color: white;'>" . "Grade ". $row["grades"] . "</span><hr>";
        }        
    }
    echo "<a href='registration.php'><button class='longbutton'><b>Add Student</b></button></a>
            </pre>
        </div>
    </body>
    </html>";
} else {
    echo "0 results";
}

$conn->close();
?>
