
<!-- Start Navigation bar Section -->

  <div class="navigation-bar">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark p-0">
        <a class="navbar-brand" href="home.php">
          <div class="title p-2">
          <h2 class="text-center">E - <span><?php echo lang('TITLE');?></span></h2>
        </div>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Start Search form -->
          <div class="mx-auto search-container">
            <form class="form-inline my-2 my-lg-0 search" action="search.php" method="POST">
              <input class="form-control" type="search" placeholder="<?php echo lang('SEARCHFORPRODUCTS'); ?>" name="search" aria-label="Search">
              <button type="submit" class=""><i style="color: #FFF;" class="fa fa-search"></i></button>
            </form>
          </div>
           <!-- End Search form -->
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <div class="settings ml-auto">
              <ul class="navbar-nav">
                <!-- Debut acceder au compte ou bien s'enregistrer -->
                <?php
                    if(isset($_SESSION['user']) && $_SESSION['logged'] == true){
                      echo '<li class="nav-item active text-center">';
                        echo '<a href="profil.php">';
                          echo '<i class="fas fa-user-alt"></i>';
                          echo '<span class="d-block">'.$_SESSION['user'].'</span>';
                          echo '<span class="sr-only">(current)</span>';
                        echo '</a>';
                      echo '</li>';
                      echo '<li class="list-inline-item align-self-center mx-3" style="color:#e5edf4;"> | </li>';
                      echo '<li class="nav-item active text-center">';
                        echo '<a href="logout.php">';
                          echo '<i class="fas fa-sign-out-alt"></i>';
                          echo '<span class="d-block">'. lang('LOGOUT') .'</span>';
                          echo '<span class="sr-only">(current)</span>';
                        echo '</a>';
                      echo '</li>';
                    }
                    else{
                      echo '<li class="nav-item active text-center">';
                        echo '<a href="login.php">';
                          echo '<i class="fas fa-user-alt"></i>';
                          echo '<span class="d-block">'. lang('LOGIN-OPTION') .'</span>';
                          echo '<span class="sr-only">(current)</span>';
                        echo '</a>';
                      echo '</li>';
                      echo '<li class="list-inline-item align-self-center mx-3" style="color:#e5edf4;"> | </li>';
                      echo '<li class="nav-item active text-center">';
                        echo '<a href="signup.php">';
                          echo '<i class="fas fa-user-alt"></i>';
                          echo '<span class="d-block">Signup</span>';
                          echo '<span class="sr-only">(current)</span>';
                        echo '</a>';
                      echo '</li>';
                    }
                  ?>
                <!-- Fin acceder au compte ou bien s'enregistrer -->
                <li class="nav-item dropdown ml-4">
                  <a class="nav-link btn btn-cart dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-shopping-cart mr-2"></i><?php echo !(empty($_SESSION['count'])) ? $_SESSION['count'] : "" ?>
                  </a>
                  <div class="dropdown-menu cart-product" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="cart.php"><?php echo !(empty($_SESSION['count'])) ? $_SESSION['count'] : "" ?> product(s)</a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
    </div>
    <div class="container">
      <div class="row settings-low-size">
          <?php
            if(isset($_SESSION['user']) && $_SESSION['logged'] == true){
            echo '<div class="col-4">';
              echo '<div class="text-center d-lg-none">';
                echo '<a href="profil.php">';
                  echo '<i class="fas fa-user-alt"></i>';
                  echo '<span class="d-block">'.$_SESSION['user'].'</span>';
                echo '</a>';
              echo '</div>';
            echo '</div>';
            echo '<div class="col-4">';
              echo '<div class="text-center d-lg-none">';
                echo '<a href="logout.php">';
                    echo '<i class="fas fa-user-alt"></i>';
                    echo '<span class="d-block">Logout</span>';
                echo '</a>';
              echo '</div>';
            echo '</div>';
            } 
            else{
            echo '<div class="col-4">';
              echo '<div class="text-center d-lg-none">';
                echo '<a href="login.php">';
                  echo '<i class="fas fa-user-alt"></i>';
                  echo '<span class="d-block">Login</span>';
                echo '</a>';
              echo '</div>';
            echo '</div>';
            echo '<div class="col-4">';
              echo '<div class="text-center d-lg-none">';
                echo '<a href="signup.php">';
                    echo '<i class="fas fa-user-alt"></i>';
                    echo '<span class="d-block">Signup</span>';
                echo '</a>';
              echo '</div>';
            echo '</div>';
            }
          ?>
          <div class="col-4">
            <div class="text-center d-lg-none">
              <div class="dropdown">
                <button class="btn btn-secondary btn-cart dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <i class="fas fa-shopping-cart mr-2"></i> <?php echo !(empty($_SESSION['count'])) ? $_SESSION['count'] : "0" ?>
                </button>
                <div class="dropdown-menu cart-product" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="cart.php"> <?php echo !(empty($_SESSION['count'])) ? $_SESSION['count'] : "0" ?> product(s)</a>
                </div>
              </div>
               </div>
          </div>
      </div>
    </div>
  </div>

  <!-- End Navigation bar Section -->

  <!-- Start menu Navigation Bar -->
  <div class="menu-navigation">
    <hr>
    <div class="container">
      <div class="text-center">
        <ul class="list-inline px-0 mb-0 pb-5 pb-sm-3">
          <li class="list-inline-item float-left"><i class="fas fa-bars mr-2" style="color: #FFF;"></i>Categories</li>
          <?php 
              $categories=getCategories();
             // $categories=$stmt->fetchALL();
              $i=count($categories);
              $j=1;
              foreach($categories as $categorie){
                echo '<li class="list-inline-item mx-2 d-none d-sm-inline">';
                    echo '<a href="categorie.php?catid='.$categorie['cat_id'].'&catname='.$categorie['cat_title'].'">'.$categorie['cat_title'].'</a>';
                echo '</li>';
                $j++;
              }
            ?>
            <li class="list-inline-item float-right"><a href="products.php"><i class="fas fa-bars mr-2" style="color: #FFF;"></i>Products</a></li>
        </ul>
      </div>
    </div>
  </div>

  <!-- End menu Navigation Bar -->