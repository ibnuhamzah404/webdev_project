
 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Manajemen Kelas</h1>
          </div>
      </section>
      
       <span class=""><?= $this->session->flashdata('pesan') ?> </span>
        <div class="alert alert-info" role="alert">
                 
                  <h4 class="text-white">Manajemen Kelas</h4>
                  <p>Hanya admin yang dapat mengaktifkan, menonaktifkan dan menghapus data siswa!</p>
                  <hr>
                  <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                </div>
       <div class="card">
              <div class="card-header">
                    <a   href="<?= base_url('Produk/tambah_produk_aksi') ?>" class="btn text-white btn-primary rounded" data-toggle="modal" data-target="#exampleModalCenter"> Tambah Kelas </a>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4>User Progress</h4>
                  </div>
                  <div class="card-body">

                    <ul class="list-unstyled  user-progress list-unstyled-border list-unstyled-noborder d-flex  justify-content-between flex-wrap">
                      
                      <?php foreach ($data_siswa as $siswa) : ?>
                        <li class="media">
                        <img alt="image" class="mr-3 rounded-circle" width="50" src="<?=base_url().'/assets/customer/img/avatar/avatar-1.png' ?>">
                        <div class="media-body">
                          <div class="media-title"><?= $siswa->nama ?></div>
                          <div class="text-job text-danger "><?= $siswa->id_kelas ?></div>
                          <a href="" class="mt-2 btn btn-sm btn-warning">detail</a>

                        </div>
                       
                        
                      </li>
                      <?php  endforeach;?>
                      

                      
                    </ul>
                  </div>
                </div>

              </div>

       </div>
    
  </div>



 
  