<style>
</style>
<div class="main-content">
<section class="section">
   <div class="section-header">
      <h1>Susun Tryout</h1>
   </div>
</section>
<span class=""><?= $this->session->flashdata('pesan') ?> </span>
<div class="alert alert-info" role="alert">
   <h4 class="text-white">Susun Tryout</h4>
   <p> Menu ini berisi untuk gurum, guru dapat membuat, mengedit, menghapus ulangan disini, hanya guru yang berhak memodifikasi pada halaman ini!</p>
   <hr>
</div>
<div class="card">
   <div class="card-header">
      <a   href="<?= base_url('Produk/tambah_produk_aksi') ?>" class="btn text-white btn-primary rounded" data-toggle="modal" data-target="#exampleModalCenter"> Tambah Ulangan </a>
      <div class="dropdown">
         <a  class="ml-3 btn text-white btn-primary rounded" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Tryout Menu
         </a>
         <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" data-toggle="modal" data-target="#modalTryout" href="#">Tambah Tryout</a>
            <a class="dropdown-item"  data-toggle="modal" data-target="#detailTryout" href="#">Lhat Tryout</a>
         </div>
      </div>
   </div>
   <!-- /.card-header -->
   <div class="card-body">
      <div class="table-responsive">
         <table id="example" class="table table-bordered table-hover">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Status Ulangan</th>
                  <th> Tanggal Pembuatan</th>
                  <th> Judul Paket Ulangan </th>
                    <th> Judul Paket Soal </th>
                   <th> Judul Tryout</th>
                  <th> Jurusan Ujian</th>
                  <th>Jenis Materi Ujian</th>
                  <th>pembuat</th>
                  <th>Waktu ulangan</th>
                  <th> Aksi Upload Ujian</th>
                  <th>Aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php $no=1; ?>
               <?php foreach ($data_to as $to) : ?>
               <tr>
                  <td><?=$no++ ?></td>
                  <td>  
                     <a  href="" class="mt-2 btn btn-sm <?php if($to->status == 'publikasi'): ?> btn-success <?php else: ?> btn-danger<?php endif; ?>"><?= $to->status ?></a>
                  </td>
                  <td><?= $to->tanggal_pembuatan ?></td>
                  <td>
                     <?= $to->judul_ulangan?>
                  </td>
                
                     <?php foreach($data_ulangan as $dt_ul): ?>
                        <?php if($to->id_ulangan == $dt_ul->id_ulangan): ?>
                     <td><?= $dt_ul->judul_ulangan ?></td>
                   <?php endif; ?>
                     <?php endforeach; ?>
                       <?php foreach($data_ptrout as $dt_pt): ?>
                        <?php if($to->id_tryout == $dt_pt->id): ?>
                     <td><?= $dt_pt->nama ?></td>
                   <?php endif; ?>
                     <?php endforeach; ?>
                  <td>
                     <?= $to->jurusan_ujian?>
                  </td>
                  <td>
                     <?= $to->jenis_materi_ujian ?>
                  </td>
                  <td>
                     <?= $to->pembuat ?>
                  </td>
                  <td>
                     <?= $to->waktu ?> Menit
                  </td>
                  <td>
                     <?php if($to->status == 'draft'): ?>
                     <a href="<?= base_url().'Tryout/statusUlangan/publikasi/' . $to->id ?>" class="mt-2  btn btn-sm btn-dark">Publikasikan Ujian</a>
                     <?php elseif($to->status == 'publikasi'): ?>
                     <a href="<?= base_url().'Tryout/statusUlangan/draft/' . $to->id ?>" class="mt-2  btn btn-sm btn-dark">Draft Ujian</a>
                     <?php endif; ?>
                  </td>
                  <td>
                     <a href="<?= base_url().'Tryout/edit_tryout/'. $to->id ?>" class="mt-2 btn btn-sm btn-warning">Edit</a>
                     <a  onclick="javascript : return confirm('anda yakin akan menghapus data ini ? ')" href="<?= base_url().'Tryout/delete/'. $to->id ?>" class="mt-2 btn btn-sm btn-danger">Hapus</a>
                  </td>
               </tr>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div>
   </div>
</div>
<div class="modal fade" id="detailTryout" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Detail Tryout</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <?= form_open_multipart(base_url().'Tryout/input_ptrout'); ?>
            <div class="table-responsive">
               <table id="example" class="table table-bordered table-hover">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th> Jurusan Ujian</th>
                        <th>Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $no=1; ?>
                     <?php foreach ($data_ptrout as $dpt) : ?>
                    
                      <tr>
                         <td><?= $no++ ?></td>
                        <td><?= $dpt->nama ?></td>
                         <td><?= $dpt->jurusan_ujian?></td>
                         <td>
                     <a href="<?= base_url().'Tryout/edit_sub_to/'. $dpt->id ?>" class="mt-2 btn btn-sm btn-warning">Edit</a>
                     <a onclick="javascript : return confirm('anda yakin akan menghapus data ini ? ')" href="<?= base_url().'Tryout/delete_to/'. $dpt->id ?>" class="mt-2 btn btn-sm btn-danger">Hapus</a>
                  </td>
                      </tr>
                    
                     <?php endforeach; ?>
                  </tbody>
               </table>
            </div>
            <div class="modal-footer">
            </div>
            <?= form_close();  ?>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="modalTryout" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Tambah Tryout</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <?= form_open_multipart(base_url().'Tryout/input_ptrout'); ?>
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                     <label for="judul">Judul Tryout</label>
                     <input type="text" name="judul_ptrout" class="form-control <?= form_error('judul') ? 'is-invalid' : null ?>" value="" required>
                     <?= form_error('judul'); ?>
                  </div>
                   <div class="form-group">
                  <label for="jurusan_ujian">Jurusan Ujian</label>
                  <select name="jurusan_ujian" id="" class="form-control"  required>
                     <option value="">--Pilih Jurusan Ujian--</option>
                     <option value="saintek">Saintek</option>
                     <option value="soshum">Soshum</option>
                     <!--  <option value="campuran">campuran</option> -->
                  </select>
                  <?= form_error('jurusan_ujian'); ?>
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
</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
   <div class="modal-content">
      <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLongTitle">Tambah Tryout</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <div class="modal-body">
         <?= form_open_multipart(base_url().'Tryout/input_tryout'); ?>
         <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                  <label for="judul">Judul </label>
                  <input type="text" name="judul" class="form-control <?= form_error('judul') ? 'is-invalid' : null ?>" value="" required>
                  <?= form_error('judul'); ?>
               </div>
            </div>
            <div class="col-md-12">
               <div class="form-group">
                  <label for="jenis_materi_ujian">Pilih tryout</label>
                  <select name="ptrout" id="" class="form-control"  required>
                     <option value="">--Pilih Tryout Ke---</option>
                     <?php foreach($data_ptrout as $dt_pt): ?>
                     <option value="<?= $dt_pt->id ?>"><?= $dt_pt->nama ?></option>
                     <?php endforeach; ?>
                     <!--   <option value="TPA">TPA</option> -->
                  </select>
                  <?= form_error('jenis_materi_ujian'); ?>
               </div>
            </div>
            <?php 
               date_default_timezone_set('Asia/Jakarta');// Date object using current date and time
               $tanggal = date('Y-m-d\TH:i:s'); ?>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="judul">Tanggal pembuatan</label>
                  <input type="datetime-local" name="tanggal_pembuatan" class="form-control <?= form_error('tanggal_pembuatan') ? 'is-invalid' : null ?>" value="<?= $tanggal ?>" required>
                  <?= form_error('tanggal_pembuatan'); ?>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="jurusan_ujian">Jurusan Ujian</label>
                  <select name="jurusan_ujian" id="" class="form-control"  required>
                     <option value="">--Pilih Jurusan Ujian--</option>
                     <option value="saintek">Saintek</option>
                     <option value="soshum">Soshum</option>
                     <!--  <option value="campuran">campuran</option> -->
                  </select>
                  <?= form_error('jurusan_ujian'); ?>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="jenis_materi_ujian">Jenis Materi Ujian</label>
                  <select name="jenis_materi_ujian" id="" class="form-control"  required>
                     <option value="">--Pilih Jenis Materi Ujian--</option>
                     <option value="TKA">TKA</option>
                     <option value="TPS">TPS</option>
                     <!--   <option value="TPA">TPA</option> -->
                  </select>
                  <?= form_error('jenis_materi_ujian'); ?>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="waktu_ujian">Waktu Ujian(*menit)</label>
                  <input type="number" name="waktu_ujian" class="form-control <?= form_error('waktu_ujian') ? 'is-invalid' : null ?>" value="" required>
                  <?= form_error('waktu_ujian'); ?>
               </div>
            </div>
            <div class="col-md-12">
               <div class="form-group">
                  <label for="waktu_ujian">Pilih Paket Tryot</label>
                  <section class="border p-4 mb-4 d-flex justify-content-center">
                     <div class="table-responsive">
                        <table id="ex" class="table table-bordered table-hover">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th> Judul Ulangan </th>
                                 <th>pembuat</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach ($data_ulangan as $ulangan) : ?>
                              <tr>
                                 <td><input class="cbx_id_ulangan" type="checkbox" value="<?= $ulangan->id_ulangan ?>" name="id_ulangan"></td>
                                 <td>
                                    <?= $ulangan->judul_ulangan?>
                                 </td>
                                 <td>
                                    <?= $ulangan->pembuat ?>
                                 </td>
                              </tr>
                              <?php endforeach; ?>
                           </tbody>
                        </table>
                  </section>
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
</div>
<script>
   $('button.btn-primary').on('click', function(){
     if( $('input:checkbox:checked').length == 0){
        $('.cbx_id_ulangan').prop('required', true);
   
     }else{
        $('.cbx_id_ulangan').prop('required', false);
     }
   
   
   
   });
   var count = 1;
   
    $('.cbx_id_ulangan').on('click', function(){
         count+=1;
       
         if(count > 1){
              $('input:checkbox').prop('checked', false)
         }
   
        
         $(this).prop('checked', true)
    })
   
   
   
   
</script>