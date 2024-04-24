<!DOCTYPE html>

<html>
    <head>
        <title>Students Table</title>

            <style>
                table {
                    border-collapse: collapse;
                    width: 100%;
                }
                th, td {
                    border: 1px solid #dddddd;
                    text-align: left;
                    padding: 8px;
                }
                th {
                    background-color: #f2f2f2;
                }
            </style>
    </head>
    
    <body>
        <table>
            <tr>
                <th>User ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Grade</th>
                <th>Date Of Birth</th>
                <th>Contact</th>
                <th>Restrictions</th>
                <th>Gender</th>
                <th>Nationality</th>
                <th>Address</th>
                <th>Blood Group</th>
            </tr>

            <?php
            $conn =  new mysqli('localhost','root','Aamvdog321','school_list');

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM students";
            $result = $conn->query($sql);

            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["userid"]."</td>";
                echo "<td>".$row["firstname"]."</td>";
                echo "<td>".$row["lastname"]."</td>";
                echo "<td>".$row["age"]."</td>";
                echo "<td>".$row["grade"]."</td>";
                echo "<td>".$row["day"],"/",$row["month"],"/",$row["year"]."</td>";
                echo "<td>".$row["contact"]."</td>";
                echo "<td>".$row["restrictions"]."</td>";
                echo "<td>".$row["gender"]."</td>";
                echo "<td>".$row["nationality"]."</td>";
                echo "<td>".$row["Address"]."</td>";
                echo "<td>".$row["bloodgroup"]."</td>";
                echo "</tr>";
            }

            $conn->close();
            ?>

        </table>
    </body>
</html>