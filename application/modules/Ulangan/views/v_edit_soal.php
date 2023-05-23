
 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Edit Soal Ujian</h1>
          </div>
      </section>
      
       <span class=""><?= $this->session->flashdata('pesan') ?> </span>
        <div class="alert alert-info" role="alert">
                 
                  <h4 class="text-white">Edit Soal Ujian</h4>
                  <p>Hanya admin yang dapat mengaktifkan, menonaktifkan dan menghapus data siswa!</p>
                  <hr>
                  <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                </div>
       <div class="card">
             
              <!-- /.card-header -->
             <div class="card">
               <?= form_open_multipart(base_url().'Ulangan/edit_soal_aksi'); ?>
                  <div class="card-header">
                    <h4>Horizontal Form</h4>
                  </div>
                  <div class="card-body">
                    
                                        
                    <div class="form-group">
                     
                      <input type="hidden" readonly class="form-control" name="id_soal" value="<?= $id_soal ?>">

                        <input type="hidden" readonly class="form-control" name="id_ulangan" value="<?= $id_ulangan ?>">
                    </div>
                    <?php $no =0; ?>
                    <?php foreach ($data_soal as $soal ) {
                     $no++;
                    } ?>

                 
               <?php foreach ($data_soal as $soal): ?>  

          <div class="col-md-12">
            
             
            
            <div class="form-group">
            <label for="soal">Soal Ujian No . [  <?php echo $no; ?>  ]</label>
            <textarea  name="soal" class="mytextarea form-control <?= form_error('file') ? 'is-invalid' : null ?>" style="height : 100px;"><?= $soal->soal ?>
            </textarea>
          </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
            <label for="pg_a">jawaban A</label>
            <textarea type="text" name="pg_a" class="mytextarea form-control <?= form_error('pg_a') ? 'is-invalid' : null ?>"  required>
            <?= form_error('pg_a'); ?> <?= $soal->pg_a ?></textarea>
          </div>
          </div>
           <div class="col-md-12">
            <div class="form-group">
            <label for="pg_b">jawaban B</label>
            <textarea type="text" name="pg_b" class="mytextarea form-control <?= form_error('pg_b') ? 'is-invalid' : null ?>" required>
            <?= form_error('pg_b'); ?> <?= $soal->pg_b ?></textarea>
          </div>
          </div>
           <div class="col-md-12">
            <div class="form-group">
            <label for="pg_c">jawaban C</label>
            <textarea type="text" name="pg_c" class="mytextarea form-control <?= form_error('pg_c') ? 'is-invalid' : null ?>"  required>
            <?= form_error('pg_c'); ?> <?= $soal->pg_c ?></textarea>
          </div>
          </div>
           <div class="col-md-12">
            <div class="form-group">
            <label for="pg_d">jawaban D</label>
            <textarea type="text" name="pg_d" class="mytextarea form-control <?= form_error('pg_d') ? 'is-invalid' : null ?>" value="" required> <?= $soal->pg_d ?> </textarea>
            <?= form_error('pg_d'); ?>
          </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
            <label for="pg_e">jawaban E</label>
            <textarea type="text" name="pg_e" class="mytextarea form-control <?= form_error('pg_e') ? 'is-invalid' : null ?>" value="" required> <?= $soal->pg_e ?> </textarea>
            <?= form_error('pg_e'); ?>
          </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
            <label for="kunci_jawaban">kunci_jawaban</label>
            <select name="kunci_jawaban" id=""class="form-control" >
              <option value="A" 
              <?php if($soal->pg_jawaban == "A"):  ?>
                selected="selected"
              <?php endif; ?>>A
              </option>
              <option value="B" 
              <?php if($soal->pg_jawaban == "B"):  ?>
                selected="selected"
              <?php endif; ?>>B
              </option>
              <option value="C" 
              <?php if($soal->pg_jawaban == "C"):  ?>
                selected="selected"
              <?php endif; ?>>C
              </option>
              <option value="D" 
              <?php if($soal->pg_jawaban == "D"):  ?>
                selected="selected"
              <?php endif; ?>>D
              </option>
               <option value="E" 
              <?php if($soal->pg_jawaban == "E"):  ?>
                selected="selected"
              <?php endif; ?>>E
              </option>

            </select>
          </div>
          </div>
           <div class="col-md-12">
               <div class="form-group">
                  <label for="pembahasan_soal">Pembahasan Soal</label>
                  <textarea name="pembahasan_soal"  class="mytextarea form-control <?= form_error('file') ? 'is-invalid' : null ?> "  value="" required> <?= $soal->pembahasan ?></textarea>
                  <?= form_error('pembahasan_soal'); ?>
               </div>
            </div>
               <div class="col-md-12">
               <div class="form-group">
                  <label for="bobot_nilai">bobot nilai</label>
                  <input type="number" class="form-control" name="bobot_nilai" min="0" max="1000" step="50" value="<?= $soal->bobot_nilai ?>">
                  <?= form_error('bobot_nilai'); ?>
               </div>
            </div>
          <?php endforeach; ?>
                 
                   

                  </div>
             
                  <div class="card-footer">
                    <button class="btn btn-primary">Submit</button>
                  </div>
                </div>
                 <?= form_close(); ?>

       </div>
    
  </div>
  
  <script src="<?= base_url('assets/vendor/bootstrap-input-spinner-master/src/bootstrap-input-spinner.js') ?>"></script>
<script>
    $("input[type='number']").inputSpinner()
</script>





  