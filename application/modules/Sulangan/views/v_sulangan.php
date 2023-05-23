<style>
   input[type="radio"]{
   margin-top: 7px;
   padding-right: 5px;
   margin-right: 10px;
   visibility: hidden;
   }
   p{
       font-weight : normal !important;
   }
   .box-flex{
   align-items: center;
   width: auto;
   flex-wrap: wrap;
   margin: 0 auto;
   padding : 20px 10px;
   }
   .box-flex .box{
   align-items: center;
   justify-content: center;
   font-weight: bold;
   font-size: 18px;
   width: 50px;
   height: 50px;
   background-color: #3abaf4;
   margin: 10px 5px;
   }  
   .bg-violet{
   background-color: rebeccapurple !important;
   color : #fff !important;
   font-weight: bold !important;
   }
   .con-pg{
   background-color: fff;
   /* background-color: rebeccapurple;*/
   color:   rebeccapurple;
   margin: 20px 0px;
   box-shadow: 0px 3px 10px 0px rgba(164,174,174,0.55);
   border-radius: 5px;
   }
   .con-pg:hover{
   cursor: pointer;
   }
   <?php $url =  base_url(uri_string());
      $keywords = explode('/', $url);
      
      
      
      ?>
   .con-pg input{
   }
   .con-pg{
   padding: 10px;
   }
   .con-pg input, p{
   margin: auto 10px auto 0 !important;
   } 
   
    .body-soal{
          overflow-x : scroll;
      }
   
   
  @media only screen and (max-width: 600px) { 
      .body-soal{
          overflow-x : scroll;
      }
  }
</style>
<div class="overlay-wrapper" style="
   display: none;
   position:absolute;
   background-color: #888888;
   top: 0px;
   opacity: 0.5;
   height:1000px;
   overflow:hidden;
   bottom: 0px;
   right: 0px;
   left: 0px;
   z-index: 1000;
   "></div>
   
<div class="main-content">
<section class="section">
   <div class="section-header">
      <h1>Ujian</h1>
   </div>
</section>
<div class="row">
   <div class="col-md-8">
      <div class="card">
         <div class="card-header bg-dark">
            <h4 class="text-white">Ujian Pilihan Ganda</h4>
            <h4  style=" position: absolute; right: 20px;"> <?= date("d/m/Y"); ?> </h4>
         </div>
         <div class="card-body" >
            <h4 class="text-primary"> Soal </h4>
         </div>
         <?= form_open_multipart(base_url().'Sulangan/finish_ujian/'. $keywords[6]  . '/' . $keywords[7]) ?>
         <p class="d-none" id="id_ulangan"><?=$keywords[6] ?></p>
         <p class="d-none" id="id_to"><?=$keywords[8] ?></p>
         <input type="hidden" name="id_ulangan" value="<?= $id_ulangan ?>">
         <input type="hidden" id="temp_jawaban" name="temp_jawaban" value="">
         <?php foreach($data_soal as $ulangan): ?>
         <div class="card-body body-soal">
           <div class="d-flex">
               <div class="nsoal">
            <p class="noSoal"><?=$keywords[7] ?></p>
            </div>
            <div class="" style="align-items: center;     width: -webkit-fill-available;
}">
               <p  style="font-size: 18px; margin : 0 ; font-weight: bold;"><?= $ulangan->soal ?> </p>
            </div>
         </div>
            <input type="hidden" name="pilihan[<?=$ulangan->id_soal ?>]" value="<?= $ulangan->id_soal ?>">
            <div class="d-flex con-pg">
               <input type="radio" name="pg[<?=$ulangan->id_soal ?>]"value="A">
               <div class="mr-2 d-flex" 
                  for="">
                  <p>A.</p>
                  <?=$ulangan->pg_a ?>
               </div>
               <br>
            </div>
            <div class="d-flex con-pg">
               <input type="radio"  name="pg[<?=$ulangan->id_soal ?>]"value="B" >
               <div class="mr-2 d-flex" for="">
                  <p>B.</p>
                  <?=$ulangan->pg_b ?>
               </div>
               <br>
            </div>
            <div class="d-flex  con-pg">
               <input type="radio"  name="pg[<?=$ulangan->id_soal ?>]"value="C" >
               <div class="mr-2 d-flex" for="">
                  <p>C.</p>
                  <?=$ulangan->pg_c ?>
               </div>
               <br>
            </div>
            <div class="d-flex con-pg ">
               <input type="radio"  name="pg[<?=$ulangan->id_soal ?>]"value="D" class="rdCheck" >
               <div class="mr-2 d-flex" for="">
                  <p>D.</p>
                  <?=$ulangan->pg_d ?>
               </div>
               <br>
            </div>
            <div class="d-flex con-pg ">
               <input type="radio"  name="pg[<?=$ulangan->id_soal ?>]"value="E" class="rdCheck" >
               <div class="mr-2 d-flex" for="">
                  <p>E.</p>
                  <?=$ulangan->pg_e ?>
               </div>
               <br>
            </div>
         </div>
         <?php endforeach; ?>
         <?php form_close() ?>
         <div class="card-footer bg-whitesmoke">
            <!--     <a href="<?= base_url().'Sulangan' ?>" class="btn btn-md btn-warning">Kembali</a> -->
            <?php $next = $keywords[7] + 1; ?>
            <?php $prev = $keywords[7] + 1;  ?>
            
            <?php if ($keywords[7] <= 0 || $keywords[7] > $jum_data) {
               redirect(base_url().'Sulangan/mulai_ulangan/19/1');
               } ?>
            <a  id="prevBtn"href="<?= base_url().'Sulangan/mulai_ulangan/' .$keywords[6] . '/' . intval($keywords[7] - 1) . '/' . $keywords[8] ?>" class="btn btn-md btn-warning  <?php if ($keywords[7] == 1) {
               echo 'd-none';
               }else{
               echo 'd-inline';
               } ?>">Prev</a>
            <a id="nextBtn"href="<?= base_url().'Sulangan/mulai_ulangan/' .$keywords[6] .  '/' . intval($keywords[7]+1). '/' . $keywords[8]  ?>" class="btn btn-md btn-warning <?php if ($keywords[7] == $jum_data) {
               echo 'd-none';
               }else{
               echo 'd-inline';
               } ?>">Next</a>
         </div>
      </div>
   </div>
   <div class="col-md-4">
      <div class="card">
         <div class="card-header bg-dark text-white">Navigasi Soal</div>
         <div class="card-body">
            <div class="d-flex box-flex">
               <?php for ($i = 1; $i <= $jum_data; $i++) : ?>
               <div class="cbx box d-flex 
                  <?php if($i == $keywords[7]): ?>
                  <?= ' bg-warning' ?>
                  <?php endif; ?>
                  "><a class="text-white"href="<?= base_url().'Sulangan/mulai_ulangan/' . $id_ulangan .'/' . $i . '/' . $keywords[8]?>"><?=$i ?></a></div>
               <?php endfor; ?>
            </div>
         </div>
         <div class="card-footer bg-secondary">
            <button type="submit"  id="selesai" class="btn btn-lg btn-primary d-inline float-right text-white w-100"  > Kumpulkan</button>
         </div>
      </div>
      <div class="card">
         <?php 
            $dt = $this->session->userdata('username');
            if (!isset($_SESSION['StartTime' . $dt. $keywords[6] ]))
            {
            
            
               $_SESSION['StartTime' . $dt . $keywords[6]] = time();
            
            
                                    }
            
              $Start_Time = $_SESSION['StartTime' . $dt . $keywords[6]];
            
              
                // echo $Mins.":".$Secs."||".$ElapsedTime."||".$_SESSION['StartTime']."||".time();                     
            
               
             ?>
         <?php $timeLocal = "<script>document.write(localStorage.getItem('timer'))</script>"; 
            $timeLocalInt = (int)$timeLocal;
            
            
            ?>
         <?php foreach($data_ulangan as $ul): ?>
         <?php $staticTime = (time() -  $waktu->waktu) ?>
         <?php $waktu_ujian =  $ul->waktu ?>
         <?php $ElapsedTime = ($waktu_ujian * 60) - $staticTime;
            $Mins = intval($ElapsedTime / 60);
          
            $Secs = $ElapsedTime % 60;
            
            
            // echo time(). '-' .$ul->mulai . '='. time() - $ul->mulai;
            // if($Mins < 5 ){
            //   redirect(base_url() . 'Sulangan/detail_ulangan/' . $keywords[6]);
            // }
            ?>           
             <div id="CountDownTimer" data-timer="<?= $ElapsedTime ?>" style="width: 1000px; height: 250px;"></div>              
         <div id="DateCountDown " data-timer="<?= $ElapsedTime ?>" style="padding: 0px;  background-color: #E0E8EF"></div>
      </div>
      <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center">
         <input type="hidden" id="timerUjian"value="<?= $ul->waktu ?>">
         <input type="hidden" value="<?= $keywords[8] ?>" name="id_to">
         <input type="hidden" id="username"value="<?= $this->session->userdata('username'); ?>">
         <!-- Then put toasts within -->
         <div class="toast mb-4" role="alert" aria-live="assertive" aria-atomic="true" style="width : 100%; height: 150px;">
            <div class="toast-header bg-danger text-white">
               <strong class="mr-auto">Peringatan, Selesaikan Segera!!</strong>
               <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="toast-body">
               <b> Waktu anda tinggal <?= $Mins ?> menit detik lagi, jawaban akan dikirim otomatis jika anda tidak menyelesaikannya segera</b>
            </div>
         </div>
      </div>
      <?php endforeach; ?>
   </div>
</div>
<script>
   $("#DateCountDown").TimeCircles({ 
   
           time: { Days: { show: false }, Hours:  { show: true } }});
   
   var waktu = "<?php echo $ElapsedTime; ?>";
   
   
   
   var hasil = waktu * 1000;
   
     
    $(document).ready(function(){
   
    var time =  $('#timerUjian').val();
   
   setTimeout(function(){
     $('.overlay-wrapper').css('display', 'block');
      
    
   
   },parseInt(hasil-10000));
   
   
   
   // set time out 5 sec
   setTimeout(function(){
     $('#selesai').click();
        $('#DateCountdown').css('display', 'none')
        
   
   
   },parseInt(hasil-5000));
    
   });
   
    
</script>   
<script type="text/javascript">
   var d = new Date();
   var n = d.getTime();
   if(JSON.parse(localStorage.getItem(`timer`) == null) ){
   
    localStorage.setItem(`timer`, n);
   }
   
   
   
     var waktu = "<?php echo $ElapsedTime; ?>";
   
   
    
     var hasil = waktu * 1000;
     
     setTimeout(function(){  $(".toast").toast({delay:700000});
               $(".toast").toast("show"); 
               
           
             }, parseInt(hasil-300000)); 
   
      
    
   
   
    
    
   
</script>
<script>
  
   var id_ulangan = $('#id_to').text()
   var username = $('input#username').val();


   if(localStorage.getItem(`ujian${id_ulangan}_${username}`) == null){
        localStorage.setItem(`ujian${id_ulangan}_${username}`, 1);

        for(var i = 1;  i < $('.cbx').length; i++ ){
         localStorage.setItem(`ujian${id_ulangan}_soal${i}_${username}`, '{}')

        }
   }
   $(document).ready(function(){
         
   
           $( "input[type=radio]" ).each(function(i, obj) {
            $(this).on('dblclick',function(){
              
          if($(this).is(':checked'))
          {
            
   
   
            $(this).prop('checked', false); 
          }
   
           });
    });
   
   
    
     $( ".cbx" ).each(function(i, obj) {
       i+=1
      var id_ulangan = $('#id_to').text()
   var noSoal = $('.noSoal').text()
   
      var item = JSON.parse(localStorage.getItem(`ujian${id_ulangan}_soal${i}_${username}`));
   
      if( item.jawaban !== null ){
       $(this).addClass('bg-success'); 
   
       if(noSoal == i ){
         $(this).addClass('bg-warning');
       }else if(item.jawaban == undefined){
         $(this).addClass('bg-info');
       }
       
   
   
       
       
      } else{
        console.log('else')
      }
     
   
    });
   
   })
   
   
   
</script>
<script>
   function saveJawaban(){
     var jawaban = $('input[type=radio]:checked').val()
     var username = $('input#username').val()
     arrJawaban = [];
     let editItem = {
                          
                           jawaban : jawaban
                         }
                          localStorage.setItem(`ujian${id_ulangan}_soal${noSoal}_${username}`, JSON.stringify(editItem));
   
   }
   
           
          
           
           
   // })
    var noSoal = $('.noSoal').text()
    var id_ulangan = $('#id_to').text()
   
   $('.cbx').each(function(i, obj){
     $(this).on('click', function(){
       saveJawaban();
     });
   })
   $('#prevBtn').on('click', function(){
    saveJawaban();
     
   
   }); 
   $('#nextBtn').on('click', function(){
    saveJawaban();
     
   
   }); 
   
   a = JSON.parse(window.localStorage.getItem(`ujian${id_ulangan}_soal${noSoal}_${username}`))
   
   $(`input[value=${a.jawaban}]`).prop('checked', 'true').parent().addClass('bg-violet')
   
   
   
   
   
   
   
</script>
<script>
   $(document).ready(function(){
      
   })
   
       var username = $('input#username').val()
     var jwb = []
      $( ".cbx" ).each(function(i, obj) {
          i+=1
         var id_ulangan = $('#id_to').text()
      var noSoal = $('.noSoal').text()
         console.log(`ujian${id_to}_soal${i}_${username}`)
         var item = JSON.parse(localStorage.getItem(`ujian${id_ulangan}_soal${i}_${username}`));
     
         if( item.jawaban !== null ){
           var itemJawaban = item.jawaban;
        
   
          
   
           jwb.push(itemJawaban)
          
      
          
   $('#temp_jawaban').val(jwb);
          
         } else{
         
         }
        
       });
   
   
   
   
   
   
      
</script>
<script>
   $('input[type=radio').each(function(i, obj) {
       $(this).on('change', function(){
         $('.bg-violet').removeClass('bg-violet');
   
         $(this).parent().addClass('bg-violet')
       });
   });
   
    $('.con-pg').each(function(i, obj) {
       $(this).on('click', function(){
         //
          if($(this).hasClass('bg-violet')){
            $(this).removeClass('bg-violet');
             $(this).children('input').prop('checked', false)
          }else{
              $('.bg-violet').removeClass('bg-violet');
            $(this).addClass('bg-violet');
             $(this).children('input').prop('checked', true)
          }
        
         
         
        
          // $(this).addClass('bg-violet')
   
       });
   
   });
   
     
   
     
      
   
</script>

<script>
   
   $(document).ready(function(){
      $('#selesai').on('click', function(){
         
         localStorage.clear();

        
         
      });
   });
</script>