<?php

function generateRandomPin($length = 25) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$myRandomString = generateRandomPin(10);

include 'DBConnection.php';

    $conn = OpenCon();

    if(isset($_POST['addcandidate']))

{
    $pin = $_POST['pin'];
    $candidatename = $_POST['candidatename'];
    $candidatemail = $_POST['candidatemail'];
    $candidatephone = $_POST['candidatephone'];
    $position = $_POST['position'];
    $language = $_POST['languages'];
    $interviewdate = $_POST['interviewdate'];
    $interviewtime = $_POST['interviewtime'];

    $sql = "INSERT INTO candidatedetails (`pin`, `candidatename`, `candidatemail`, `candidatephone`, `position`, `languages`,`interviewdate`, `interviewtime`) VALUES ('$pin', '$candidatename', '$candidatemail', 
    '$candidatephone', '$position', '$language', '$interviewdate', '$interviewtime')";

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

if(isset($_POST['addcandidate']))

{
    $pin = $_POST['pin'];
    $candidatemail = $_POST['candidatemail'];

    $sql2 = "INSERT INTO user (`email`, `password`) VALUES ('$candidatemail', '$pin')";

    $result = mysqli_query($conn, $sql2);

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
     
    <title> Add Candidate | JWA ONLINE QUESTIONNAIRE </title>

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

        #addcandidatebutton {
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
         <span class="dashboard"> Add Candidates </span>
      </div>
   
      <div class="profile-details">
        <i class='bx bx-user' ></i>
        <span class="admin_name"> HRM </span>

      </div>
    </nav>
<br> <br> <br> <br>  
    <div class="home-content">

        <div class="form-box">

        <form action="#" method="POST">

        <div class="form-group">
          <input name="pin" id="pinfield" value="<?php echo $myRandomString; ?>" readonly/>
        </div>

        <div class="form-group">
          <label for="candidateName" class="label"> Candidate's Name </label>
          <input type="text" name="candidatename" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">           
        </div>
     
        <div class="form-group">
          <label for="candidateemail" class="label"> Candidate's Email</label>
          <input type="email" name="candidatemail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email">
        </div>

        <div class="form-group">
          <label for="candidateemail" class="label"> Candidate's Phone Number</label>
          <input type="number" name="candidatephone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Phone Number">
        </div>

        <label class="label">  Applied Position </label>
          <select name="position" class="form-select">
            <option value="trainee"> --Select Position-- </option>
            <option value="trainee"> Trainee Software Engineer </option>
            <option value="junior"> Junior Software Engineer </option>
            <option value="senior"> Senior Software Engineer </option>
        </select>
        
        <br> 

        <label class="label">  Applied for </label>
        <select name="languages" class="form-select">
            <option value=""> --Select-- </option>
            <option value="react"> JavaScript </option>
            <option value="react"> React </option>
            <option value="flutter"> Flutter </option>
            <option value="dart"> Dart </option>
            <option value="laravel"> Laravel </option>
            <option value="spring"> Spring </option>
            <option value="Java"> Java </option>
        </select>

        <div class="form-group">
            <label for="candidateemail" class="label"> Interview Date </label>
            <input type="date" name="interviewdate" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Canidate Name">
        </div>
        
        <div class="form-group">
            <label for="candidateemail" class="label"> Interview Time </label>
            <input type="time" name="interviewtime" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Canidate Name">
        </div>

        <button type="submit" class="btn btn-primary" id="addcandidatebutton" name="addcandidate"> Add Candidate </button>
       
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

