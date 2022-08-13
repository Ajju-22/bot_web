<?php
    $insert = false;
    if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());

    }
    // echo "Success connecting to the db";

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    

    $sql = "INSERT INTO `trip`.`trip_t` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    //echo $sql;

    if($con->query($sql) == true){
       // echo "Successfully inserted";
       $insert = true;

    }
    else{
        echo "ERROR: $sql <br> $con->error";

    }
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
</head>
<body>
    
    <div class="container">
        <h1>Welcome to IIT Khargpur US Trip form</h1>
        <p>Enter your details and submit this form to confirm your 
        participation in this trip</p>
        <p id="demo">Thanks for submitting your form. We are happy to see you joining for the US trip</p>
        <!--<?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining for the US trip</p>";
        }
        ?>-->
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information"></textarea>
            <button class="btn" onclick="alert('Form submitted.')">Submit</button>
            
        </form>

    </div>
    <script src="index.js"></script>



</body>
</html