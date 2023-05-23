<style>
   input[type="radio"]{
   margin-top: 7px;
   padding-right: 5px;
   margin-right: 10px;
   visibility: hidden;
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
    .box-flex .box a{
      color : white;
      text-decoration: none;
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
   padding: 10px;
   }
   .con-pg .mr-2{
   align-items: center;
   }
   .con-pg .mr-2 p{
   margin-bottom: 0 !important;
   }
   .con-pg:hover{
   cursor: pointer;
   }
</style>

<div class="main-content">
<section class="section">
   <div class="section-header">
      <h1>Pembahasan Ujian</h1>
   </div>
</section>
<div class="row">
   <div class="col-md-8">
      <div class="card">
         <div class="card-header bg-dark">
            <h4 class="text-white">Ujian Pilihan Ganda</h4>
            <h4  style=" position: absolute; right: 20px;"> <?= date("d/m/Y"); ?> </h4>
         </div>
         <div class="card-body">
            <h4 class="text-primary"> SOAL </h4>
         </div>
        <?php $url =  base_url(uri_string());
      $keywords = explode('/', $url);

      
      
      ?>
         <input type="hidden" name="id_ulangan" value="<?= $id_ulangan ?>">
         <?php foreach($data_soal as $ulangan): ?>
         <div class="card-body" style="overflow-x : scroll;">
            <div class="" style="align-items: center;">
               <p style="font-size: 18px; margin : 0 ; font-weight: bold;"><?= $keywords[7]; ?> . <?= $ulangan->soal ?> </p>
            </div>
            
              <?php  if($jawaban_user == $ulangan->pg_jawaban):?>
               <p class="text-success font-weight-bold text-right"> Jawaban kamu benar! </p>
            <?php elseif($jawaban_user !==  $ulangan->pg_jawaban && $jawaban_user != null): ?>
                <p class="text-danger font-weight-bold text-right"> Jawaban kamu salah! </p>
            <?php elseif($jawaban_user == null): ?>
                <p class="text-danger font-weight-bold text-right"> Kamu tidak menjawab soal ini! </p>
            <?php endif; ?>
            
            <input type="hidden" name="pilihan[<?=$ulangan->id_soal ?>]" value="<?= $ulangan->id_soal ?>">
            <div class="d-flex con-pg   <?php if($jawaban_user !== $ulangan->pg_jawaban and $jawaban_user == 'A'){echo "bg-danger";}elseif($ulangan->pg_jawaban == 'A' && $jawaban_user != null){echo "bg-success";}elseif($jawaban_user == null && $ulangan->pg_jawaban == 'A'){
               echo "bg-success";
            }
              

         ?>">
               <input type="radio" name="pg[<?=$ulangan->id_soal ?>]"value="A" >
               <div class="mr-2 d-flex" 
                  for="">
                  <p>A.</p>
                  <?=$ulangan->pg_a ?>
               </div>
               <br>
            </div>
            <div class="d-flex con-pg  <?php if($jawaban_user !== $ulangan->pg_jawaban && $jawaban_user == 'B'){echo "bg-danger";}elseif($ulangan->pg_jawaban == 'B' && $jawaban_user != null){echo "bg-success";}elseif($jawaban_user == null && $ulangan->pg_jawaban == 'B'){
               echo "bg-success";
            }?> ">
               <input type="radio"  name="pg[<?=$ulangan->id_soal ?>]"value="B"  >
               <div class="mr-2 d-flex" for="">
                  <p>B.  </p>
                  <?=$ulangan->pg_b ?>
               </div>
               <br>
            </div>
            <div class="d-flex  con-pg  <?php if($jawaban_user !== $ulangan->pg_jawaban and $jawaban_user == 'C'){echo "bg-danger";}elseif($ulangan->pg_jawaban == 'C' && $jawaban_user != null){echo "bg-success";}elseif($jawaban_user == null && $ulangan->pg_jawaban == 'C'){
               echo "bg-success";
            }?>">
               <input type="radio"  name="pg[<?=$ulangan->id_soal ?>]"value="C" <?php if($ulangan->pg_jawaban =='C'){echo"checked";} ?>>
               <div class="mr-2 d-flex" for="">
                  <p>C.  </p>
                  <?=$ulangan->pg_c ?>
               </div>
               <br>
            </div>
            <div class="d-flex con-pg  <?php if($jawaban_user !== $ulangan->pg_jawaban and $jawaban_user == 'D'){echo "bg-danger";}elseif($ulangan->pg_jawaban == 'D' && $jawaban_user != null){echo "bg-success";}
              

         ?>">
               <input type="radio"  name="pg[<?=$ulangan->id_soal ?>]"value="D" <?php if($ulangan->pg_jawaban =='D'){echo"checked";}elseif($jawaban_user == null && $ulangan->pg_jawaban == 'D'){
               echo "bg-success";
            } ?>>
               <div class="mr-2 d-flex" for="">
                  <p>D.  </p>
                  <?=$ulangan->pg_d ?>
               </div>
               <br>
            </div>
            <div class="d-flex con-pg   <?php if($jawaban_user !== $ulangan->pg_jawaban and $jawaban_user == 'E'){echo "bg-danger";}elseif($ulangan->pg_jawaban == 'E' && $jawaban_user != null){echo "bg-success";}elseif($jawaban_user == null && $ulangan->pg_jawaban == 'E'){
               echo "bg-success";
            }
              

         ?>">
               <input type="radio"  name="pg[<?=$ulangan->id_soal ?>]"value="E" <?php if($ulangan->pg_jawaban =='E'){echo"checked";} ?>>
               <div class="mr-2 d-flex" for="">
                  <p>E.  </p>
                  <?=$ulangan->pg_e ?>
               </div>
               <br>
            </div>
            <h3 class="text-primary font-weight-bold py-3"> PEMBAHASAN : </h3>
            <div class="d-flex">
                
               <div class="mr-2 d-flex flex-column" for=""> <?=$ulangan->pembahasan ?></div>
               <br>
            </div>
         </div>
         <?php endforeach; ?>
         <div class="card-footer bg-whitesmoke">
            <a href="<?= base_url().'Sulangan' ?>" class="btn btn-md btn-warning">Kembali</a>
         </div>
      </div>
   </div>
   <div class="col-md-4">
      <div class="card">
         <div class="card-header bg-dark text-white">Navigasi Soal</div>
         <div class="card-body">
            <div class="d-flex box-flex">
               <?php $url =  base_url(uri_string());
                  $keywords = explode('/', $url);
                  
                  
                  $keywords[7]
                  ?>
               <?php for ($i = 1; $i <= $jum_data; $i++) : ?>
               <div class="box d-flex 
                  <?php if($i == $keywords[7]): ?>
                  <?= ' bg-warning' ?>
                  <?php endif; ?>
                  "><a href="<?= base_url().'Sulangan/pembahasan_soal/' . $id_ulangan .'/' . $i  . '/' . $keywords[8]?>"><?=$i ?></a></div>
               <?php endfor; ?>
            </div>
         </div>
      </div>
   </div>
</div>