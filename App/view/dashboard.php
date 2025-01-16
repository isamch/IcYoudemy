<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Youdemy | Dashboard</title>

  <link href='https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet" />
  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet" />

  <link rel="stylesheet" href="../../public/assets/styles/dashboard.css">
</head>

<body id="body-pd">

  <header class="header" id="header">
    <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>

    <div class="navbar navbar-expand-lg navbar-light bg-light border-bottom py-2">
      <div class="container-fluid">
        <ul class="navbar-nav mx-auto d-none d-lg-flex">
          <li class="nav-item me-4">
            <a class="nav-link" href="/Youdemy/public/index.php/home">Home</a>
          </li>
          <li class="nav-item me-4">
            <a class="nav-link" href="/Youdemy/public/index.php/courses">Courses</a>
          </li>
          <li class="nav-item me-4">
            <a class="nav-link active" href="/Youdemy/public/index.php/dashboard">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/Youdemy/public/index.php/profile">Profile</a>
          </li>
      </div>
    </div>

    <span></span>
  </header>



      
  <?php include_once "includes/sections/alerts-messages.php";?>


  
  <div class="l-navbar" id="nav-bar">
    <nav class="nav">
      <div>
        <a href="/Youdemy/public/index.php/home" class="nav_logo">
          <i class='bx bx-layer nav_logo-icon'></i>
          <span class="nav_logo-name">Home</span>
        </a>
        <div class="nav_list">
          <a href="/Youdemy/public/index.php/dashboard" class="nav_link <?php echo (isset($_GET['section']) && $_GET['section'] == 'coursesdashboard' || !isset($_GET['section'])) ? ' active' : ''; ?>">
            <i class="fa-solid fa-book"></i>
            <span class="nav_name">Courses</span>
          </a>

          <?php if ($_SESSION['user']['Role'] == 'admin'): ?>

            <a href="/Youdemy/public/index.php/dashboard?section=categorydashboard" class="nav_link <?php echo (isset($_GET['section']) && $_GET['section'] == 'categorydashboard') ? ' active' : ''; ?>">
              <i class='bx bx-category nav_logo-icon'></i>
              <span class="nav_name">Category</span>
            </a>

            <a href="/Youdemy/public/index.php/dashboard?section=userdashboard" class="nav_link <?php echo (isset($_GET['section']) && $_GET['section'] == 'userdashboard') ? ' active' : ''; ?>">
              <i class='bx bx-user nav_logo-icon'></i>
              <span class="nav_name">Users</span>
            </a>
          <?php endif; ?>
        </div>
      </div>
      <a href="/Youdemy/public/index.php/logout" class="nav_link">
        <i class='bx bx-log-out nav_icon'></i>
        <span class="nav_name">SignOut</span>
      </a>
    </nav>
  </div>
  <!--Container Main start-->
  <div class="height-100 bg-light">

    <?php
    if (isset($_GET['section'])) {
      $getpath = $_GET['section'];
      include_once "includes/$getpath.php";
    } else {
      include_once "includes/coursesdashboard.php";
    }
    ?>




  </div>
  <!--Container Main end-->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.js"></script>

  <script>
    document.addEventListener("DOMContentLoaded", function(event) {
      const showNavbar = (toggleId, navId, bodyId, headerId) => {
        const toggle = document.getElementById(toggleId),
          nav = document.getElementById(navId),
          bodypd = document.getElementById(bodyId),
          headerpd = document.getElementById(headerId);

        if (toggle && nav && bodypd && headerpd) {
          toggle.addEventListener('click', () => {
            nav.classList.toggle('show');
            toggle.classList.toggle('bx-x');
            bodypd.classList.toggle('body-pd');
            headerpd.classList.toggle('body-pd');
          });
        }
      };

      showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header');

      const linkColor = document.querySelectorAll('.nav_link');

      function colorLink() {
        if (linkColor) {
          linkColor.forEach(l => l.classList.remove('active'));
          this.classList.add('active');
        }
      }

      linkColor.forEach(l => l.addEventListener('click', colorLink));
    });
  </script>












</body>

</html>