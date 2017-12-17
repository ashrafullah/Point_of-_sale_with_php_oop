<nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
  <div class="navbar-wrapper">
    <div class="navbar-header">
      <ul class="nav navbar-nav">
        <li class="nav-item mobile-menu hidden-md-up float-xs-left">
          <a class="nav-link nav-menu-main menu-toggle hidden-xs">
            <i class="icon-menu5 font-large-1"></i></a></li>
        <li class="nav-item"><a href="admin_home.php" class="navbar-brand nav-link"><img alt="POS" src="public/app-assets/images/logo/logo.png" data-expand="public/app-assets/images/logo/logo.png" data-collapse="public/app-assets/images/logo/logo-small.png"  class="brand-logo"></a></li>
        <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
      </ul>
    </div>
    <div class="navbar-container content container-fluid">
      <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
        <ul class="nav navbar-nav">
          <li class="nav-item hidden-sm-down">
            <a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5"></i></a></li>
          <li class="nav-item hidden-sm-down"><a href="#" class="nav-link nav-link-expand"><i class="ficon icon-expand2"></i></a></li>
      
        </ul>

        <ul class="nav navbar-nav float-xs-right">
          
          
          <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online">
            <img src="public/app-assets/images/portrait/small/avatar-s-1.png" alt="avatar"><i></i></span><span class="user-name">
            <?php
            $name = Session::get('name');
             echo  $name;
              ?>
            </span></a>
            <div class="dropdown-menu dropdown-menu-right">
              <?php  $user_type = Session::get('user_type');?>

          <a href="edit_user.php?id=<?php echo $user_type; ?>" class="dropdown-item">
                <i class="icon-head"></i> 
                  View Profile
          </a>


              <div class="dropdown-divider">
                
              </div>
               <a class="dropdown-item" href="logout.php">
                  <i class="icon-power3"></i>
                 Logout
              </a>
 
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>