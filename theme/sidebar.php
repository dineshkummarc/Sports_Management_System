   <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
           <li class="nav-header"> 
            <a href='<?php echo WEB_ROOT; ?>' class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                   </p>
            </a>
          </li>
          <li class="nav-item">
            <a href='<?php echo WEB_ROOT; ?>module/teams/' class="nav-link">
              <i class="fas fa-users"></i>
              <p>
                Teams 
              </p>
            </a>
          </li>     
         <li class="nav-item">
            <a href='<?php echo WEB_ROOT; ?>module/schedule/' class="nav-link">
              <i class="fas fa-calendar"></i>
              <p>
                Match Schedule
                
              </p>
            </a>
          </li>

<li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-cog"></i>
              <p>
                Maintainance
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
            <a href='<?php echo WEB_ROOT; ?>module/tournament/' class="nav-link">
              <i class="fas fa-trophy"></i>
              <p>
                Tournament
                
              </p>
            </a>
          </li>   
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
            <a href='<?php echo WEB_ROOT; ?>module/category/' class="nav-link">
              <i class="fas fa-bars"></i>
              <p>
                Category
                
              </p>
            </a>
          </li> 
            </ul>
            <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href='<?php echo WEB_ROOT; ?>module/venue/' class="nav-link">
              <i class="fas fa-search-location"></i>
              <p>
                Venue
              </p>
            </a>
          </li>
        </ul>
        <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href='<?php echo WEB_ROOT; ?>module/result/' class="nav-link">
              <i class="fas fa-sticky-note"></i>
              <p>
                Tournament Result
                
              </p>
            </a>
          </li>
        </ul>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-cog"></i>
              <p>
                Account Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href='<?php echo WEB_ROOT; ?>module/user/' class="nav-link">
                  <i class="nav-icon fa fa-users"></i>
                  <p>Manage User Accounts</p>
                </a>
              </li>    
            </ul>
          </li>
        </ul>
      </nav>