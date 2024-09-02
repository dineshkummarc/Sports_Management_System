  <nav class="main-header navbar navbar-expand navbar-dark navbar-orange">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
         <?php echo $_SESSION['NAME']; ?> <i class="far fa-user-circle"></i>
          <span class="badge badge-warning navbar-badge"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="card card-widget widget-user">
             <div class="widget-user-header bg-orange">
                <h4 class="widget-user-username"><?php  if (isset($_SESSION['DISPLAYNAME'])) {
                            echo $_SESSION['DISPLAYNAME'];
                          }else{
                            echo "User";
                          } ?></h4>
                <h5 class="widget-user-desc"><?php  if (isset($_SESSION['TYPE'])) {
                            echo $_SESSION['TYPE'];
                          }else{
                            echo "Guest";
                          } ?></h5>
              </div>
       <div class="widget-user-image">
               <?php
               echo '<img class="img-circle elevation-1" src="'. WEB_ROOT . 'dist/img/jude.png" alt="User Avatar">';
               ?>
              </div>
         
              <div class="card-footer">
                   <a href="<?php echo  WEB_ROOT;?>logout.php" class="small-box-footer">Logout <i class="fas fa-sign-out-alt"></i></a>
                </div>
         </div>
        </div>
      </li>
   
    </ul>
  </nav>