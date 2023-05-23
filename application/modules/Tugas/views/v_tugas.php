 <style>
   
 </style>
 <div class="main-content">
        <section class="section">
          <div class="section-header">

            <h1>Manajemen Tugas Siswa</h1>
          </div>
      </section>
      
       <span class=""><?= $this->session->flashdata('pesan') ?> </span>
        <div class="alert alert-info" role="alert">
                 
                  <h4 class="text-white">Tugas</h4>
                  <p>Hanya admin yang dapat menambahkan, mengedit serta menghapus tugas.</p>
                  <hr>
                 
                </div>
       <div class="card">
              <div class="card-header">
                <a   href="<?= base_url('Produk/tambah_produk_aksi') ?>" class="btn text-white btn-primary rounded" data-toggle="modal" data-target="#exampleModalCenter"> Tambah Tugas </a>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
              	 <table id="example" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                  	<th>#</th>
                     <th>tugas</th>
                    <th>Judul</th>
                    <th>Kelas</th>
                  
                   
                    <th>Tanggal Posting</th>
                    <th>Tanggal Berakhir</th>
                    <th>Pembuat</th>
                     <th>Aksi</th>
                    
                   
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($data_tugas as $tugas): ?>
                        
                        <tr>

                          <td><?= $no++  ?></td>
                             <td> <a href="<?=base_url().'Tugas/cek_tugas/'.$tugas->kelas .'/'.$tugas->id_tugas ?>" class="btn btn-sm btn-primary">cek tugas</a></td>
                          <td><?= $tugas->judul_tugas;  ?></td>
                          <td><?= $tugas->kelas;  ?></td>
                           <td><?= $tugas->tanggal_posting;  ?></td>
                            <td><?= $tugas->tanggal_deadline;  ?></td>
                            <td><?= $tugas->pembuat;  ?></td>
                            <td>
                              <a href="" class="btn btn-sm btn-primary">detail</a>
                              <a href="<?= base_url().'Tugas/p_update_data/'.$tugas->id_tugas ?>" class="btn btn-sm btn-warning">Edit</a>
                              <a href="<?= base_url().'Tugas/delete/'.$tugas->id_tugas ?>" class="btn btn-sm btn-danger">Hapus</a>
                            </td>

                        </tr>
                    <?php endforeach;  ?>
                  
                 </tbody>
          </table>
              </div>
            </div>

       </div>
    
  </div>

   

      
   
   <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Tugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?= form_open_multipart(base_url().'Tugas/input_data'); ?>
           
         <div class="row">
          <div class="col-md-12">
            <div class="form-group">
            <label for="judul">judul</label>
            <input type="text" name="judul" class="form-control <?= form_error('judul') ? 'is-invalid' : null ?>" value="" required>
            <?= form_error('judul'); ?>
          </div>
          </div>
          <div class="col-md-6">
           <div class="form-group">
            <label for="kelas">kelas</label>
            <select name="kelas" id="" class="form-control">
              <option value="">--Pilih kelas--</option>
             <?php foreach ($data_kelas as $kelas): ?>
                <option value="<?= $kelas->nama_kelas ?>"><?= $kelas->nama_kelas ?></option>
             <?php endforeach; ?>
             
            </select>
          </div>
          </div>
          <div class="col-md-6">
           <div class="form-group">
            <label for="file">file</label>
            <input type="file" name="file" class="form-control <?= form_error('file') ? 'is-invalid' : null ?>" value="" required>
            <?= form_error('file'); ?>
          </div>
         
          </div>
          <div class="col-md-12">
            <div class="form-group">
            <label for="judul">Tanggal berakhir</label>
           <input type="datetime-local" name="tanggal_deadline" class="form-control <?= form_error('tanggal_deadline') ? 'is-invalid' : null ?>" value="" required>
            <?= form_error('tanggal_deadline'); ?>
          </div>
          </div>
         

           <div class="col-md-12">
            <div class="form-group">
            <label for="judul">Deskripsi tugas</label>
            <textarea name="deskripsi_tugas" class="form-control <?= form_error('file') ? 'is-invalid' : null ?>">
              
            </textarea>
          </div>
          </div>
          

           
        </div>
        
        
      </div>
           


      
      
      <div class="modal-footer">
        <a  type="button" class="btn btn-secondary" data-dismiss="modal">Close</a>
        <button type="submit" class="btn btn-primary">Kirim</button>
      </div>
       <?= form_close();  ?>
    </div>
  </div>
</div>