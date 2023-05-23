 <style>
   
 </style>
 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Manajemen  Siswa</h1>
          </div>
      </section>
      
       <span class=""><?= $this->session->flashdata('pesan') ?> </span>
        <div class="alert alert-success" role="alert">
                 
                  <h4 class="text-white">Manajemen siswa</h4>
                  <p>Hanya admin yang dapat mengaktifkan, menonaktifkan dan menghapus data siswa!</p>
                  <hr>
                  <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                </div>
       <div class="card">
              <div class="card-header">
                
               
              </div>
              <!-- /.card-header -->
              <div class="card-body ">
                <div class="table-responsive">
              	 <table id="example" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                  	<th>#</th>
                    <th>NIS</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Status</th>
                    <th>Aksi</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; ?>
                  <?php foreach ($data_siswa as $siswa) : ?>
                     <tr>
                    <td><?=$no++ ?></td>
                    <td>
                      <?= $siswa->nis ?>
                    </td>
                    <td>
                      <?= $siswa->nama ?>
                    </td>
                   <td>
                      <?= $siswa->jenis_kelamin?>
                    </td>
                    <td>
                      <?= $siswa->tanggal_lahir ?>
                    </td>
                    <td>

                      <?php if($siswa->status == "aktif"): ?>
                        <button class="btn btn-sm btn-success">Aktif</button>
                      <?php elseif($siswa->status == "pending"): ?>
                         <button class="btn btn-sm btn-info">Pending</button>
                        <?php elseif($siswa->status == "nonaktif"): ?> 
                           <button class="btn btn-sm btn-danger">Nonaktif</button>
                          
                      <?php endif; ?>
                     
                    </td>
                    <td> 
                      <?php  $st = $siswa->status;  $act=''?>
                      <?php  if($st=='aktif'){$act='nonaktif';}else{$act='aktivasi';} ?>

                       <?php if($siswa->status == "aktif"): ?>
                         <a href="<?= base_url().'Manajemen_siswa/'.$act .'/' . $siswa->id_siswa ?>" class="btn btn-sm btn-warning">Nonaktif</a>
                      <?php elseif($siswa->status == "pending"): ?>
                         <button class="btn btn-sm btn-info">Pending</button>
                        <?php elseif($siswa->status == "nonaktif"): ?> 
                           <a href="<?= base_url().'Manajemen_siswa/'.$act .'/'. $siswa->id_siswa ?>" class="btn btn-sm btn-success">Aktifkan</a>
                          
                      <?php endif; ?>
                     
                     
                      <a href="<?= base_url().'Manajemen_siswa/refuse/'.$siswa->id_siswa ?>" class="btn btn-sm btn-danger">Hapus</a>

                    </td>
                  
                  </tr>
                  <?php endforeach; ?>
                 
                  
              </tbody>
          </table>
          </div>
              </div>

       </div>
    
  </div>