 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">العودة للموقع</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <hr class="sidebar-divider my-0">

      <li class="nav-item">
        <a class="nav-link" href="<?php echo $this->Url->build(['controller' => 'posts', 'action'=>'index'] )?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>قائمة المقالات </span></a>
      </li>

      <hr class="sidebar-divider my-0">

      <li class="nav-item">
        <a class="nav-link" href="<?php echo $this->Url->build(['controller' => 'programs', 'action'=>'index'] )?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>قائمة البرامج  </span></a>
      </li>

      <hr class="sidebar-divider my-0">

      <li class="nav-item">
        <a class="nav-link" href="<?php echo $this->Url->build(['controller' => 'episodes', 'action'=>'index'] )?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>قائمة الحلقات </span></a>
      </li>

      <hr class="sidebar-divider my-0">

      <li class="nav-item">
        <a class="nav-link" href="<?php echo $this->Url->build(['controller' => 'users', 'action'=>'index'] )?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>قائمة المستخدمين </span></a>
      </li>

      <hr class="sidebar-divider">
    </ul>
