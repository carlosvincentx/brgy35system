<?php
require_once('Auth.php');
require_once('MainClass.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/indexstyle.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href = "./img/brgylogo.png">
    <title>Barangay 35 | Settings</title>
   </head>

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
      <i class='bx bx-log-out' id="log_out" onClick="Javascript:window.location.href = 'http://localhost/brgy/brgy/logout.php'"></i>
    </div>
  </li>
</ul>
  </div>
  
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Barangay 35, Zone 3, District 1, Tondo, Manila</span>
    </div>
    <b>Account<b>
    <div id="container">
		<div id="left-nav">
				<div class="clip1">
				<a href="updatephoto.php" title="Change Profile Picture"><img src="<?php echo $row['profile_picture'] ?>"><button>Update Picture</button></a>
				</div>
				<div class="user-details">

				</div>
		</div>
 
		<div id="right-nav">
			<h1>Personal Info</h1>
			<hr />
			<br />
			
</div>
    <div class='info-user'>
				<div>
				  <label>Firstname:</label>&nbsp;&nbsp;&nbsp;<b></b>
				 </div>
				<hr /> 		
				 <br /> 	
				 <div>
				 <label>Lastname:</label>&nbsp;&nbsp;&nbsp;&nbsp;<b></b>
				 </div>
				 <hr /> 
				<br /> 	
				  <div>
			  <label>Username:</label>&nbsp;&nbsp;&nbsp;<b></b>
				 </div> 
				 <hr />	
				 <br /> 		
			 <div>
				  <label>Birthday:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b></b>
				 </div> 
				<hr /> 	
				<br /> 		
				 <div>
			  <label>Gender:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b></b>
				 </div>
			 <hr /> 
				 <br /> 	
				  <div>
			  <label>Number:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b></b>
				 </div> 
				 <hr /> 	
				<br /> 	
				 </div> 
				<br /> 		
				  <div class='edit-info'>
				 <a><button>Edit Profile</button></a>
				 </div> 
			<br /> 	
				<br /> 
	</div>
  
  
  
  
  
  
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