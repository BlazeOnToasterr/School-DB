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
    $stmt = $conn->prepare("insert into students(firstname, lastname, age, grade, section, contact, dob,
                            restrictions, gender, nationality, address, bloodgroup) 
                            values(?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssiisissssss", $firstname, $lastname,$age, $grade, $section, $contact, $dob, $restrictions, 
                                     $gender, $nationality, $address, $bloodgroup);
    $stmt->execute();
    echo "Registration Successfull ",$firstname," ",$lastname,"!";
    $stmt->close();
    $conn->close();
}
?>