<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "quizApp";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
} else {
   echo "Connected successfully";
}

if(isset($_POST['savecandidate']))

$userName = $_POST('$userName');
$email = $_POST('$email');

$query = "INSERT INTO candidates ('userName', 'email') VaLUES ('$userName','$email')";
$query_run = mysqli_query($connection, $query);

if($query_run)
{
   echo '<script> alert("Data Saved"); </script>';
   header('Location: Rules.html');
}
else {
   echo '<script> alert ("Data not Saved"); </script>';
}

?>