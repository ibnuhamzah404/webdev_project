

<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          </section>

           <div class="card">
                  <div class="card-header bg-dark">
                    <h4 class="text-white">Test Gaya Belajar</h1>
                  	<h4  style=" position: absolute; right: 20px;"> <?= date("d/m/Y"); ?> </h4>
                  </div>
                  
                  <div class="card-body">
                   <h4 class="text-primary"> Soal </h4>

                  </div>
                 	
                   <?= form_open_multipart(base_url().'Varkquiz/input_data'); ?>
                 <?php $no=1; ?>

                  <?php foreach($vark as $vk): ?>
                   <div class="card-body">
                   	<p style="font-size: 18px; font-weight: bold;"><?=$no++.'. ' ?><?= $vk->soal ?> </p>
                   	<input type="radio" name="pg[<?=$vk->id_soal ?>]"value="<?=$vk->pg_a_val ?>" >
                    <label class="mr-2"  for="">A. <?=$vk->pg_a ?></label><br>
                   
                    <input type="radio"  name="pg[<?=$vk->id_soal ?>]"value="<?=$vk->pg_b_val ?>">
                    <label class="mr-2" for="">B. <?=$vk->pg_b ?></label><br>
                   
                    <input type="radio"  name="pg[<?=$vk->id_soal ?>]"value="<?=$vk->pg_c_val ?>">
                    <label class="mr-2" for="">C. <?=$vk->pg_c ?></label><br>
                    <input type="radio"  name="pg[<?=$vk->id_soal ?>]"value="<?=$vk->pg_d_val ?>">
                    <label class="mr-2" for="">D. <?=$vk->pg_d ?></label><br>
                   </div>
              	 <?php endforeach; ?>
                	
                <?php form_close() ?>
                 
                  
                  <div class="card-footer bg-whitesmoke">
                   <button class="btn btn-md btn-primary"> Kirim </button>
                  </div>
                </div>
     </div>