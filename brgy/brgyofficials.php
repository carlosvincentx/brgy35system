<?php
require_once('Auth.php');
require_once('MainClass.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/indexstyle.css">
  <link rel="stylesheet" href="./assets/css/bootstrap.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel = "icon" href = "./img/brgylogo.png">
  <title>Barangay 35 | Brgy Officials</title>
</head>

<style>
  .editable{
    display:none;
  }
</style>


<body>
  <div class="sidebar close">
    <div class="logo-details">
      <i><img src = "img/brgylogo.png" height="120%" width="85%"></i>
      <span class="logo_name"> Welcome, <?= ucwords($_SESSION['username']) ?></span>
    </div>

    <ul class="nav-links">
      <li>
        <a href="#">
          <i class='bx bx-pie-chart-alt-2' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Dashboard</a></li>
        </ul>
      </li>

      <li>
        <div class="iocn-link">
          <a href="http://localhost/brgy/rbi.php">
            <i class='bx bx-data' ></i>
            <span class="link_name">Database</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="http://localhost/brgy/rbi.php">Database</a></li>
          <li><a href="http://localhost/brgy/rbi.php">RBI</a></li>
          <li><a href="http://localhost/brgy/brgyofficials.php">Barangay Officials</a></li>
        </ul>
      </li>

      <li>
        <div class="iocn-link">
          <a href="http://localhost/brgy/event_announcements.php">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Announce</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="http://localhost/brgy/event_announcements.php">Announce</a></li>
          <li><a href="http://localhost/brgy/event_announcements.php">Events</a></li>
          <li><a href="http://localhost/brgy/resident_announcements.php">Residents</a></li>
          <li><a href="http://localhost/brgy/brgy-official_announcements.php">Barangay Officials</a></li>
        </ul>
      </li>

      <li>
        <a href="#">
          <i class='bx bx-time-five' ></i>
          <span class="link_name">Time</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Time</a></li>
        </ul>
      </li>

      <li>
        <a href="#">
          <i class='bx bx-line-chart' ></i>
          <span class="link_name">Reports</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Reports</a></li>
        </ul>
      </li>
      
      <li>
        <div class="iocn-link">
          <a href="http://localhost/brgy/account.php">
            <i class='bx bx-cog' ></i>
            <span class="link_name">Settings</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="http://localhost/brgy/account.php">Settings</a></li>
          <li><a href="http://localhost/brgy/account.php">Account</a></li>
          <li><a href="http://localhost/brgy/theme.php">Theme</a></li>
          <li><a href="http://localhost/brgy/language.php">Language</a></li>
        </ul>
      </li>

      <li>
    <div class="profile-details">
      <div class="profile-content">
      </div>
      <div class="name-job">
        <div class="profile_name">Administrator</div>
        <div class="job">Secretary</div>
      </div>
      <i class='bx bx-log-out' id="log_out" onClick="Javascript:window.location.href = 'http://localhost/brgy/logout.php'"></i>
    </div>
  </li>
</ul>
  </div>


  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Barangay 35, Zone 3, District 1, Tondo, Manila</span>
      </div>


  <div class ="container my-5 text-center">
    <h2>Record of Barangay Officials</h2>
    <br>
    <table class = "table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Position</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Date of Employment</th>
                <th>Date Registered</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "brgy_db";

            // Creates connection
            $connection = new mysqli($servername, $username, $password, $database);
            
            // Checks connection
            if ($connection->connect_error){
                die("Connection failed: " . $connection->connect_error);
            }

            // Read all row from database table
            $sql = "SELECT * FROM brgyofficials";
            $result = $connection->query($sql);

            if (!$result) {
                die("Invalid query: " . $connection->error);
            }

            // Read Data of each row
            while($row = $result->fetch_assoc()){    
                echo "
                <tr>
                <td>$row[id]</td>
                <td>$row[position]</td>
                <td>$row[name]</td>
                <td>$row[contact]</td>
                <td>$row[address]</td>
                <td>$row[date_employment]</td>
                <td>$row[date_registered]</td> 
                <td>
                    <a class ='btn btn-primary btn-sm' href='/brgy/edit_bofficials.php?id=$row[id]'>Edit</a>
                    <a class ='btn btn-danger btn-sm' href='/brgy/delete_bofficials.php?id=$row[id]'>Delete</a>
                </td>
            </tr>
                ";
            }
            ?>
        </tbody>
    </table>
	<a class = "btn btn-primary" href="/brgy/create_bofficials.php" role = "button">Add Barangay Official</a>
  </section>

  <script>
  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
   let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
   arrowParent.classList.toggle("showMenu");
    });
  }
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".bx-menu");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });
  </script>
</body>
</html>