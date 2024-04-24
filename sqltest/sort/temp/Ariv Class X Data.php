<!DOCTYPE html>

<html>
<head>

    <title>Ariv Gupta Class X - Student Data</title>

    <style>
        .container {
            display: flex;
            column-gap: 20px;
            margin-top: 20px;
            margin-left: 190px;
        }
        
        .box1 {
            width: 200px;
            height: 200px;
        }

        .box2 {
            width: 200px;
            height: 200px;
        }
        .box3 {
            width: 200px;
            height: 200px;
        }
        .box4 {
            width: 200px;
            height: 200px;
        }

        .center-box{
        background-color: #3b3b3b;
        }

        .info-box{
        width: 800px;
        height: 1225px;
        background-color: #2a2a2a;
        margin-top: 100px;
        margin-left: 330px;
        font-size: x-large;
    }

    .button {
        background-color: rgb(160,28,76);
        color: rgb(255, 255, 255);
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

    </style>

</head>
<body class="center-box">
    
    <h1>Ariv Gupta</h1>
    <h2>Class 10<small>th </small>- C &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="main page.html"><button class="button"><b>Back</b></button></a></h2>
    <hr>    
        
    <div class="container">

        <div class="box1"> <img src="lol/SON .png" width="200" height="200"><h2>Student Facial Profile</h2></div>

        <div class="box2"> <img src="lol/PAPA .png" width="200" height="200"><h2>Student Father</h2></div>

        <div class="box3"> <img src="lol/MOM .png" width="200" height="200"><h2>Student Mother</h2></div>

        <div class="box4"> <img src=lol/QR.png width="200" heigth="200"><h2>Student Aadhaar Card</h2></div>
        
        <div class="box4"> <img src=lol/QR.png width="200" heigth="200"><h2>Student Birth Cirtificate</h2></div>

    </div>
    
    <div class = "info-box">
        <?php include 'recieve.php'; ?>
        
        <pre style="font-family: Arial, Helvetica, sans-serif;">
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

           <a href="Edit Page.html"><button class="button"><b>Edit</b></button></a>

        </pre>

    <div class="container">
    
    </div>
    
</body>
</html>
