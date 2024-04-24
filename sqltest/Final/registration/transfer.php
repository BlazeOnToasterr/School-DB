<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$grade = $_POST['grade'];
$section = $_POST['section'];
$age = $_POST['age'];
$dob = $_POST['dob'];
$contact = $_POST['contact'];
$restrictions = $_POST['restrictions'];
$gender = $_POST['gender'];
$nationality = $_POST['nationality'];
$address = $_POST['address'];   
$bloodgroup = $_POST['bloodgroup'];

$conn =  new mysqli('localhost','root','Aamvdog321','school_list');
if ($conn->connect_error){
    die('Connection Failed: '.$conn->connect_error);
}
else {
    $sql = "SELECT classid, grades, sections FROM classlist"; 
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $classid = (int)$row["classid"]; 
            $grades = (int)$row["grades"];
            $sections = $row['sections'];
            
            if ($grade==$grades and $section==$sections) {
                $stmt = $conn->prepare("insert into students(firstname, lastname, age, grade, section, contact, dob,
                restrictions, gender, nationality, address, bloodgroup, classid) 
                values(?,?,?,?,?,?,?,?,?,?,?,?,?)");
                $stmt->bind_param("ssiisissssssi", $firstname, $lastname,$age, $grade, $section, $contact, $dob, $restrictions, 
                         $gender, $nationality, $address, $bloodgroup, $classid);
                $stmt->execute();
            }
        }
    } else {
        echo "0 results";
    }

    echo "Registration Successfull ",$firstname," ",$lastname,"!";
    $stmt->close();
    $conn->close();
}


?>