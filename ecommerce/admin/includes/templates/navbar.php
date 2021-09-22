<nav class="navbar navbar-expand-lg navbar-light bg-dark navbar-dark">
  <div class="container">
        <a class="navbar-brand" href="dashboard.php"><?php echo 'HOME';?></a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="categories.php"><?php echo 'CATEGORIES';?> <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="products.php"><?php echo 'PRODUCTS';?> <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="users.php"><?php echo 'USERS';?> <span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <ul class="nav navbar-nav ml-auto">
        <li class="dropdown ">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $_SESSION['username']; ?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../home.php"><?php echo lang('VISIT_SHOP') ;?></a></li>
            <li><a class="dropdown-item" href="users.php?do=Edit&user_id=<?php echo $_SESSION['user_id'] ?>"><?php echo lang('EDIT_PROFIL') ;?></a></li>
            <li><a class="dropdown-item" href="logout.php"><?php echo lang('LOGOUT') ;?></a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

