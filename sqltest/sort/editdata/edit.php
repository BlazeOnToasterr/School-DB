<?php
$conn =  new mysqli('localhost','root','Aamvdog321','school_list');

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
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];
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
            day='$day', 
            month='$month', 
            year='$year', 
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
$userid = isset($_GET['id']) ? $_GET['id'] : null; // Check if $_GET['id'] is set
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

<form method="post" action="">
    First Name: <input type="text" name="firstname" value="<?php echo $row['firstname']; ?>"><br>
    Last Name: <input type="text" name="lastname" value="<?php echo $row['lastname']; ?>"><br>
    Age: <input type="number" name="age" value="<?php echo $row['age']; ?>"><br>
    Grade: <input type="text" name="grade" value="<?php echo $row['grade']; ?>"><br>
    Day: <input type="number" name="day" value="<?php echo $row['day']; ?>"><br>
    Month: <input type="number" name="month" value="<?php echo $row['month']; ?>"><br>
    Year: <input type="number" name="year" value="<?php echo $row['year']; ?>"><br>
    Contact: <input type="text" name="contact" value="<?php echo $row['contact']; ?>"><br>
    Restrictions: <input type="text" name="restrictions" value="<?php echo $row['restrictions']; ?>"><br>
    Gender: <input type="text" name="gender" value="<?php echo $row['gender']; ?>"><br>
    Nationality: <input type="text" name="nationality" value="<?php echo $row['nationality']; ?>"><br>
    Address: <input type="text" name="address" value="<?php echo $row['address']; ?>"><br>
    Blood Group: <input type="text" name="bloodgroup" value="<?php echo $row['bloodgroup']; ?>"><br>
    <input type="hidden" name="userid" value="<?php echo $row['userid']; ?>">
    <input type="submit" name="submit" value="Submit" onclick="window.location.href = 'localhost/sqltest/registration/transfer.php';">
</form>

<?php
// Close the database connection
$conn->close();
?>
