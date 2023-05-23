
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
                    <a   href="<?= base_url().'Ulangan/' ?>" class="btn text-white btn-primary"> Kembali</a>
               
              </div>
              <!-- /.card-header -->
              <div class="row">
                <div class="col-md-8">
              <div class="card-body">
                 <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    Detail hasil ulangan
                  </div>
                  <div class="card-body">
                          <table id="example" class="table table-bordered table-hover">
                            <?php foreach ($detail_hasil as $detail): ?>
                              <tr>
                              <th> soal benar </th> <td> <?= $detail->soal_benar ?></td></tr>
                            </tr>
                            <tr>
                              <th> soal salah </th> <td> <?= $detail->soal_salah ?></td></tr>
                            </tr>
                            <tr>
                              <th> tidak diisi </th> <td> <?= $detail->soal_kosong ?></td></tr>
                            </tr>
                               <tr>
                              <th> jumlah soal </th> <td> <?= $detail->jum_soal ?></td></tr>
                            </tr>
                             <tr>
                              <th> nilai siswa </th> <td> <?= $detail->nilai ?></td></tr>
                            </tr>
                            <?php endforeach; ?>
                            

                          </table>
                  </div>
                </div>

              </div>
            
            </div>
          </div>
       
       </div>
    
  </div>
