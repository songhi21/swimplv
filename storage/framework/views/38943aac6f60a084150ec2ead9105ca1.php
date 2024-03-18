<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        
        <a> <b> Swim Central Hub</b></a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
        <div class="profile-desc">
            <div class="profile-pic">
            <div class="count-indicator">
                <img class="img-xs rounded-circle " src="assets/images/SWim logo 2.png" alt="">
                <span class="count bg-success"></span>
            </div>
            <div class="profile-name">
                <h5 class="mb-0 font-weight-normal">Swim Project 3</h5>
                <span><?php echo e(Auth::user()->type); ?></span>
            </div>
            </div>
            <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
            <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
            <?php if(Auth::check()): ?>
                <?php if(Auth::user()->type == "Admin"): ?>
                    <a href="<?php echo e(config('variable.url')); ?>useraccount" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                        <div class="preview-icon bg-dark rounded-circle">
                            <i class="mdi mdi-settings text-primary"></i>
                        </div>
                        </div>
                        <div class="preview-item-content">
                        <p class="preview-subject ellipsis mb-1 text-small">Manage users</p>
                        </div>
                    </a>
                <?php endif; ?>
            <?php endif; ?>
            
            <div class="dropdown-divider"></div>
            <a href="<?php echo e(config('variable.url')); ?>userchangepassword" class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-onepassword  text-info"></i>
                </div>
                </div>
                <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                </div>
            </a>
            <div class="dropdown-divider"></div>
            
        </div>
        </li>
        <li class="nav-item nav-category">
        <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
            
            <a class="nav-link " href="home" >
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#auth2" aria-expanded="true" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-laptop"></i>
                </span>
                <span class="menu-title">Sensors</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse show" id="auth2" style="">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link"  href="<?php echo e(config('variable.url')); ?>smartwatersensordevice"> Smart Water Meter </a></li>
                    <li class="nav-item"> <a class="nav-link"  href="<?php echo e(config('variable.url')); ?>pressuresensordevice"> Presure Sensors </a></li>
                </ul>
              </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="true" aria-controls="auth">
              <span class="menu-icon">
                <i class="mdi mdi-security"></i>
              </span>
              <span class="menu-title">CCTV</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse show" id="auth" style="">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo e(config('variable.url')); ?>cctv"> Software </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo e(config('variable.url')); ?>cctvview"> CCTV Data </a></li>
              </ul>
            </div>
          </li>
        
</nav>
<?php /**PATH C:\xampp\htdocs\central-gulp\swimplv\resources\views/layouts/sidenav.blade.php ENDPATH**/ ?>