 <style>
   
 </style>
 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Form whatsapp</h1>
          </div>
      </section>
      
       <span class=""><?= $this->session->flashdata('pesan') ?> </span>
        <div class="alert alert-success" role="alert">
                 
                  <h4 class="text-white">Form Whatsapp</h4>
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
                    
                    <th>Nama</th>
                    <th>Nomer Wa</th>
                    <th>Aksi</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; ?>
                  <?php foreach ($data_form_wa as $form_wa) : ?>
                     <tr>
                    <td><?=$no++ ?></td>
                    <td>
                      <?= $form_wa->nama ?>
                    </td>
                    <td>
                      <?= $form_wa->no_wa ?>
                    </td>
                    <td>
                     <a href="<?= base_url().'Admin_form_wa/delete_data/'.$form_wa->id ?>" class="btn btn-sm btn-danger">Delete</a>
                      <a target="_BLANK" href="https://api.whatsapp.com/send/?phone=<?=$form_wa->no_wa?>&text&app_absent=0" class="btn btn-sm btn-success">Chat</a>
                      <a href="" class="btn btn-sm btn-warning">Clipboard</a>
                    </td>
                  
                    
                    
                    
                  
                  </tr>
                  <?php endforeach; ?>
                 
                  
              </tbody>
          </table>
          </div>
              </div>

       </div>
    
  </div>