<!-- Nav bar start -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg fixed-top">
      <div class="container">
        <a class="navbar-brand" href="../pages/barang_read.php">Kopjon Store</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarText"
          aria-controls="navbarText"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <?php
          if (!empty($_SESSION['username']) and $_SESSION['level']=="admin"){ ?>
        <div class="collapse navbar-collapse text-right" id="navbarText">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
          <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome,<?php echo $_SESSION['username']; ?>
          </button>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="../pages/user_read.php">Data User</a></li>
            <li><a class="dropdown-item" href="../pages/barang_read.php">Data Barang</a></li>
            <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
          </ul>
        </li>
          </ul>
        </div>

        <?php } else if (!empty($_SESSION['username']) and $_SESSION['level']=="user"){?>
        <div class="collapse navbar-collapse text-right" id="navbarText">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
          <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome, <?php echo $_SESSION['username']; ?>
          </button>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
          </ul>
        </li>
          </ul>
        </div>
        <?php }?>
      </div>
    </nav>
    <!-- Nav bar end -->