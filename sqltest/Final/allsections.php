<!DOCTYPE html>
<html lang="en">
<head class="text">

    <style>
    .text {
        color: white;
    }

    .center-box {
        width: 800px;
        height: 920px;
        margin-top: 30px;
        margin-left: 330px;
        align-items: center;
        font-size: x-large;
    }

    .center-box pre {
        margin: 0;
        padding: 0; /* Add padding 0 to remove any default padding */
    }
    .button-container {
        display: flex;
        align-items: center;
        color: white;  
    }

    .button1 {
        background-color: rgb(160,28,76);
        color: rgb(255, 255, 255);
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

    .button {
        background-color: rgb(160, 28, 76);
        color: white;
        border: none;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        font-size: 16px;
        margin: 10px;
        cursor: pointer;
        border-radius: 10px;
        font-family: Arial, Helvetica, sans-serif;
    }

    .delete-button {
        background-color: rgb(160, 28, 76);
        color: white;
        border: none;
        padding: 10px 20px;
        text-decoration: none;
        font-size: 16px;
        margin: 10px;
        cursor: pointer;
        border-radius: 10px;
        font-family: Arial, Helvetica, sans-serif;
        margin-right: auto;
    }
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade XC</title>
</head>
<body bgcolor="#111">
<div class="button-container">  
    <a href="index.php"><button class="button1"><b>Back</b></button></a>
    <h1>Sections</h1>
</div>
<hr>
<div class="center-box">

    <pre><?php
            $grade_id= isset($_GET['grade_id']) ? $_GET['grade_id'] : null;
            $conn =  new mysqli('localhost','root','Aamvdog321','school_list');

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // SQL query to fetch data from the database
            $sql = "SELECT * FROM classlist";

            $result = $conn->query($sql);
            $grade_id = isset($_GET['grade_id']) ? $_GET['grade_id'] : null;
            // Output data of each row
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    if($row['grades']==$grade_id) {  
                        echo "<a href='section.php?class_id=" . $row["classid"] . "&grade_id=" . $grade_id . "&section_id=" . $row["sections"] . "'><button class='delete-button'><b>View</b></button></a> &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;<span style='color: white;'>" . $row["classid"].". ". $row["grades"] . $row["sections"] . " (". $row['teachers'] . ")" ."<hr>";
                    }
                }
            } else {
                echo "0 results";
            }
            $conn->close();
        ?>
    </pre>
</div>