<!DOCTYPE html>
<html>
<head>

    <title><?php 
        include 'connect/recieve.php';
        echo $firstname . " " . $lastname . "- Student Information"    
    ?></title>

    <style>
        /* Your CSS styles here */
        .container {
            display: flex;
            column-gap: 20px;
            margin-top: 20px;
            margin-left: 190px;
        }
 
        .box1 {
            width: 200px;
            height: 200px;
            color: white;
        }

        .center-box{
            background-color: #0f0f0f;
        }

        .info-box{
            width: 800px;
            height: 1225px;
            background-color: #0f0f0f;
            margin-top: 100px;
            margin-left: 330px;
            font-size: x-large;
        }

        .button {
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

        .highigth {
            color: white;
        }
    </style>

</head>
<body class="center-box">
    <?php 
    include 'connect/recieve.php';
    if(isset($_GET['user_id'])) {
        // Sanitize user input
        $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);

        // Query to fetch user data based on user ID
        $sql = "SELECT * FROM students WHERE userid = '$user_id'";
        $result = mysqli_query($conn, $sql);

        // Check if user exists
        if(mysqli_num_rows($result) > 0) {
            // Fetch user data
            $user_data = mysqli_fetch_assoc($result);


            }
        }    
        ?>
        <?php     
        $grade_id= isset($_GET['grade_id']) ? $_GET['grade_id'] : null;
        $class_id= isset($_GET['class_id']) ? $_GET['class_id'] : null;
        $section_id = isset($_GET['section_id']) ? $_GET['section_id'] : null;
        ?>
        <a href="section.php?grade_id=<?php echo $grade_id ?>&class_id=<?php echo $class_id ?>&section_id=<?php echo $section_id?>"><button class="button"><b>Back</b></button></a></h2>
    <hr>    
        
    <div class="container">

        <div class="box1"> <img src="lol/SON.jpg" width="200" height="200"><h2>Student Facial Profile</h2></div>

        <div class="box1"> <img src="lol/PAPA.jpg" width="200" height="200"><h2>Student Father</h2></div>

        <div class="box1"> <img src="lol/MOM.jpg" width="200" height="200"><h2>Student Mother</h2></div>

        <div class="box1"> <img src="lol/QR.jpg" width="200" heigth="200"><h2>Student Aadhaar Card</h2></div>
        
        <div class="box1"> <img src="lol/QR2.jpg" width="200" heigth="200"><h2>Student Birth Cirtificate</h2></div>

    </div>
    
    <div class="info-box">
    <?php
// Include your database connection file here
include 'connect/recieve.php';

// Check if user ID is provided in the URL
if(isset($_GET['user_id'])) {
    // Sanitize user input
    $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);

    // Query to fetch user data based on user ID
    $sql = "SELECT * FROM students WHERE userid = '$user_id'";
    $result = mysqli_query($conn, $sql);

    // Check if user exists
    if(mysqli_num_rows($result) > 0) {
        // Fetch user data
        $user_data = mysqli_fetch_assoc($result);

        if ($user_data['description'] == "") {
            $description="None";
        }
        else {
            $description=$user_data['description'];
        }

        // Display user profile
        echo "<pre style=\"font-family: Arial, Helvetica, sans-serif;\">";
        echo "<span class=\"highigth\">Name: " . $user_data['firstname'] . ' ' . $user_data['lastname'] . "<br><br></span>";
        echo "<span class=\"highigth\">ID Number: " . $user_data['userid'] . "<br><br></span>";
        echo "<span class=\"highigth\">Date of Birth: " . $user_data['dob'] . "<br><br></span>";
        echo "<span class=\"highigth\">Description: <br>" . $description . "<br><br></span>";
        echo "<span class=\"highigth\">Emergency Contact: " . $user_data['contact'] . "<br><br></span>";
        echo "<span class=\"highigth\">Gender: " . $user_data['gender'] . "<br><br></span>";
        echo "<span class=\"highigth\">Nationality: " . $user_data['nationality'] . "<br><br></span>";
        echo "<span class=\"highigth\">Address: <br>" . $user_data['address'] . "<br><br></span>";
        echo "<span class=\"highigth\">Blood Type: " . $user_data['bloodgroup'] . "<br><br></span>";
        echo "<span class=\"highigth\">Age: " . $user_data['age'] . "<br><br></span>";
        echo "<span class=\"highigth\">Grade: " . $user_data['grade'] . " " .$user_data['section'] . "<br><br></span>";
        
        // Display more user details as needed
        echo "</pre>";
    } else {
        // User not found
        echo "User not found";
    }
} else {
    // User ID not provided
    echo "User ID not provided";
}
?>
<?php
    $grade_id= isset($_GET['grade_id']) ? $_GET['grade_id'] : null;
    $class_id= isset($_GET['class_id']) ? $_GET['class_id'] : null;
    $section_id = isset($_GET['section_id']) ? $_GET['section_id'] : null;
?>

<a href="editpage.php?id=<?php echo $user_id;?>&section_id=<?php echo $section_id?>&grade_id=<?php echo $grade_id;?>&class_id=<?php echo $class_id;?>"><button class="button"><b>Edit</b></button></a>
    </div>
    
</body>
</html>
