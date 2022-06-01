<?php 

include 'DBConnection.php';

    $conn = OpenCon();

    if(isset($_GET['mailid'])) {
        $id=$_GET['mailid'];

    $sql = "SELECT * FROM `candidatedetails` where id=$id";
    $result = mysqli_query($conn, $sql);
    if($result) {    
    while($row = mysqli_fetch_assoc($result)) {
          $pin = $row['pin'];
          $candidatename= $row['candidatename'];
          $candidatemail= $row['candidatemail'];
          $position= $row['position'];
          $interviewdate= $row['interviewdate'];
          $interviewtime= $row['interviewtime'];
    }
    }
}
    $to = "{$candidatemail}";
    $subject = "Subject";
    $headers = "From: demo52291@gmail.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $message = '<html><body>';
    $message .= '<p class="mailbody"> ';
    $message .= "<br> your Login credentials email {$candidatemail} and password {$pin}</p>";
    $message .= "<br> date {$interviewdate} time {$interviewtime}";
    $message .= "";
    $message .= "";
    $message .= "";
    $message .= "";
    $message .= "";
    $message .= "</body></html>";

    if(mail($to,$subject,$message,$headers))
    {
        echo "<script>
        alert('Message Sent Succesfully to $candidatemail');
        window.location.href='./AdminCandidatesDetails.php';
        </script>";
    }
    else{
        echo "<script>
        alert('Message Not Sent Succesfully.');
        window.location.href='./AdminCandidatesDetails.php';
        </script>";   
    }

    CloseCon($conn);

?>

