<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Boxes</title>
<style>
    .container {
        display: flex;
        column-gap: 20px;
        margin-top: 20px;
        margin-left: 196px;
    }
    
    .box {
        width: 200px;
        height: 200px;
        background-color: #ccc;
        margin-bottom: 20px;
    }

    .big-box {
        width: 1080px;
        height: 1300px;
        background-color: #ddd;
        margin-left: 196px;
        margin-top: 110px;
        font-family: Arial, Helvetica, sans-serif;
    }
    
    .heading {
        width: 2000px;
        height: 100px;
        background-color: #a01c4c;
        font-size: xx-large;
        margin-top: -35px;
        margin-left: -10px;
    }

    /* .highigth {
        Define your styles here } 
        */

    .Table {
        height: 300px;
        width: 1080px;
        font-size: larger;
        margin-left: 196px;
    }

</style>
</head>
<body>

<div class="heading">
    <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Student Data</h1>
</div>

<!-- <hr> -->

<div class="container">
    <div class="box"><img src="lol/SON.jpg" width="200px" height="200"><h1>Student Profile</h1></div>
    <div class="box"><img src="lol/PAPA.jpg"width="200px" height="200"><h1>Student Father</h1></div>
    <div class="box"><img src="lol/MOM.jpg"width="200px" height="200"><h1>Student Mother</h1></div>
    <div class="box"><img src="lol/QR.jpg" width="200px" height="200"><h1>Student Aadhaar </h1></div>
    <div class="box"><img src="lol/QR2.jpg"width="200px" height="200"><h1>Student Birth Certificate</h1></div>
</div>

<div class="big-box">
    <?php
        include 'recieve.php';
    ?>
    <pre style="font-size: 20px;">
        <b>
            <span class="highigth">Name: <?php echo $firstname . ' ' . $lastname; ?><br></span>
            <span class="highigth">ID Number: <?php echo $userid; ?><br></span>
            <span class="highigth">Date of Birth: <?php echo $day . '/' . $month . '/' . $year; ?><br></span>
            <span class="highigth">Restrictions: <?php echo $restrictions; ?><br></span>
            <span class="highigth">Emergency Contact: <?php echo $contact; ?><br></span>
            <span class="highigth">Gender: <?php echo $gender; ?><br></span>
            <span class="highigth">Nationality: <?php echo $nationality; ?><br></span>
            <span class="highigth">Address: <?php echo $address; ?><br></span>
            <span class="highigth">Blood Type: <?php echo $bloodgroup; ?><br></span>
            <span class="highigth">Age: <?php echo $age; ?><br></span>
            <span class="highigth">Grade: <?php echo $grade; ?><br></span>
        </b>
    </pre>
</div>

<!-- <table class="Table">
    <tr bgcolor="grey" align="center">
        <th width="154px" height="30px">Monday</th>
        <th width="154px" height="70px">Tuesday</th>
        <th width="154px" height="70px">Wednesday</th>
        <th width="154px" height="70px">Thursday</th>
        <th width="154px" height="70px">Friday</th>
        <th width="154px" height="70px">Saturday</th>
        <th width="154px" height="70px">Sunday</th>
    </tr>
    <tr bgcolor="grey" align="center">
        <td>✅</td><td>✅</td><td>✅</td><td>✅</td><td>✅</td><td>✅</td><td>✅</td>
    </tr>
</table> -->

</body>
</html>
