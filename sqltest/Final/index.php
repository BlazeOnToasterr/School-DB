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
                background-color: #2a2a2a;
                margin-top: 30px;
                margin-left: 330px;
                align-items: center;
                font-size: x-large;
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
        </style>
    </head>
    <body bgcolor='#111'>
        <h1>Student Data Base Of Class X C</h1>
        <hr>
        <div class='center-box'>
            <pre>";
    while ($row = $result->fetch_assoc()) {
        echo "<a href='section.php?class_id=" . $row["classid"] . "'><button class='button'><b>View</b></button></a> &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;<span style='color: white;'>" . $row["classid"].". ". $row["grades"] . " " . $row["sections"] . "</span><hr>";
    }
    echo "</pre>
        </div>
    </body>
    </html>";
} else {
    echo "0 results";
}

$conn->close();
?>
