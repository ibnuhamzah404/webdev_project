<div class="overlay-wrapper" style="
z-index: 900;
position: absolute;
text-align: center;  
background-color: black; 
opacity: 50%; 
width: 100%;
height: 1200px;
display: none;
">
</div>

      <div class="overlay" style="position: absolute; z-index: 901; opacity: 100%; color: white; margin-left: auto;
margin-right: auto;
left: 0;
right: 0;text-align: center;">
        <i class="fas fa-3x fa-sync-alt fa-spin" style="font-size: 50px; margin-top: 200px; "></i>
        <div class="text-bold pt-2">Loading...</div>
      </div>

<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Manajemen Kelas</h1>
      </div>
   </section>
   <span class=""><?= $this->session->flashdata('pesan') ?> </span>
   <div class="alert alert-info" role="alert">
      <h4 class="text-white">Tambah Soal</h4>
      <p>Anda dapat menambahkan soal disini dan hanya guru yang diperbolehkan menambahkan soal</p>
      <hr>
   </div>
   <div class="card">
      <!-- /.card-header -->
      <div class="card">
         <?= form_open_multipart(base_url().'Ulangan/tambah_soal_aksi'); ?>
         <div class="card-header">
            <h4>Horizontal Form</h4>
         </div>
         <div class="card-body">
            <div class="form-group">
               <input type="hidden" readonly class="form-control" name="id_ulangan" value="<?= $id_ulangan ?>">
            </div>
            <?php $no =1; ?>
            <?php foreach ($soal_ulangan as $soal ) {
               $no++;
               } ?>
            <div class="col-md-12">
               <label for="soal">Soal Ujian No . [  <?php echo $no; ?>  ]</label>
               <input type="hidden" value="<?= $no ?>" name="no_soal">
               <div class="form-group">
                  <textarea  name="soal" class="mytextarea form-control <?= form_error('file') ? 'is-invalid' : null ?>"></textarea>
               </div>
            </div>
            <div class="col-md-12">
               <div class="form-group">
                  <label for="pg_a">jawaban A</label>
                 
                  <textarea name="pg_a"  class="mytextarea form-control <?= form_error('file') ? 'is-invalid' : null ?>"></textarea>
               </div>
            </div>
            <div class="col-md-12">
               <div class="form-group">
                  <label for="pg_b">jawaban B</label>
                  <textarea name="pg_b"  class="mytextarea form-control <?= form_error('file') ? 'is-invalid' : null ?> "  value="" required> </textarea>
                 
                  <?= form_error('pg_b'); ?>
               </div>
            </div>
            <div class="col-md-12">
               <div class="form-group">
                  <label for="pg_c">jawaban C</label>
                  <textarea name="pg_c"  class="mytextarea form-control <?= form_error('file') ? 'is-invalid' : null ?> "  value="" required> </textarea>
                  <?= form_error('pg_c'); ?>
               </div>
            </div>
            <div class="col-md-12">
               <div class="form-group">
                  <label for="pg_d">jawaban D</label>
                  <textarea name="pg_d"  class="mytextarea form-control <?= form_error('file') ? 'is-invalid' : null ?> "  value="" required></textarea>
                  <?= form_error('pg_d'); ?>
               </div>
            </div>
            <div class="col-md-12">
               <div class="form-group">
                  <label for="pg_e">jawaban E</label>
                  <textarea name="pg_e"  class="mytextarea form-control <?= form_error('file') ? 'is-invalid' : null ?> "  value="" required></textarea>
                  <?= form_error('pg_e'); ?>
               </div>
            </div>
            <div class="col-md-12">
               <div class="form-group">
                  <label for="kunci_jawaban">kunci_jawaban</label>
                  <select name="kunci_jawaban" id=""class="form-control" >
                     <option value="A">A</option>
                     <option value="B">B</option>
                     <option value="C">C</option>
                     <option value="D">D</option>
                     <option value="E">E</option>
                  </select>
               </div>
            </div>
             <div class="col-md-12">
               <div class="form-group">
                  <label for="pembahasan_soal">Pembahasan Soal</label>
                  <textarea name="pembahasan_soal"  class="mytextarea form-control <?= form_error('file') ? 'is-invalid' : null ?> "  value="" required> </textarea>
                  <?= form_error('pembahasan_soal'); ?>
               </div>
            </div>
            <div class="col-md-12">
               <div class="form-group">
                  <label for="bobot_nilai">bobot nilai</label>
                  <input type="number" class="form-control" name="bobot_nilai" min="0" max="1000" >
                  <?= form_error('bobot_nilai'); ?>
               </div>
            </div>
         </div>
         <div class="card-footer">
            <button class="btn btn-primary">Submit</button>
            <a href="<?= base_url('Ulangan') ?>" class="btn btn-md btn-warning">Kembali</a>
         </div>
      </div>
      <?= form_close(); ?>
   </div>
</div>
<script src="<?= base_url('assets/vendor/bootstrap-input-spinner-master/src/bootstrap-input-spinner.js') ?>"></script>
<script>
    $("input[type='number']").inputSpinner()
</script>
 <script>
      

        

        $(window).load(function() {
         $('.overlay-wrapper').css('display', 'block');
          $('.overlay').css('display', 'block');
       
          $().ready(function(){
        
            $('.overlay-wrapper').delay(1000).fadeOut();
          $('.overlay').delay(1000).fadeOut();

         });
        });
         


   
      

      </script>