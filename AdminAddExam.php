<?php

include 'DBConnection.php';

$conn = OpenCon();

    $id = $_GET['examid'];
    $sql1 = "select * from `candidatedetails` where id=$id";
    
    $result1 = mysqli_query($conn, $sql1);

    $row= mysqli_fetch_assoc($result1);

    $pin= $row['pin'];
    $candidatemail= $row['candidatemail'];
    
    $sql = "INSERT INTO user (`email`, `password`) VALUES ('$candidatemail', '$pin')";

    $result = mysqli_query($conn, $sql);

    if($result) 
    {
      echo '<script> alert("Sucessfully added to the exam."); 
      window.location = "AdminCandidatesDetails.php";
      </script>';
    }

    else {
     echo '<script> alert ("User with useremail '.$candidatemail.' is already added."); 
     window.location = "AdminCandidatesDetails.php";
     </script>';
    }

 CloseCon($conn);

 ?>
