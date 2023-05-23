
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
              <div class="row">
                <div class="col-md-8">
              <div class="card-body">
                 <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Siswa yang belum mengumpulkan</h4>
                  </div>
                  <div class="card-body">

                    <ul class="list-unstyled  user-progress list-unstyled-border list-unstyled-noborder d-flex  justify-content-between flex-wrap">
                      
                      <?php foreach ($data_siswa_belum as $siswa) : ?>
                        <li class="media">
                        <img alt="image" class="mr-3 rounded-circle" width="50" src="<?=base_url().'/assets/customer/img/avatar/avatar-1.png' ?>">
                        <div class="media-body">
                          <div class="media-title"><?= $siswa->username ?></div>
                          <div class="text-job text-danger "><?= $siswa->id_kelas ?></div>
                          <a href="" class="mt-2 btn btn-sm btn-warning">detail</a>

                        </div>
                       
                        
                      </li>
                      <?php  endforeach;?>
                      

                      
                    </ul>
                  </div>
                </div>

              </div>
               <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Siswa yang sudah mengumpulkan tugas</h4>
                  </div>
                  <div class="card-body" style="padding : 0">

                    <ul class="list-unstyled  user-progress list-unstyled-border list-unstyled-noborder d-flex  justify-content-between flex-wrap">
                      
                      <?php foreach ($data_siswa_sudah as $siswa) : ?>
                        <li class="media">
                        <img alt="image" class="mr-3 rounded-circle" width="50" src="<?=base_url().'/assets/customer/img/avatar/avatar-1.png' ?>">
                        <div class="media-body">
                          <div class="media-title"><?= $siswa->username ?></div>
                          <div class="text-job text-danger "><?= $siswa->id_kelas ?></div>
                          <a href="<?=base_url().'Tugas/nilai_tugas/'.$siswa->id_siswa.'/'.$siswa->id_tugas ?>" class="mt-2 btn btn-sm btn-warning">Beri Nilai</a>
                           <a href="<?=base_url().'Tugas/personal_tugas/'.$siswa->id_siswa.'/'.$siswa->id_tugas ?>" class="mt-2 btn btn-sm btn-primary">Lihat Tugas</a>

                        </div>
                       
                        
                      </li>
                      <?php  endforeach;?>
                      

                      
                    </ul>
                  </div>
                </div>

              </div>
            </div>
          </div>
           <div class="col-md-4 col-sm-6 col-lg-4">
           
                <div class="card chat-box mr-4" id="mychatbox">
                  <div class="card-header">
                    <h4>Chat with Rizal</h4>
                  </div>
                  <div class="card-body chat-content" tabindex="2" style="overflow: hidden; outline: none;">
                    
                    <?php foreach($data_chat as $chat): ?>
                  
                  <div class="chat-item
                  <?php if($chat->role_level == 'siswa' ): ?>
                    chat-right
                  <?php else: ?>
                    char-left
                  <?php endif; ?>
                    "  style="">
                    <img src="<?=base_url().'/assets/customer/img/avatar/avatar-1.png' ?>">
                    <div class="chat-details">
                      <div class="chat-text">
                      <?= $chat->pesan ?>
                      </div>
                       <div class="chat-time text-danger"><?= $chat->user ?></div>
                    <div class="chat-time"><?= $chat->tanggal ?></div>

                    </div>
                    </div>
                  <?php endforeach; ?>
                     </div>
                  <div class="card-footer chat-form">
                  <?= form_open_multipart(base_url().'Tugas/chat'); ?>
                      <input id="message" name="pesan" type="text" class="form-control" placeholder="Type a message">
                      <button  type="submit" class="btn btn-primary">
                        <i class="far fa-paper-plane"></i>
                      </button>

                   <?= form_close() ?>
                  </div>
                  
                </div>
              </div>
       </div>
    
  </div>



 
  