
 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Manajemen Kelas</h1>
          </div>
      </section>
      
       <span class=""><?= $this->session->flashdata('pesan') ?> </span>
        <div class="alert alert-info" role="alert">
                 
                  <h4 class="text-white">Edit Ulangan</h4>
                  <p>Dimenu ini guru dapat, mengedit ulangan yang sudah ada!.</p>
                  <hr>
                  
                </div>
       <div class="card">
             
              <!-- /.card-header -->
             <div class="card">
               <?= form_open_multipart(base_url().'Ulangan/edit_ulangan_aksi'); ?>
                  <div class="card-header">
                    <h4>Horizontal Form</h4>
                  </div>
                  <div class="card-body">
                   <div class="row">
                    <div class="col-md-12">
                      <?php foreach ($data_ulangan as $ulangan):?>

                      <div class="form-group">
                     
                      <input type="hidden" name="id_ulangan" class="form-control <?= form_error('id_ulangan') ? 'is-invalid' : null ?>" value="<?=$id_ulangan ?>" required>
                      <?= form_error('id_ulangan'); ?>
                    </div>
                     
                      <div class="form-group">
                      <label for="judul">judul ulangan</label>
                      <input type="text" name="judul" class="form-control <?= form_error('judul') ? 'is-invalid' : null ?>" value="<?=$ulangan->judul_ulangan ?>" required>
                      <?= form_error('judul'); ?>
                    </div>
                    </div>
                    <!-- div class="col-md-6">
                     <div class="form-group">
                      <label for="kelas">kelas</label>
                      <select name="kelas" id="" class="form-control">
                        <option value="">--Pilih kelas--</option>
                       <?php foreach ($data_kelas as $kelas): ?>
                          <option value="<?= $kelas->nama_kelas ?>" <?php if($kelas->nama_kelas == $ulangan->kelas):  ?>
                            selected="selected"
                          <?php endif; ?>><?= $kelas->nama_kelas ?></option>



                       <?php endforeach; ?>
                       
                      </select>
                    </div>
                    </div> -->
                    <div class="col-md-12">
                    <div class="form-group">
                      <label for="judul">Tanggal pembuatan</label>
                     <input type="datetime-local" name="tanggal_pembuatan" class="form-control <?= form_error('tanggal_pembuatan') ? 'is-invalid' : null ?>" value="<?php echo  date('Y-m-d\TH:i', strtotime($ulangan->tanggal_pembuatan))  ?>" required>
                      <?= form_error('tanggal_pembuatan'); ?>
                    </div>
                   
                    </div>

                      <div class="col-md-6">
          <div class="form-group">
            <label for="jurusan_ujian">Jurusan Ujian</label>
             <select name="jurusan_ujian" id="" class="form-control"  required>
              <option value="">--Pilih Jurusan Ujian--</option>
              <option value="saintek"

               <?php if ($ulangan->jurusan_ujian == 'saintek'): ?>
                selected="selected"
              <?php endif ?>>Saintek</option>
              <option value="soshum" <?php if ($ulangan->jurusan_ujian == 'soshum'): ?>
                selected="selected"
              <?php endif ?>>Soshum</option>
               <option value="campuran"  <?php if ($ulangan->jenis_materi_ujian == 'campuran'): ?>
                selected="selected"
              <?php endif ?>>campuran</option>
            </select>
            <?= form_error('jurusan_ujian'); ?>
          </div>
         
          </div>
          <div class="col-md-6">
          <div class="form-group">
            <label for="jenis_materi_ujian">Jenis Materi Ujian</label>
             <select name="jenis_materi_ujian" id="" class="form-control"  required>
              <option value="">--Pilih Jenis Materi Ujian--</option>

              <option value="TKA" 
              <?php if ($ulangan->jenis_materi_ujian == 'TKA'): ?>
                selected="selected"
              <?php endif ?>
              >TKA</option>
              <option value="TPA"
               <?php if ($ulangan->jenis_materi_ujian == 'TPA'): ?>
                selected="selected"
              <?php endif ?>>TPA</option>
               <option value="TPS"
                <?php if ($ulangan->jenis_materi_ujian == 'TPS'): ?>
                selected="selected"
              <?php endif ?>>TPS</option>
            </select>
            <?= form_error('jenis_materi_ujian'); ?>
          </div>
            </div>
                    <div class="col-md-12">
                    <div class="form-group">
                      <label for="waktu_ujian">Waktu Ujian(*menit)</label>
                     <input type="number" name="waktu_ujian" class="form-control <?= form_error('waktu_ujian') ? 'is-invalid' : null ?>" value="<?= $ulangan->waktu ?>" required>
                      <?= form_error('waktu_ujian'); ?>
                    </div>
                   
                    </div>
                    <?php endforeach; ?>

                   
                  </div>
                                        
                    

                  </div>
               
                  <div class="card-footer">
                    <button class="btn btn-primary">Submit</button>
                      <a href="<?= base_url('Ulangan') ?>" class="btn btn-md btn-warning">Kembali</a>
                  </div>
                </div>
                
       </div>
    
  </div>





  