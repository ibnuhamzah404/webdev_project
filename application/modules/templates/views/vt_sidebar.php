<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg bg-darknavy"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
      
        </form>
       
      </nav>

      <div class="main-sidebar" >
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">E-learning</a>

          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu " >
              <li class="menu-header">Dashboard</li>

              <li class="nav-item ">
                <a href="<?= base_url()."/Dashboard" ?>" class="nav-link "><i class="fas fa-fire"></i><span>Dashboard</span></a>
              
              </li>
               <li class="nav-item ">
                <a href="<?= base_url()."Admin_form_wa" ?>" class="nav-link "><i class="fas fa-fire"></i><span>Form Wa</span></a>
              
              </li>
             <?php if($this->session->userdata('role_level') == 'admin'): ?>
              
               <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Manjemen</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= base_url().'Manajemen_guru' ?>"> Manajemen Guru</a></li>
                  <li><a class="nav-link"  href="<?= base_url().'Manajemen_siswa' ?>">Manajemen Siswa</a></li>
                  <li><a class="nav-link" href="<?= base_url().'Aktivasi_siswa' ?>">Aktivasi Siswa</a></li>
                </ul>
              </li>
            <?php endif; ?>
                 <li class="nav-item ">
                <a href="<?=base_url().'Manajemen_kelas' ?>" class="nav-link "><i class="fas fa-users"></i><span>Manajemen Kelas</span></a>
              
              </li>
                 <li class="nav-item ">
                <a href="<?= base_url().'Materi' ?>" class="nav-link "><i class="fas fa-book"></i><span>Materi</span></a>
              
              </li>
                 <li class="nav-item ">
                <a href="<?= base_url().'Tugas' ?>" class="nav-link "><i class="fas fa-book-open"></i><span>Tugas</span></a>
              
              </li>
               </li>
               </li>
                 <li class="nav-item ">
                <a href="<?= base_url().'Ulangan/' ?>" class="nav-link "><i class="fas fa-clock"></i><span>Paket Soal</span></a>
              
              </li>
                <li class="nav-item ">
                <a href="<?= base_url().'Tryout/' ?>" class="nav-link "><i class="fas fa-clock"></i><span>Susun Tryout</span></a>
              
              </li>
              <li class="nav-item ">
                <a href="<?=base_url().'Chat/' ?>" class="nav-link "><i class="fas fa-comments"></i><span>Chat</span></a>
              
              </li>
                 <li class="nav-item ">
                <a href="<?=base_url().'Gudang_gambar/' ?>" class="nav-link "><i class="fas fa-comments"></i><span>Gudang Gambar</span></a>
              
              </li>
              

              </li>
                 <li class="nav-item ">
                <a href="<?= base_url().'Logout/out' ?>" class="nav-link "><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
              
              </li>
              

               
             
            </ul>

           
        </aside>
      </div>