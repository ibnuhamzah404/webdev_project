 <style>
   
 </style>
 <div class="main-content">
        <section class="section">
          <div class="section-header">

            <h1>Manajemen Materi Siswa</h1>
          </div>
      </section>
      
       <span class=""><?= $this->session->flashdata('pesan') ?> </span>
        <div class="alert alert-info" role="alert">
                 
                  <h4 class="text-white">Materi</h4>
                  <p>Hanya admin yang dapat mengaktifkan, menonaktifkan dan menghapus data materi</p>
                  <hr>
                
                </div>
       <div class="card">
              <div class="card-header">
                <a   href="<?= base_url('Produk/tambah_produk_aksi') ?>" class="btn text-white btn-primary rounded" data-toggle="modal" data-target="#exampleModalCenter"> Tambah Materi </a>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
              	 <table id="example" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                  	<th>#</th>
                    <th> Jenis Materi </th>
                    <th>Judul</th>
                    <th>Kelas</th>
                  
                   
                    <th>Tanggal Posting</th>
                    <th>Pembuat</th>
                     <th>Aksi</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; ?>
                  <?php foreach ($data_materi as $materi) : ?>
                     <tr>
                    <td><?=$no++ ?></td>
                    
                       <?php $gb=  $materi->jenis_materi   ?>
                    <?php if ($gb == 'V'): ?>
                      <td>Visual</td>
                    <?php elseif($gb == 'A'): ?>
                        <td>Audio</td>
                     <?php elseif($gb == 'R'): ?>
                       <td>Read/Write</td>
                      <?php elseif($gb == 'K'): ?> 
                      <td>Kinetic</td>
                    <?php endif ?>
                                            
                    
                    <td>
                      <?= $materi->judul_materi?>
                    </td>
                    <td>
                      <?= $materi->kelas ?>
                    </td>
                    
                    <td>
                      <?= $materi->tanggal_posting ?>
                    </td>
                    <td>
                      <?= $materi->pembuat ?>
                    </td>
                    <td>
                       <a href="<?= base_url().'Materi/p_update_data/'.$materi->id_materi ?>" class="btn btn-sm btn-warning">edit</a>
                      <a href="" class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#exampleModalCenter2">Detail</a>
                      <a href="<?=base_url().'Materi/delete/' .$materi->id_materi ?>" class="btn btn-sm btn-danger">Hapus</a>
                    <!--   <a type="button" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Detail"><i class="far fa-file-alt text-white"></i> 
                     
                    </a> -->
                  
                    </td>
                    
                  
                  </tr>
                  <?php endforeach; ?>
                  
                 
                  
                 </tbody>
          </table>
              </div>
            </div>

       </div>
    
  </div>

    <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Detail Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?= form_open_multipart(base_url().'Manajemen_kelas/input_data'); ?>
           
         <div class="row">

          <div class="col-md-12">
            <table class="table table-bordered table-hover"">
              <tr> 
                <td> hellow</td>
                <td> iya</td></tr>
            </table>
        
            
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

   <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Materi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pb-0">


     <form class="form-horizontal" id="submit">
           <div class="overlay">
              <i class="fa fa-refresh fa-spin"></i>
            </div>
         <div class="row">
          <div class="col-md-12">
            <div class="form-group">
            <label for="judul">*judul</label>
            <input type="text" name="judul" class="form-control <?= form_error('judul') ? 'is-invalid' : null ?>" value="" required>
            <?= form_error('judul'); ?>
          </div>
          </div>
          <div class="col-md-6">
           <div class="form-group">
            <label for="kelas">*kelas</label>
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
            <input type="file" name="file" class="form-control <?= form_error('file') ? 'is-invalid' : null ?>" value="" >
            <?= form_error('file'); ?>
          </div>
         
          </div>

            <div class="col-md-12">
            <div class="form-group">
            <label for="jenis_materi">*jenis_materi</label>
            <select name="jenis_materi" id=""class="form-control" >
              <option value="V">Visual</option>
              <option value="A">Audio</option>
              <option value="R">Read</option>
              <option value="K">Kinetic</option>
              
              
            </select>
          </div>
          </div>

           <div class="col-md-12">
            <div class="form-group">
            <label for="judul">*Deskripsi materi</label>
            <textarea name="deskripsi_materi" class="form-control <?= form_error('file') ? 'is-invalid' : null ?>">
              
            </textarea>
          </div>
          </div>

          <div class="col-md-12">
            <div class="form-group">
            <label for="judul">Link Embed Vidio</label>
            <textarea name="embed" class="form-control <?= form_error('file') ? 'is-invalid' : null ?>">
              
            </textarea>
          </div>
          </div>
         
        </div>
        
        
      </div>
      <div class="col-md-12">
        <div class="form-group px-2">
          <div class="alert alert-success" role="alert" style="display: none;">
             Berhasil mengupload file!
          </div>
           <div class="alert alert-danger" role="alert" style="display: none;">
             gagal mengupload file!
          </div>
          <div class="progress"">
            <div class="progress-bar" id="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:0%">
              <span id="status">0%</span>
            </div>
          </div>
        </div>
      </div>
       
      <div class="modal-footer">
        <a  type="button" class="btn btn-secondary" data-dismiss="modal">Close</a>
        <button type="submit" id="btnSub"  class="btn btn-primary">
      
           Kirim</button>
      </div>
     </form>
    </div>
  </div>
</div>


<script>
 $(document).ready(function(){
        var spinner = $('.spinner-border');
        var pbar = $('.progress-bar');
         var upstatus = $('#status');
         var insucces = $('.alert-success');
          var indanger = $('.alert-danger');
         var progres = $('.progress');
         var btnSub  = $('#btnSub');
        $('#submit').submit(function(e){
            e.preventDefault(); 
                 $.ajax({
                     url:'<?php echo base_url();?>Materi/input_data',
                     type:"post",
                     data: new FormData(this),
                     processData:false,
                     contentType:false,
                     cache:false,
                      tryCount : 0,
                     retryLimit : 3,
                     beforeSend: function(){
                    
                      btnSub.html('Sedang dikirim...');

                     },
                     xhr: function() {
                       btnSub.append(' <div class="spinner-border text-secondary mr-1" role="status" style="height : 15px; width : 15px;"></div>');
                      var xhr = new window.XMLHttpRequest();
                      xhr.upload.addEventListener("progress", function(evt) {
                          if (evt.lengthComputable) {
                              var percentComplete = Math.round((evt.loaded / evt.total) * 100);
                              console.log(percentComplete);
                              pbar.css('width', percentComplete + '%');
                              upstatus.html(percentComplete + '%');

                          }
                      }, false);
                      return xhr;
    },
                    

                      success: function(data){
                        
                        insucces.css('display', 'block');
                        progres.css('display', 'none');
                         btnSub.html('terkirim..');
                         spinner.css('display', 'none');
                       
                   },
                    error : function(xhr, textStatus, errorThrown ) {
                          if (textStatus == 'timeout') {
                              this.tryCount++;
                              if (this.tryCount <= this.retryLimit) {
                                  //try again
                                  $.ajax(this);
                                  return;
                              }            
                              return;
                          }
                          if (xhr.status == 500) {
                              //handle error
                          } else {
                              //handle error
                          }
                      }
                 });
            });
         
 
    });

</script>