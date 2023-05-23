<div class="main-content">
  
    <section class="section">
        
          <div class="section-header">

            <h1>Tugas</h1>
            </div>
        </section>
        <span class=""><?= $this->session->flashdata('pesan') ?> </span>
        <div class="row">
         <div class="col-md-8">
              <div class="card">
                
                  <div class="card-header">
                    <h4>Tugas</h4>
                  </div>
                  <div class="card-body">
                   <div id="accordion">


                   <?php foreach ($data_tugas as $tugas): ?>
                     <div class="accordion mb-3">

                        <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-<?=$tugas->id_tugas ?>" aria-expanded="true">
                           <small style="float: right;"><?=$tugas->tanggal_posting ?></small>

                          <h4><?= $tugas->kelas ?> | <?=$tugas->judul_tugas ?></h4>
                        </div>
                        <div class="accordion-body collapse show" id="panel-body-<?=$tugas->id_tugas ?>" data-parent="#accordion">
                        
                            <table id="example" class="table table-bordered table-hover">
                               <tr>
                                <th>Guru<br></th><td><?=$tugas->pembuat  ?></td>
                              </tr>
                              <tr>
                                <th>Judul Tugas<br></th><td><?=$tugas->judul_tugas  ?></td>
                              </tr>
                              <tr>
                              
                                  <th> Deskripsi <br> Tugas</th><td> <p class="mb-0"><?= $tugas->deskripsi_tugas ?></p></td>
                                </tr>
                                <tr>
                                  <th> Aksi</th>
                                  <td> <a href="<?=base_url().'sTugas/v_detail/'. $tugas->id_tugas ?>" class="btn btn-md btn-primary">detail</a></td>
                                </tr>
                               
                                 
                              
                            </table>
                          

                           
                         
                            
                         
                        </div>
                      </div>
                   <?php endforeach ?>
                    
                     
                      
                      
                     
                  </div>
                    
                   
                     
                    
                   
                   </div>
              </div>
            
         </div>
           <div class="col-4 col-sm-6 col-lg-4">
           
                <div class="card chat-box" id="mychatbox">
                  <div class="card-header">
                    <h4>Chat</h4>
                  </div>
                  <div class="card-body chat-content" tabindex="2" style="overflow: hidden; outline: none;">
                    
                    <?php foreach($data_chat as $chat): ?>
                  
                  <div class="chat-item
                  <?php if($chat->role_level == 'siswa' ): ?>
                    chat-right
                  <?php else: ?>
                    char-left
                  <?php endif; ?>
                    "  style="">
                    <img src="<?=base_url().'/assets/customer/img/avatar/avatar-1.png' ?>">
                    <div class="chat-details">
                      <div class="chat-text">
                      <?= $chat->pesan ?>
                      </div>
                       <div class="chat-time text-danger"><?= $chat->user ?></div>
                    <div class="chat-time"><?= $chat->tanggal ?></div>

                    </div>
                    </div>
                  <?php endforeach; ?>
                     </div>
                  <div class="card-footer chat-form">
                  <?= form_open_multipart(base_url().'Stugas/chat'); ?>
                      <input id="message" name="pesan" type="text" class="form-control" placeholder="Type a message">
                      <button  type="submit" class="btn btn-primary">
                        <i class="far fa-paper-plane"></i>
                      </button>

                   <?= form_close() ?>
                  </div>
                  
                </div>
              </div>
         
              </div>
         </div>
         
       
</div>
