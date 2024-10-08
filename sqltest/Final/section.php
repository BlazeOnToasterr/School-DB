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
        <?php
        $class_id = isset($_GET['class_id']) ? $_GET['class_id'] : null;
        $grade_id = isset($_GET['grade_id']) ? $_GET['grade_id'] : null;
        $section_id = isset($_GET['section_id']) ? $_GET['section_id'] : null;
        ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "Grade ". $grade_id . $section_id;?></title>
</head>
<body bgcolor="#111">
<div class="button-container">  
    <?php
    $grade_id= isset($_GET['grade_id']) ? $_GET['grade_id'] : null;
    $class_id= isset($_GET['class_id']) ? $_GET['class_id'] : null;
    echo '<a href="allsections.php?grade_id='. $grade_id . '&class_id=' . $class_id . '"><button class="button1"><b>Back</b></button></a>'
    ?>
    <h1><?php echo "Grade " . $grade_id . $section_id . " Students" ?></h1>
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
            // Output data of each row
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    if($row['grade']==$grade_id && $row['section']==$section_id) {
                        echo "<a href='userinfo.php?user_id=" . $row["userid"] . "&class_id=" . $class_id . "&grade_id=" . $grade_id . "&section_id=" . $section_id . "'><button class='delete-button'><b>View</b></button></a> &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;<span style='color: white;'>" . $row["userid"].". ". $row["firstname"] . " " . $row["lastname"] . "</span><button class='button' onclick='deleteUser(" . $row['userid'] . ")'>Delete</button><hr>";
                    }
                }
            } else {
                echo "0 results";
            }
            $conn->close();
        ?>
    </pre>
</div>

<script>
function deleteUser(userid) {
    if (confirm("Are you sure you want to delete this user?")) {
        // Send AJAX request to delete_user.php with userid parameter
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "connect/deleteuser.php?userid=" + userid, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Reload the page after successful deletion
                window.location.href = "section.php?class_id=<?php echo $class_id ?>";
            }
        };
        xhr.send();
    }
}

</script>


</body>
</html>
