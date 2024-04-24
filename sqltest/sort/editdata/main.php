    <?php
    // Connect to MySQL
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $database = "your_database";

    $conn =  new mysqli('localhost','root','Aamvdog321','school_list');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch data from MySQL table
    $sql = "SELECT * FROM students";
    $result = $conn->query($sql);

    // Display data in HTML table
    echo "<table border='1'>
    <tr>
    <th>User ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Action</th>
    </tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['userid'] . "</td>";
        echo "<td>" . $row['firstname'] . "</td>";
        echo "<td>" . $row['lastname'] . "</td>";
        echo "<td><a href='edit.php?id=" . $row['userid'] . "'>Edit</a></td>";
        echo "</tr>";
    }
    echo "</table>";

    $conn->close();
    ?>


