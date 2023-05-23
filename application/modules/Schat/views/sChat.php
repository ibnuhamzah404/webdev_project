 

<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Chat</h1>
          </div>
          </section>

      
       

          <div class="row">
            <div class="col-md-12">
           <div class="card">
                  <div class="card-header bg-dark">
                    <h4 class="text-white">Chat Room</h4>
                  	<h4  style=" position: absolute; right: 20px;"> <?= date("d/m/Y"); ?> </h4>
                  </div>
                  
                  <div class="card-body">
                 
                   <div class="card chat-box border" id="mychatbox">
                  <div class="card-header border-bottom">
                    <h4>Chat</h4>
                  </div>
                  <div class="card-body chat-content  " tabindex="2" style="overflow: hidden; outline: none;">
                    <div class="box-chat">
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
                     </div>
                  <div class="card-footer chat-form border-top">
                  <form action="" id="formChat">
                      <input id="message" name="pesan" type="text" class="form-control" placeholder="Type a message">
                      <button  id="kirimPesan" type="submit" class="btn btn-primary">
                        <i class="far fa-paper-plane"></i>
                      </button>

                </form>
                  </div>
                  
                </div>
                  </div>
                 	
                 
     
                  <div class="card-footer bg-whitesmoke">
                   
                  </div>
                </div>
                </div>
              
              <script>
                $(document).ready(function() {
                 
                });

                $('#formChat').on('submit', function chat(){
                  
                   var dataChat = $("#formChat").serialize();

                    $.ajax({
                      url : '<?= base_url() ?>sChat/kirimPesan',
                      method : 'POST',
                   
                      data: dataChat,
                      
                      success : function(data){
                          location.reload();
                           

                         

                      },
                      error: function() {   alert('gagal') 
                      createToast('fail', 'bg-danger', 'failed-request', 'gagal mendapatkan produk'); }
                    });
                
                    return false;

                });  
              </script>

   
        







       