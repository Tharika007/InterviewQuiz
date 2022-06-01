<?php

include 'DBConnection.php';

    $conn = OpenCon();

    $id = $_GET['updateid'];

    $sql = "select * from `admin` where admin_id=$id";
    
    $result = mysqli_query($conn, $sql);

    $row= mysqli_fetch_assoc($result);

    $hrmemail= $row['email'];
    $hrmname= $row['hrmname'];
  
    if(isset($_POST['updatehrm'])) 

{
   
    $hrmemail = $_POST['email'];
    $hrmname = $_POST['hrmname'];

    $sql = "UPDATE admin SET email='$hrmemail' , hrmname ='$hrmname' WHERE admin_id= '$id' ";

    $result = mysqli_query($conn, $sql);

    if($result) 
    {
      echo '<script> alert("Data Updated."); </script>';
      header('Location: SeeHRM.php');
    }

    else {

     echo '<script> alert ("Data not Updated"); </script>';

    }
}

    CloseCon($conn);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
 
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/Candidates.css">

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     
    <title> Edit Candidates </title>

     <style>
         
         .form-box {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;           
         }

         .label {
           font-weight: bold;
           font-family: arial;

         }

        .form-select {
          margin-bottom: 15px;
          width: 100%;
          height: 40px;
          font-family: arial;
          
        }

        .form-control {
          font-family: arial;
          margin-bottom: 10px;
        }

        .form-box form {
          font-family: arial;
          width: 700px;
          border-radius: 20px;
          box-shadow: 0 4px 8px 0 rgba(0,0,0, 0.2), 0 6px 20px 0 rgba(0,0,0,19);
          padding: 60px;
        }

        #pinfield {
          border: none;
          width: 100%;
          font-size: 30px;
          font-weight: bold;
          background: transparent;
          justify-content: center;
          align-items: center;
          text-align: center;
        }

        #updatebutton {
          float: right;
          margin-top: 10px;
        }
      
     </style>
</head>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <img src="./images/JMW-White-logo.png" width="70" height="70" alt="">
      <span class="logo_name"> JWA </span>
    </div>
    
      <ul class="nav-links">
        <li>
          <a href="./CommonDashboard.php" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="./index.html">
            <i class='bx bx-home' ></i>
            <span class="links_name"> Home</span>
          </a>
        </li>
        <li>
          <a href="./Addcandidate.php">
            <i class='bx bx-user' ></i>
            <span class="links_name"> Add Candidates</span>
          </a>
        </li>
        <li>
          <a href="./seecandidatedetails.php">
            <i class='bx bx-book' ></i>
            <span class="links_name"> See Candidates</span>
          </a>
        </li>
        <li>
          <a href="./welcome.php">
            <i class='bx bx-user' ></i>
            <span class="links_name"> Quiz </span>      
          </a>
        </li>
        <li>
          <a href="dashboard.php?q=2">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name"> Scores </span>
          </a>
        </li>
        <li class="log_out">
            <a href="#">
              <i class='bx bx-log-out'></i>
              <form action="./AdminLogin.php" method="POST">
                <button type="submit" class="links_name" name="logoutbutton"  onclick="logoutalert()">Log out</button>
              </form>
             
              </a>
          </li>
      </ul>
  </div>
        
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
         <span class="dashboard"> Update HRM Officer </span>
      </div>
   
      <div class="profile-details">
        <i class='bx bx-user' ></i>
        <span class="admin_name"> Admin </span>

      </div>
    </nav>

    <div class="home-content">

        <div class="form-box">

        <form action="#" method="POST">

        <div class="form-group">
          <label for="hrmname" class="label"> Name </label>
          <input type="text" name="hrmname" value=<?php echo $hrmname ?> class="form-control" aria-describedby="emailHelp1" placeholder="Name">           
        </div>
     
        <div class="form-group">
          <label for="hrmemail" class="label"> Email</label>
          <input type="email" name="email" value=<?php echo $hrmemail ?> class="form-control" aria-describedby="emailHelp" placeholder="Email">
        </div>

        <button type="submit" class="btn btn-primary" id="updatebutton" name="updatehrm"> Update HRM </button>
        
      </form>
    </div>
  </div>
</section>

<script>
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".sidebarBtn");
      sidebarBtn.onclick = function() {
      sidebar.classList.toggle("active");
      if(sidebar.classList.contains("active")){
      sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
    }else
      sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
    </script>

</body>
</html>

