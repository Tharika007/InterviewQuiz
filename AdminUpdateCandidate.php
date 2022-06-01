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

    if(isset($_POST['updatecandidate'])) 

{
    $pin = $_POST['pin'];
    $candidatename = $_POST['candidatename'];
    $candidatemail = $_POST['candidatemail'];
    $candidatephone = $_POST['candidatephone'];
    $position = $_POST['position'];
    $language = $_POST['languages'];
    $interviewdate = $_POST['interviewdate'];
    $interviewtime = $_POST['interviewtime'];

    $sql = "UPDATE candidatedetails SET pin ='$pin', candidatename='$candidatename', candidatemail = '$candidatemail',
    candidatephone = '$candidatephone', position = '$position', languages ='$language', interviewdate = '$interviewdate',
    interviewtime = '$interviewtime' where id = '$id' ";

    $result = mysqli_query($conn, $sql);

    if($result) 
    {
      echo '<script> alert("Data Saved"); </script>';
      header('Location: seecandidatedetails.php');
    }

    else {

     echo '<script> alert ("Data not Saved"); </script>';
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
     
    <title> Edit Candidates | JWA ONLINE QUESTIONNAIRE </title>

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
          <a href="./AdminDashboard.php" class="active">
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
        <a href="./welcome.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name"> Quiz </span>
          </a>
        </li>
        <li>
          <a href="dashboard.php?q=2">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name"> Scores </span>
          </a>
        </li>
        <li>
          <a href="./AdminAddcandidate.php">
            <i class='bx bx-user' ></i>
            <span class="links_name"> Add Candidates</span>
          </a>
        </li>
        <li>
          <a href="./AdminCandidatesDetails.php">
            <i class='bx bx-list-ol' ></i>
            <span class="links_name"> See Candidates</span>
          </a>
</li>
        <li>
          <a href="./AddHR.php">
            <i class='bx bx-plus' ></i>
            <span class="links_name"> Add HRM Officer </span>
          </a>
        </li>
        <li>
          <a href="./SeeHRM.php">
            <i class='bx bx-book' ></i>
            <span class="links_name"> See HRM Details </span>
          </a>
        </li>
            <!-- <li class="log_out">
            <a href="#">
              <i class='bx bx-log-out'></i>
              <form action="./AdminLogin.php" method="POST">
                <button type="submit" class="links_name" name="logoutbutton"  onclick="logoutalert()">Log out</button>
              </form>
              
              </a>-->
              <li class="log_out">  
          <a href="logout1.php?q=dashboard.php">
            <i class='bx bx-log-out' ></i>
            <span class="links_name"> Logout </span>
      
          </a>
        </li>  
        </li>
      </ul>
  </div>
        
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
         <span class="dashboard"> Edit Candidate </span>
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
          <input name="pin" id="pinfield" value="<?php echo $pin; ?>" readonly/>
        </div>

        <div class="form-group">
          <label for="candidateName" class="label"> Candidate's Name </label>
          <input type="text" name="candidatename" value=<?php echo $candidatename ?> class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">           
        </div>
     
        <div class="form-group">
          <label for="candidateemail" class="label"> Candidate's Email</label>
          <input type="email" name="candidatemail" value=<?php echo $candidatemail ?> class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email">
        </div>

        <div class="form-group">
          <label for="candidateemail" class="label"> Candidate's Phone Number</label>
          <input type="number" name="candidatephone" value=<?php echo $candidatephone ?> class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Phone Number">
        </div>

        <label class="label">  Applied Position </label>
          <select name="position" class="form-select" value=<?php echo $position ?>>
            <option value="trainee"> --Select Position-- </option>
            <option value="trainee"> Trainee Software Engineer </option>
            <option value="junior"> Junior Software Engineer </option>
            <option value="senior"> Senior Software Engineer </option>
        </select>
        
        <br> 

        <label class="label">  Applied for </label>
          <select name="languages" class="form-select" value=<?php echo $language ?>>
            <option value=""> --Select-- </option>
            <option value="react"> React </option>
            <option value="flutter"> Flutter </option>
            <option value="dart"> Dart </option>
            <option value="laravel"> Laravel </option>
            <option value="spring"> Spring </option>
            <option value="Java"> Java </option>
        </select>

        <div class="form-group">
            <label for="candidateemail" class="label"> Interview Date </label>
            <input type="date" name="interviewdate" value=<?php echo $interviewdate ?> class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Canidate Name">
        </div>
        
        <div class="form-group">
            <label for="candidateemail" class="label"> Interview Time </label>
            <input type="time" name="interviewtime" value=<?php echo $interviewtime ?> class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Canidate Name">
        </div>

        <button type="submit" class="btn btn-primary" id="updatebutton" name="updatecandidate"> Update Candidate </button>
       
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

