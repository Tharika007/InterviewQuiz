<?php
    
    include 'DBConnection.php';

    $conn = OpenCon();

    $id = $_GET['updateid'];
    $sql = "select * from `candidatedetails` where id=$id";
    
    $result = mysqli_query($conn, $sql);
    
    $row= mysqli_fetch_assoc($result);

    $pin= $row['pin'];
    $candidatename= $row['candidatename'];
    $candidatemail= $row['candidatemail'];
    $candidatephone= $row['candidatephone'];
    $language= $row['languages'];
    $position= $row['position'];
    $interviewdate= $row['interviewdate'];
    $interviewtime= $row['interviewtime'];

        $from = 'tharika@jwareautomation.com';
        $to = 'tharika.pramodi007@gmail.com'; 
        $mail_subject = 'subject';
        $email_body = "The message blah blah : <br>";
        $email_body .= "Login Credentials {$candidatemail} password {$pin} <br>";
        
    $header = "From: {$from}\r\nContent-Type: text/html;";
    
    $send_mail_result = mail( $to, $mail_subject, $email_body, $header);
        
        if($send_mail_result) {
            echo "<script>
            alert('Message sent');
              window.location.href='./seecandidatedetails.php';
              </script>";
        }
    else {
            echo "<script>
            alert('Error!.');
            window.location.href='./seecandidatedetails.php';
            </script>";

}
CloseCon();
?>