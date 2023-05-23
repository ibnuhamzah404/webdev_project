
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
                   
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <h5> Beri nilai siswa</h5>
                  <?= form_open_multipart(base_url().'Tugas/nilai_tugas_aksi'); ?>
                <input type="hidden" name="id_tugas" value="<?= $id_tugas ?>">
                <input type="hidden" name="id_siswa" value="<?= $id_siswa ?>">
                <input type="range" name="nilai" value="" min="1" max="100" oninput="this.nextElementSibling.value = this.value" style="width: 200px; height: 50px;">
                <output style="font-size: 18px; line-height: 50px;">24</output>
                <br>
                <button class="btn btn-md btn-primary"> submit</button>
                <?php form_close() ?>
              </div>
    
  </div>
<script>
  function updateTextInput(val) {
          document.getElementById('textInput').value =val; 
        }
</script>


 
  