<?php
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($server, $username, $password);
    if(!$conn){
        die("connection failed" . mysqli_connect_error());
    }
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `trip`.`trip`(`name`, `age`, `gender`, `email`, `phone`, `country`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$country', '$desc', current_timestamp()); ";
    if($conn->query($sql) == true){
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $conn->error";
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Welcome to Singapore Trip</h3>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
        <?php
        // if($insert == true){
        //  echo "<p class='smsg'>Thanks for submitting your form</p>";
        // }
        ?>
        <form action="index.php" method="post">
            <label for="name">Full Name :</label>
            <input type="text" name="name" id="name" placeholder="Enter your full name">
            <br>
            <br>
            <label for="age">Age :</label>
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <br>
            <br>
            <label for="gender">Gender :</label>
            <select name="gender" id="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            <br>
            <br>
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <br>
            <br>
            <label for="phone">Phone No. :</label>
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone no.">
            <br>
            <br>
            <label for="country">Country :</label>
            <input type="text" name="country" id="country" placeholder="Enter your country">
            <br>
            <br>
            <p><label for="desc">Other information</label></p>
            <textarea name="desc" id="desc" cols="30" rows="5" placeholder="Enter any other information here"></textarea>
            <br>
            <br>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>