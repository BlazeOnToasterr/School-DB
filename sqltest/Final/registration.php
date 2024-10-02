<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        /* Your CSS styles here */
        body {
            background-color: #111;
            color: white;
            font-family: Arial, sans-serif;
        }

        h2 {
            text-align: center;
        }

        form {
            width: 800px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="number"],
        select,
        textarea {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: white;
        }

        input[type="radio"] {
            margin-right: 10px;
        }

        input[type="submit"] {
            background-color: rgb(160,28,76);
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 20px;
            cursor: pointer;
            border-radius: 10px;
            font-family: Arial, Helvetica, sans-serif;
        }

        input[type="submit"]:hover {
            background-color: rgb(140, 24, 66);
        }

        .date-inputs {
            display: inline-flex;
            gap: 5px; 
        }
        
        .button {
            background-color: rgb(160,28,76);
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

        .dark-theme {
            background-color: #333; /* Dark background color */
            color: #fff; /* Light text color */
            border: 1px solid #555; /* Border color */
            border-radius: 5px; /* Rounded corners */
            padding: 5px; /* Padding */
            width: 200px; /* Optional: Set width */
        }

        input[type="radio"] {
            margin-right: 10px;
}

        label[for="male"],
        label[for="female"] {
            display: inline-block;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <h2>Registration Form</h2>
    <a href="index.php"><button class="button"><b>Back</b></button></a>
    <form action="connect/transfer.php" method="POST">
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" required>
        
        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" required>
        
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required>
        
        <label for="grade">Grade:</label>
        <select id="grade" name="grade" required>
        <?php
            $conn = new mysqli('localhost', 'root', 'Aamvdog321', 'school_list');
            $sql = "SELECT grades FROM classlist";
            $result = $conn->query($sql);
            $classes = array();
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    if (!in_array($row["grades"], $classes)) { // Check if the grade is not already in $classes
                        array_push($classes, $row['grades']);
                        echo "<option value='" . $row["grades"] . "'>" . $row["grades"] . "</option>";
                    }
                    
                    }
                }
            else {
                echo "<option value=''>No options available</option>";
            }
        ?>
        </select>

        <label for="section">Section:</label>
        <select id="section" name="section" required>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
        </select>
        
        <label for="dob">Date Of Birth:</label>
        <input type="date" name="dob" id="dob" max="31/12/2024" required class="dark-theme">
        <br><br>
        
        <label for="contact">Emergency Contact:</label>
        <input type="number" id="contact" name="contact" required>
        
        <label for="description">Description (ignore if not necessary):</label>
        <textarea id="description" name="description" rows="6" cols="50"></textarea>
        
        <label for="gender">Gender: </label> 
        <input type="radio" id="male" name="gender" value="male" required><label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female" required><label for="female">Female</label>

        <label for="nationality">Nationality:</label>
        <input type="text" id="nationality" name="nationality" required>

        <label for="address">Address:</label>
        <textarea id="address" name="address" rows="4" cols="50" required></textarea>

        <label for="bloodgroup">Blood Group:</label>
        <select id="bloodgroup" name="bloodgroup" required>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
        </select>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
