<?php
$insert = false;
if(isset($_POST['name'])){
    $submit = true;
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `desc`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";
        $insert = true;
        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img src="1.jpg" class="bg" alt="">
    <div class="container">
        <h1>Welcome to IIT Kanpur Us trip </h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
       
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining for the Us trip</p>";
        }
        ?>
        <u>
            <h3>Please Fill the Form</h3>
        </u>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="text" name="email" id="email" placeholder="Enter your email">
            <!-- <input type="text" name="section" id="section" placeholder="Enter your section"> -->
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10"
                placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
            <!-- <button class="btn">Reset</button> -->
        </form>
    </div>
    <script src="index.js"></script>
    <!-- INSERT INTO `trip` (`sno`, `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('1', 'textarea', '18',
    'male', 'this@this.com', '1234567890', 'hello everyone', '2022-02-01 03:53:31.000000'); -->
</body>

</html>

