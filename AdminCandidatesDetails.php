<?php
    
    include 'DBConnection.php';

    $conn = OpenCon();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
 
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/Candidates.css">

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title> Candidates Details | JWA ONLINE QUESTIONNAIRE  </title>

     <style>
         
        th {     
        background-color: #393E46;
        color: white;
        padding: 15px;
        text-align: center;
        border:1px solid black;
        border-collapse: collapse;
        font-size: 1.3rem;
        font-family: arial;
        }
        
        tr:hover {
            background-color: white;
        }
        
        td {
        background-color: #222831;        
        padding: 15px;
        text-align: center;
        border:1px solid black;
        border-collapse: collapse;
        font-size: 1.2rem;
        font-family: arial;
        }

        .addexam {
          display: inline-block;
          background-color: blue; 
          font-weight: bold;
          border: black;
          border-radius: 10px;
          color: white;
          text-align: center;
          text-decoration: none;
          font-size: 17px;
          padding: 12px 25px;
          cursor: pointer;
        }

        .table {
        width:100%;
        border:1px solid black;
        border-collapse: collapse;
        background-color: #1B1717;
        color:white;
        font-family: arial;
        }

        .home-content .btnentercandidate {
          float: right;
          margin-right: 50px;
          margin-bottom: 30px;

        }
        
        a:link {
        text-decoration: none;
        color: white;
        }
       
        #entercandidate {  
          background-color: green; 
          font-weight: bold;
          border: black;
          border-radius: 10px;
          color: white;
          text-align: center;
          text-decoration: none;
          font-size: 17px;
          padding: 20px;
          cursor: pointer;
        }

        .editbutton {
          background-color: green; 
          font-weight: bold;
          border: black;
          border-radius: 10px;
          color: white;
          text-align: center;
          text-decoration: none;
          font-size: 17px;
          padding: 12px 25px;
          cursor: pointer;
        }

        .deletebutton {
          background-color: red; 
          font-weight: bold;
          border: black;
          border-radius: 10px;
          color: white;
          text-align: center;
          text-decoration: none;
          font-size: 17px;
          padding: 12px 25px;
          cursor: pointer;
        }

        .sentemail {
          display: inline-block;
          background-color: yellow; 
          font-weight: bold;
          border: black;
          border-radius: 10px;
          color: white;
          text-align: center;
          text-decoration: none;
          font-size: 17px;
          padding: 12px 25px;
          cursor: pointer;
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
         <span class="dashboard"> Candidates Details </span>
      </div>
   
      <div class="profile-details">
        <i class='bx bx-user' ></i>
        <span class="admin_name"> Admin </span>

      </div>
    </nav>
<br> <br> <br> <br> <br>
    <div class="home-content">
 
        <table class="table">
       
            <tr>
                <th> ID </th>
                <th> PIN </th>
                <th> Candidate Name </th>
                <th> Candidate Email </th>
                <th> Candidate Phone </th>
                <th> Laguage </th>
                <th> Position </th>
                <th> Interview Date </th>
                <th> Interview Time </th>
                <th> Edit </th>
                <th> Delete </th>
                <th> Add to Exam </th>
                <th> Sent Email </th>
            </tr>
        
        <?php
        $sql = "SELECT * FROM `candidatedetails`";
        $result = mysqli_query($conn, $sql);
        if($result) {    
        while($row = mysqli_fetch_assoc($result)) {
              $id= $row['id'];
              $pin= $row['pin'];
              $candidatename= $row['candidatename'];
              $candidatemail= $row['candidatemail'];
              $candidatephone= $row['candidatephone'];
              $language= $row['languages'];
              $position= $row['position'];
              $interviewdate= $row['interviewdate'];
              $interviewtime= $row['interviewtime'];
      
         echo '<tr>
                <td> '.$id.' </td>
                <td> '.$pin.' </td>
                <td> '.$candidatename.' </td>
                <td> '.$candidatemail.' </td>
                <td> '.$candidatephone.' </td>
                <td> '.$language.' </td>
                <td> '.$position.' </td>
                <td> '.$interviewdate.' </td>
                <td> '.$interviewtime.' </td>
                <td> <button class="editbutton"> <a href ="./Updatecandidate.php?updateid='.$id.'">  Edit </a></button>
                <td> <button class="deletebutton"> <a href ="./Deletecandidate.php?deleteid='.$id.' "> Delete </a></button>
                <td> <button class="addexam"> <a href ="./AdminAddExam.php?examid='.$id.' "> Add&nbsp;to&nbsp;Exam </a></button>
                <td> <button class="sentemail" id="sendemail"> <a href ="./mail.php?mailid='.$id.' "> Send&nbsp;Email </a></button>

            </tr> 
            ';     
    
        }
      }
      
          else
          {
              echo "<script>
              alert('No Record Found.');
              window.location.href='Candidates.php';
              </script>";
          }

          CloseCon($conn);

          ?>
          
        </table>
        </div>
      </div>

      <script type="text/javascript">
      document.getElementById("entercandidate").onclick = function () {
      location.href = "./dashboard.php?q=1";
      
      };
      </script>

      <script type="text/javascript">
      document.getElementById("editbutton").onclick = function () {
      location.href = "./Updatecandidate.php";
      };
      <script>

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

