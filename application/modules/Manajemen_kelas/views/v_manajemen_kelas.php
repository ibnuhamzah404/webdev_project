
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
                <div class="table-responsive">
              	 <table id="example" class="table table-bordered table-hover" style="overflow-x: scroll;">
                  <thead>
                  <tr>
                  	<th>#</th>
                    
                    <th>Nama Kelas</th>
                    <th> Wali Kelas</th>
                    <th>Aksi</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                   <?php $no=1; ?>
                  <?php foreach ($data_kelas as $kelas) : ?>
                     <tr>
                    <td><?=$no++ ?></td>
                    <td>
                      <?= $kelas->nama_kelas ?>
                    </td>
                    <td>
                      <?= $kelas->wali_kelas ?>
                    </td>
                    <td>
                     
                       <a   href="<?=base_url().'Manajemen_kelas/lihat_siswa/' . $kelas->nama_kelas ?>"class="btn btn-sm text-white btn-primary rounded" > Lihat siswa</a>
                       <a   href="<?=base_url().'Manajemen_kelas/p_update_data/' . $kelas->id_kelas ?>"class="btn btn-sm text-white btn-warning rounded" > Edit Kelas </a>
                       <a href="<?=base_url().'Manajemen_kelas/delete_data/' . $kelas->id_kelas ?>" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                  
                  </tr>
                  <?php endforeach; ?>
                 </tbody>
          </table>

              </div>

       </div>
    
  </div>



  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Kelas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?= form_open_multipart(base_url().'Manajemen_kelas/input_data'); ?>
           
         <div class="row">

          <div class="col-md-12">
            <div class="form-group">
            <label for="nama_kelas">nama_kelas</label>
            <input type="text" name="nama_kelas" class="form-control <?= form_error('nama_kelas') ? 'is-invalid' : null ?>" value="" required>
            <?= form_error('nama_kelas'); ?>
          </div>
       
        
            <div class="form-group">
            <label for="wali_kelas">Wali Kelas</label>
            <select name="wali_kelas" id="" class="form-control">
             
             <?php foreach($data_guru as $guru): ?>
                  <option value="<?= $guru->username ?>"><?= $guru->username ?></option>
            <?php endforeach; ?>
            </select>
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



  