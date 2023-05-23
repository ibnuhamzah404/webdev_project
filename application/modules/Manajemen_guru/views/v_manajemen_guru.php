 <style>
   
 </style>
 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Manajemen Guru</h1>
          </div>
      </section>
      
       <span class=""><?= $this->session->flashdata('pesan') ?> </span>
        <div class="alert alert-info" role="alert">
                 
                  <h4 class="text-white">Manajemen Guru</h4>
                  <p>Hanya admin yang dapat mengaktifkan, menonaktifkan dan menghapus data siswa!</p>
                  <hr>
                  <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                </div>
       <div class="card">
              <div class="card-header">
                    <a   href="<?= base_url('Produk/tambah_produk_aksi') ?>" class="btn text-white btn-primary rounded" data-toggle="modal" data-target="#exampleModalCenter"> Tambah Guru </a>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
              	 <table id="example" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                  	<th>#</th>
                    <th>NIP</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th> Status</th>
                    <th>Aksi</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; ?>
                  <?php foreach ($data_guru as $guru) : ?>
                     <tr>
                    <td><?=$no++ ?></td>
                    <td>
                      <?= $guru->nip ?>
                    </td>
                    <td>
                      <?= $guru->nama ?>
                    </td>
                   <td>
                      <?= $guru->jenis_kelamin?>
                    </td>
                    <td>
                      <?= $guru->tanggal_lahir ?>
                    </td>
                    <td>
                      <?php $st= $guru->status  ?>
                      <?php if($st=='aktif'): ?>
                      <button class="btn btn-sm btn-success">Aktif</button>
                      <?php else: ?>
                        <button class="btn btn-sm btn-danger">Nonaktif</button>
                      <?php endif; ?>
                    </td>
                   
                    <td> 
                     
                     
                      <a href="<?= base_url().'Manajemen_guru/p_update_data/'.$guru->id_guru ?>" class="btn btn-sm btn-primary">Edit</a>

                      <?php  $st = $guru->status;  $act=''?>
                      <?php  if($st=='aktif'){$act='nonaktif';}else{$act='aktivasi';} ?>

                       <?php if($guru->status == "aktif"): ?>
                         <a href="<?= base_url().'Manajemen_guru/'.$act .'/' . $guru->id_guru ?>" class="btn btn-sm btn-warning">Nonaktif</a>
                      <?php elseif($guru->status == "pending"): ?>
                         <button class="btn btn-sm btn-info">Pending</button>
                        <?php elseif($guru->status == "nonaktif"): ?> 
                           <a href="<?= base_url().'Manajemen_guru/'.$act .'/'. $guru->id_guru ?>" class="btn btn-sm btn-success">Aktifkan</a>
                          
                      <?php endif; ?>
                     
                         <a onclick="javascript : return confirm('anda yakin akan menghapus data ini ? ')" href="<?= base_url().'Manajemen_guru/delete/'.$guru->id_guru ?>" class="btn btn-sm btn-danger">Hapus</a>

                    </td>
                  
                  </tr>
                  <?php endforeach; ?>
                 
                  
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
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Guru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?= form_open_multipart(base_url().'Manajemen_guru/input_data'); ?>
           
         <div class="row">

          <div class="col-md-6">
            <div class="form-group">
            <label for="nip">Nip</label>
            <input type="text" name="nip" class="form-control <?= form_error('nip') ? 'is-invalid' : null ?>" value="" required>
            <?= form_error('nip'); ?>
          </div>
       
          <div class="form-group">
            <label for="nama">nama</label>
            <input type="text" name="nama" class="form-control <?= form_error('nama') ? 'is-invalid' : null ?>" value="" required>
            <?= form_error('nama'); ?>
          </div>
            <div class="form-group">
            <label for="jenis_kelanin">jenis_kelanin</label>
            <select name="jenis_kelamin" id="" class="form-control">
              <option value="Laki-laki">Laki-laki</option>
              <option value="Perempuan">Perempuan</option>
            
            </select>
          </div>
        </div>
        <div class="col-md-6">
         <div class="form-group">
            <label for="username">username</label>
            <input type="text" name="username" class="form-control <?= form_error('username') ? 'is-invalid' : null ?>" value="" required>
            <?= form_error('username'); ?>
          </div>
          <div class="form-group">
            <label for="tgl_lahir">tgl_lahir</label>
            <input type="date" name="tgl_lahir" class="form-control <?= form_error('tgl_lahir') ? 'is-invalid' : null ?>" value="" required>
            <?= form_error('tgl_lahir'); ?>
          </div>
          <div class="form-group">
            <label for="password">password</label>
            <input type="password" name="password" class="form-control <?= form_error('password') ? 'is-invalid' : null ?>" value="" required>
            <?= form_error('password'); ?>
          </div>
          
          
          
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label for="status">status</label>
            <select name="status" id="" class="form-control">
              <option value="Aktif">Aktif</option>
              <option value="Nonaktif">Nonaktif</option>
            
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