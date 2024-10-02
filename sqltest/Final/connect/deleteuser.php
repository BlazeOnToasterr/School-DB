<?php
$conn = new mysqli('localhost', 'root', 'Aamvdog321', 'school_list');

$userid = $_GET['userid'];

$delete = "DELETE FROM students WHERE userid = '$userid'";

if ($conn->query($delete) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
