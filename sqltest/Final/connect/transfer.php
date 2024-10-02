<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

print_r($_POST);
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$grade = $_POST['grade'];
$section = $_POST['section'];
$age = $_POST['age'];
$dob = $_POST['dob'];
$contact = $_POST['contact'];
$description = $_POST['description'];
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
                description, gender, nationality, address, bloodgroup, classid) 
                values(?,?,?,?,?,?,?,?,?,?,?,?,?)");
                $stmt->bind_param("ssiisissssssi", $firstname, $lastname,$age, $grade, $section, $contact, $dob, $description, 
                         $gender, $nationality, $address, $bloodgroup, $classid);
                $stmt->execute();
            }
        }
    } else {
        echo "0 results";
    }

    echo "Registration Successfull ",$firstname," ",$lastname,"!";
    
    $sql2 = "SELECT userid FROM students ORDER BY userid DESC LIMIT 1"; 
    $result2 = $conn->query($sql2);

    if ($result2->num_rows > 0) {
        $row2 = $result2->fetch_assoc();
        $userid = $row2['userid'];
        
        header("Location: ../userinfo.php?user_id=" . $userid . "&class_id=" . $classid . "&grade_id=" . $grades . "&section_id=" . $section);
    } else {
        echo "No records found";
    }

    
    

    $stmt->close();
    $conn->close();
}


?>