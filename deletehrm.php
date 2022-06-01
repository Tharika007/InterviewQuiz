<?php
    
    include 'DBConnection.php';

    $conn = OpenCon();
    
    if(isset($_GET['deleteid'])) {
        $id=$_GET['deleteid'];

        $sql = "delete from `admin` where admin_id=$id";
        $result = mysqli_query($conn,$sql);
        if($result) {
            echo "<script>
            alert('Successfully Removed.');
              window.location.href='./SeeHRM.php';
              </script>";
        }
    }else
            echo "<script>
            alert('Error!.');
            window.location.href='./SeeHRM.php';
            </script>";
?>