
 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Entry class</h1>
          </div>
      </section>
      
       <span class=""><?= $this->session->flashdata('pesan') ?> </span>
      
       <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
               <?= form_open_multipart(base_url().'Aktivasi_siswa/entry_kelas_aksi'); ?>
                 <div class="col-md-6">
                         <div class="form-group">
                            <input type="hidden" name="id_siswa" value="<?= $id_siswa ?>">
                      </div>
                

              </div>
               <div class="col-md-6">
                         <div class="form-group">

                       <label for="kelas">Kelas</label>
                        <select name="kelas"  id=""  class="form-control">
                          <?php foreach ($data_kelas as $kelas): ?>
                            <?php $kls = $kelas->nama_kelas ?>
                            <option value="<?=$kelas->nama_kelas?>" 
                             
                              
                              ><?= $kelas->nama_kelas ?> </option>
                          <?php endforeach ?>
                        </select>
                      </div>
                

              </div>
             
       </div>
       <div class="card-footer bg-secondary">
                  <button class="btn btn-md btn-success">Kirim</button>
                 <?= form_close(); ?>
              </div>
  </div>





  