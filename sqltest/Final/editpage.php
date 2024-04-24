<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connect to MySQL
$conn =  new mysqli('localhost', 'root', 'Aamvdog321', 'school_list');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit'])) {
    $userid = $_POST['userid'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $grade = $_POST['grade'];
    $dob = $_POST['dob'];
    $contact = $_POST['contact'];
    $restrictions = $_POST['restrictions'];
    $gender = $_POST['gender'];
    $nationality = $_POST['nationality'];
    $address = $_POST['address'];
    $bloodgroup = $_POST['bloodgroup'];

    // Update the record in the database
    $sql = "UPDATE students SET 
            firstname='$firstname', 
            lastname='$lastname', 
            age='$age', 
            grade='$grade', 
            dob='$dob',
            contact='$contact', 
            restrictions='$restrictions', 
            gender='$gender', 
            nationality='$nationality', 
            address='$address', 
            bloodgroup='$bloodgroup' 
            WHERE userid='$userid'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Fetch data of the selected record from the database
$userid = isset($_GET['id']) ? $_GET['id'] : null;
$sql = "SELECT * FROM students WHERE userid='$userid'";
$result = $conn->query($sql);

// Check if a record was found
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "No record found";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Database</title>
    <style>
        .center-box {
            width: 1000px;
            height: 1130px;
            background-color: #2a2a2a;
            margin-top: 30px;
            margin-left: 250px;
            align-items: center;
            font-size: x-large;
        }

        .button {
            background-color: rgb(160, 28, 76);
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

        label {
            font-size: 20px;
            color: white;
        }

        input[type="text"],
        input[type="number"],
        select,
        textarea {
            width: 600px;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"],
        input[type="reset"] {
            width: 150px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: rgb(160, 28, 76);
            color: white;
        }

        input[type="reset"] {
            background-color: #ccc;
            color: black;
        }

        textarea {
            width: 600px;
            height: 100px;
        }
    </style>
</head>
<body bgcolor="#111">
    <h1>Edit Student Database Of Class X</h1>
    <a href="userinfo.php?user_id=<?php echo $row['userid']; ?>"><button class="button"><b>Back</b></button></a>
    <hr>
    <div class="center-box">
        <form method="post" action="">
            <br>
            <label for="fname">First name:</label><br>
            <input type="text" id="fname" name="firstname" value="<?php echo $row['firstname']; ?>" required><br><br>

            <label for="lname">Last name:</label><br>
            <input type="text" id="lname" name="lastname" value="<?php echo $row['lastname']; ?>" required><br><br>

            <label for="Age">Age:</label><br>
            <input type="number" id="Age" name="age" value="<?php echo $row['age']; ?>" min="1" max="99" required><br><br>

            <label for="Grade">Grade:</label><br>
            <input type="text" id="Grade" name="grade" value="<?php echo $row['grade']; ?>" required><br><br>

            <label for="Grade">Restrictions:</label><br>
            <input type="text" id="restrictions" name="restrictions" value="<?php echo $row['restrictions']; ?>" required><br><br>

            <label for="Date Of Birth">Date Of Birth:</label><br>
            <input type="date" id="dob" name="dob" value="<?php echo $row['dob']; ?>" required><br><br>

            <label for="Emergency Contact 1">Emergency Contact 1 (Required):</label><br>
            <input type="text" id="Emergency Contact 1" name="contact" value="<?php echo $row['contact']; ?>" required><br><br>
            <label for="address">Address:</label><br>
            <textarea id="address" name="address" required><?php echo $row['address']; ?></textarea><br><br>

            <label>Gender:</label><br>
            <input type="radio" id="male" name="gender" value="male" <?php if($row['gender'] === 'male') echo 'checked'; ?> required>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female" <?php if($row['gender'] === 'female') echo 'checked'; ?> required>
        <label for="female">Female</label><br><br>

            <label for="Nationality">Nationality:</label><br>
            <input type="text" id="Nationality" name="nationality" value="<?php echo $row['nationality']; ?>" required><br><br>

            <label for="Blood-group">Blood Group:</label><br>
            <select id="Blood-group" name="bloodgroup" required>
                <option value="A+" <?php if($row['bloodgroup'] == 'A+') echo 'selected'; ?>>A+</option>
                <option value="A-" <?php if($row['bloodgroup'] == 'A-') echo 'selected'; ?>>A-</option>
                <option value="B+" <?php if($row['bloodgroup'] == 'B+') echo 'selected'; ?>>B+</option>
                <option value="B-" <?php if($row['bloodgroup'] == 'B-') echo 'selected'; ?>>B-</option>
                <option value="AB+" <?php if($row['bloodgroup'] == 'AB+') echo 'selected'; ?>>AB+</option>
                <option value="AB-" <?php if($row['bloodgroup'] == 'AB-') echo 'selected'; ?>>AB-</option>
                <option value="O+" <?php if($row['bloodgroup'] == 'O+') echo 'selected'; ?>>O+</option>
                <option value="O-" <?php if($row['bloodgroup'] == 'O-') echo 'selected'; ?>>O-</option>
            </select><br><br>

            <input type="hidden" name="userid" value="<?php echo $row['userid']; ?>">
            <input type="submit" name="submit" value="Submit" class="button">
        </form>
    </div>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
