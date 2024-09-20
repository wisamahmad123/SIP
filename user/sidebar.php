<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>User Survey</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="../admin/css/bootstrap.min.css">
  <link rel="stylesheet" href="../admin/css/font-awesome.min.css">
  <link rel="stylesheet" href="../admin/css/ionicons.min.css">
  <link rel="stylesheet" href="../admin/css/datepicker3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="../admin/css/all.css">
  <link rel="stylesheet" href="../admin/css/select2.min.css">
  <link rel="stylesheet" href="../admin/css/dataTables.bootstrap.css">
  <link rel="stylesheet" href="../admin/css/jquery.fancybox.css">
  <link rel="stylesheet" href="../admin/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../admin/css/_all-skins.min.css">
  <link rel="stylesheet" href="../admin/css/on-off-switch.css" />
  <link rel="stylesheet" href="../admin/css/summernote.css">
  <link rel="stylesheet" href="../admin/style.css">

  <style>
    .sidebar-hidden {
      transform: translateX(-250px); /* Adjust based on sidebar width */
      transition: transform 0.3s ease;
    }

    .sidebar-visible {
      transform: translateX(0);
      transition: transform 0.3s ease;
    }
    
  </style>
</head>

<body class="hold-transition fixed skin-blue sidebar-mini">

  <div class="wrapper">

    <header class="main-header">

      <a href="home.php" class="logo" style="background-color: #4a4646; display: flex; align-items: center;">
        <img src="../assets/images/logo-polinema.png" alt="Logo" style="width: 40px; height: 40px; margin-right: 10px;">
        <h5 class="logo-lg">Politeknik Negeri Malang</h5>
      </a>

        <!-- Top Bar ... User Inforamtion .. Login/Log out Area -->
        <nav class="navbar navbar-static-top" style="background-color: #4839e6;">
        <!-- Top Bar ... User Information .. Login/Log out Area -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a class="dropdown-toggle d-flex align-items-center" data-toggle="dropdown" href="profil.php">
                <i class="fas fa-user" style="margin-right: 8px;"></i>
                <span class="hidden-xs"><?php echo $_SESSION['username']; ?></span>
              </a>
              <ul class="dropdown-menu">
                <li class="user-footer">
                  <div>
                    <a href="index.php?includes=profile-edit" class="btn btn-default btn-flat">Edit Profile</a>
                  </div>
                  <div>
                    <a href="index.php?includes=logout" class="btn btn-default btn-flat">Log out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>

      </nav>
    </header>

    <!-- Side Bar to Manage Shop Activities -->
    <aside class="main-sidebar" style="background-color: #4a4646;">
      <section class="sidebar">
        <ul class="sidebar-menu">
          <li class="treeview">
            <a href="homeuser.php">
              <span>Beranda</span>
            </a>
          </li>
          <li class="treeview">
            <a href="profil.php">
              <span>Profil</span>
            </a>
          </li>
          <li class="treeview">
            <a href="kuisioner.php">
              <span>Kuisioner</span>
            </a>
          </li>
          
        </ul>
        <div style="text-align: center; margin-top: 10px; padding-top:40px; margin-right: 15px;">
          <a href="../index.php" class="btn btn-primary">Keluar</a>
        </div>
      </section>

    </aside>

    <script>

  </script>

    <div class="content-wrapper">