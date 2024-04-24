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
        background-color: #2a2a2a;
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
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade XC</title>
</head>
<body bgcolor="#111">
<div class="button-container">  
    <a href="index.php"><button class="button1"><b>Back</b></button></a>
    <h1>Students</h1>
</div>
<hr>
<div class="center-box">

    <pre><?php
            $class_id= isset($_GET['class_id']) ? $_GET['class_id'] : null;
            $conn =  new mysqli('localhost','root','Aamvdog321','school_list');

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // SQL query to fetch data from the database
            $sql = "SELECT * FROM students";
            $result = $conn->query($sql);
            $class_id = isset($_GET['class_id']) ? $_GET['class_id'] : null;
            // Output data of each row
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    if($row['classid']==$class_id) {
                    echo "<a href='userinfo.php?user_id=" . $row["userid"] . "'><button class='button'><b>View</b></button></a> &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;<span style='color: white;'>" . $row["userid"].". ". $row["firstname"] . " " . $row["lastname"] . "</span><hr>";
                    }
                }
            } else {
                echo "0 results";
            }
            $conn->close();
        ?>
    </pre>
</div>

</body>
</html>
