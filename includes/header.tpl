<nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">LinkShare</a>
    <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item mx-0 mx-lg-1">
          <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#create">Create</a>
        </li>
        <li class="nav-item mx-0 mx-lg-1">
          <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">About</a>
        </li>
        <?php
          if (!(empty($_SESSION['Username']) && empty($_SESSION['User_ID']))) :
            $nav_username = $_SESSION['Username'];
        ?>
        <li class="nav-item mx-0 mx-lg-1 dropdown">
          <a class="nav-link dropdown-toggle py-3 js-scroll-trigger" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $nav_username; ?></a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="/user/<?php echo $nav_username; ?>">My Proffile</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/user/<?php echo $nav_username; ?>/logout"><span style="color: red;">Logout</span></a>
          </div>
        </li>
        <?php else : ?>
        <li class="nav-item mx-0 mx-lg-1">
          <a class="nav-link portfolio-item py-3 px-0 px-lg-3 rounded" onClick="ShowForm('SigninBox')" href="#authorization-modal">Authorization</a>
        </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
