<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
         
        </form>
        
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">E-learning</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              </li>
                 <li class="nav-item ">
                <a href="<?=base_url().'Sdashboard' ?>" class="nav-link "><i class="fas fa-fire"></i><span>Dashboard</span></a>
              
              </li>
            
                
              <li class="menu-header">Siswa Menu</li>
              </li>
                 <li class="nav-item ">
                <a href="<?= base_url().'sMateri' ?>" class="nav-link "><i class="fas fa-book"></i><span>Materi</span></a>
              
              </li>
               <li class="nav-item ">
                <a href="<?=base_url().'sTugas/' ?>" class="nav-link "><i class="fas fa-book-open"></i><span>Tugas/Quiz</span></a>
              
              </li>

               <li class="nav-item ">
                <a href="<?= base_url().'Sulangan/' ?>" class="nav-link "><i class="fas fa-bell"></i><span>Ujian</span></a>
              
              </li>
               <li class="nav-item ">
                <a href="<?=base_url().'sChat/' ?>" class="nav-link "><i class="fas fa-comments"></i><span>Chat</span></a>
              
              </li>

              <li class="menu-header">User Menu</li>
              <!--  <li class="nav-item ">
                <a href="" class="nav-link "><i class="fas fa-bell"></i><span>Profile</span></a>
              
              </li> -->
               <li class="nav-item ">
                <a href="<?= base_url().'Logout/out' ?>" class="nav-link "><i class="fas fa-bell"></i><span>Log out</span></a>
              
              </li>
             
            </ul>

          
        </aside>
      </div>