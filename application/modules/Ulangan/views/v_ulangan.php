 <style>
   
 </style>
 <div class="main-content">
        <section class="section">
          <div class="section-header">

            <h1>Manajemen Paket Soal Tryout</h1>
          </div>
      </section>
    
         <span class=""><?= $this->session->flashdata('pesan') ?> </span>

     
        <div class="alert alert-info" role="alert">
                 
                  <h4 class="text-white">Paket Tryout</h4>
                  <p> Menu ini berisi untuk gurum, guru dapat membuat, mengedit, menghapus ulangan disini, hanya guru yang berhak memodifikasi pada halaman ini!</p>
                  <hr>
                 
                </div>
       <div class="card">
              <div class="card-header">
                <a   href="<?= base_url('Produk/tambah_produk_aksi') ?>" class="btn text-white btn-primary rounded" data-toggle="modal" data-target="#exampleModalCenter"> Tambah Paket Soal </a>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
              	 <table id="example" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                  	<th>#</th>
               
                    <th> Tanggal Pembuatan</th>
                    <th> Judul Paket Soal </th>
                   
                   
                   
                  
                   <th>pembuat</th>
                    
                  
                 
                  
                     <th>Aksi</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; ?>
                  <?php foreach ($data_ulangan as $ulangan) : ?>
                     <tr>
                    <td><?=$no++ ?></td>
                   

                    <td><?= $ulangan->tanggal_pembuatan ?></td>
                    <td>
                      <?= $ulangan->judul_ulangan?>
                    </td>
                   
                   
                    <td>
                      <?= $ulangan->pembuat ?>
                    </td>
                   
              
                    <td>
                      
                    <a href="<?= base_url().'Ulangan/v_tambah_soal/' . $ulangan->id_ulangan ?>" class="mt-2  btn btn-sm btn-success">Buat Soal</a>
                     <a href="<?= base_url().'Ulangan/cek_hasil/' .$ulangan->id_ulangan . '/' .$ulangan->kelas?>" class="mt-2  btn btn-sm btn-primary">Cek hasil</a>
                     <a href="<?= base_url().'Ulangan/v_lihat_soal/' . $ulangan->id_ulangan ?>" class="mt-2 btn btn-sm btn-info">Lihat Soal</a>
                    <a href="<?= base_url().'Ulangan/edit_ulangan/'. $ulangan->id_ulangan ?>" class="mt-2 btn btn-sm btn-warning">Edit</a>
                     <a  onclick="javascript : return confirm('anda yakin akan menghapus data ini ? ')" href="<?= base_url().'Ulangan/delete/'. $ulangan->id_ulangan ?>" class="mt-2 btn btn-sm btn-danger">Hapus</a>
                    
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
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Materi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?= form_open_multipart(base_url().'Ulangan/input_ulangan'); ?>
           
         <div class="row">
          <div class="col-md-12">
            <div class="form-group">
            <label for="judul">judul ulangan</label>
            <input type="text" name="judul" class="form-control <?= form_error('judul') ? 'is-invalid' : null ?>" value="" required>
            <?= form_error('judul'); ?>
          </div>
          </div>
        
          <div class="col-md-12">
          <div class="form-group">
            <label for="judul">Tanggal pembuatan</label>
           <input type="datetime-local" name="tanggal_pembuatan" class="form-control <?= form_error('tanggal_pembuatan') ? 'is-invalid' : null ?>" value="" required>
            <?= form_error('tanggal_pembuatan'); ?>
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