<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn =  new mysqli('localhost','root','Aamvdog321','school_list');
if ($conn->connect_error){
    die('Connection Failed: '.$conn->connect_error);
}

$sql = "SELECT userid, firstname, lastname, age, grade, dob, contact, description, 
        gender, nationality, address, bloodgroup FROM students"; 
$sql2 = "SELECT classid, grades, sections, teachers FROM classlist";
$result = $conn->query($sql);
$result2 = $conn->query($sql2); 



if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $userid = (int)$row["userid"];
        $firstname = $row["firstname"]; 
        $lastname = $row["lastname"]; 
        $description = $row["description"]; 
        $gender = $row["gender"]; 
        $nationality = $row["nationality"]; 
        $address = $row["address"]; 
        $bloodgroup = $row["bloodgroup"];
        $contact = (int)$row["contact"];
        $age = (int)$row["age"]; 
        $grade = (int)$row["grade"]; 
        $dob = $row["dob"];

        // echo "User ID: " . $userid . "<br>";
        // echo "First Name: " . $firstname . "<br>";
        // echo "Last Name: " . $lastname . "<br>";
        // echo "description: " . $description . "<br>";
        // echo "Gender: " . $gender . "<br>";
        // echo "Nationality: " . $nationality . "<br>";
        // echo "Address: " . $address . "<br>";
        // echo "Blood Group: " . $bloodgroup . "<br>";
        // echo "Contact: " . $contact . "<br>";
        // echo "Age: " . $age . "<br>";
        // echo "Grade: " . $grade . "<br>";
        // echo "Day: " . $day . "<br>";
        // echo "Month: " . $month . "<br>";
        // echo "Year: " . $year . "<br>";
        // echo "<hr>";
    }
} else {
    echo "0 results";
}

?>