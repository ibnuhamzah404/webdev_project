



      <!-- Main Content -->
      <div class="main-content" >
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-md-12 mb-5">
              <div class="box-flex" style="display: flex; ">
              <div class="box-on">
                <img width="200"src="<?= base_url().'assets/customer/img/hello.svg'?>" alt="">
              </div>
              <div class="ml-4 box-tw" >
                <?= $this->session->userdata('id_siswa'); ?> 
                <h3 class="mt-4"> Hello <?= $this->session->userdata('nama'); ?> </h3>
                <p> Selamat datang di halaman admin</p>
              </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-user-plus"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Jumlah Admin</h4>
                  </div>
                  <div class="card-body">
                   <h6> <?= $total_admin ?></h6>
                  </div>
                </div>
              </div>

            </div>
             <div class=" col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Jumlah Guru</h4>
                  </div>
                  <div class="card-body">
                   <h6> <?= $total_guru ?></h6>
                  </div>
                </div>
              </div>
            </div>

              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fas fa-user-graduate"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Jumlah Siswa</h4>
                  </div>
                  <div class="card-body">
                    <h6> <?= $total_siswa ?></h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
         
        </section>
      </div>
  