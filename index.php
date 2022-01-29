<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variable
$server = "localhost";
$username = "root";
$password ="";

// Creat a database connection
$con = mysqli_connect($server, $username, $password);

//Check for connection success
if(!$con){
    die("connection to this database failed due to" . mysqli_connect_error());
}
//echo "success connecting to the db";

// Collect post variables
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];

    $sql = "INSERT INTO `trip`.`trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
//echo $sql;

//Execute the query
if($con->query($sql) == true){
  //  echo "Successfully inserted";
  //Flag for successful insertion
   $insert =true;

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
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <img class="bg" src="bg.jpg" alt="Lucky Travel">
<div class="container">
<h1>Welcome to Lucky Travel Kashmir Trip form</h1>
<p>Enter your deatails and submit this form to confirm your participation in the trip</p> 
<?php
if($insert == true){
 echo "<P class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for Kashmir trip</P>";
}
?>
<form action="index.php" method="post">
    <input type="text" name="name" id="name" placeholder="Enter your name">
    <input type="text" name="age" id="age" placeholder="Enter your age">
    <input type="text" name="gender" id="gender" placeholder="Enter your gender">
    <input type="email" name="email" id="email" placeholder="Enter your email">
    <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
    <textarea name="desc" id="descs" cols="30" rows="10" placeholder="Enter other informtaion here"></textarea>
    <button class="btn">Submit</button>
    
</form>
</div>  

<script src="index.js"></script>
</body>
</body>
</html>
