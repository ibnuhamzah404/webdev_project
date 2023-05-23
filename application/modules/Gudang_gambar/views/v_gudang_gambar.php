 <style>
   
 </style>
 <div class="main-content">
        <section class="section">
          <div class="section-header">

            <h1>Gudang Gambar</h1>
          </div>
      </section>
      
       <span class=""><?= $this->session->flashdata('pesan') ?> </span>
        <div class="alert alert-info" role="alert">
                 
                  <h4 class="text-white">Gambar</h4>
                  <p>Hanya admin yang dapat mengaktifkan, menonaktifkan dan menghapus data materi</p>
                  <hr>
                
                </div>
       <div class="card">
              <div class="card-header">
                <a   href="<?= base_url('Produk/tambah_produk_aksi') ?>" class="btn text-white btn-primary rounded" data-toggle="modal" data-target="#exampleModalCenter"> Tambah Gambar </a>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                 <table id="example" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                  <th>gambar</th>
                    <th>Judul</th>
                    <th> Link </th>
               
                     <th>Aksi</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    <?php foreach($data_g_gambar as $g_gambar): ?>
                      <tr>
                        <td><img src="<?= base_url('assets/upload/') . $g_gambar->path?>" alt="" width="100" height="100"></td>
                        <td><?= $no++ ?></td>
                        <td><?= $g_gambar->nama  ?></td>

                        <td id="text<?=$no ?>"> <?= base_url('assets/upload/') . $g_gambar->path ?></td>
                        <td><button class="btn btn-sm btn-info" onclick="copyToClipboard(`#text`, <?= $no ?>)">Copy</button>
                            <a onclick="javascript : return confirm('anda yakin akan menghapus data ini ? ')" href="<?=base_url().'Gudang_gambar/delete/' .$g_gambar->id ?>" class="btn btn-sm btn-danger">Hapus</a></td>
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
            <table class="table table-bordered table-hover">
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
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Gambar</h5>
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
          
          
          <div class="col-md-12">
           <div class="form-group">
            <label for="file">file</label>
            <input type="file" name="file" class="form-control <?= form_error('file') ? 'is-invalid' : null ?>" value="" >
            <?= form_error('file'); ?>
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
          <div class="progress">
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
         var count = 1;
        $('#submit').submit(function(e){
          count+=1;
         
            e.preventDefault(); 
                 $.ajax({
                     url:'<?php echo base_url();?>Gudang_gambar/input_data',
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

                        setTimeout(function(){
                            location.reload();
                          
                        }, 3000)



                       
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

<script>
function copyToClipboard(element, no) {
  var $temp = $("<input>");
  $("body").append($temp);

  $temp.val($(element + no).text()).select();
  document.execCommand("copy");
  $temp.remove();
}
</script>
