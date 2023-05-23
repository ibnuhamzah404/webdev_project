<div class="main-content">
  
    <section class="section">
          <span class=""><?= $this->session->flashdata('pesan') ?> </span>
          <div class="section-header">

            <h1>Materi</h1>
            </div>
        </section>
         <div class="col-md-12">
              <div class="card">
              
                  <div class="card-header">
                    <h4>Materi Pelajaran</h4>
                  </div>
                  <div class="card-body">
                   <div id="accordion">


                   <?php foreach ($data_materi as $materi): ?>
                     <div class="accordion mb-3">

                        <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-<?=$materi->id_materi ?>" aria-expanded="true">
                           <small style="float: right;"><?=$materi->tanggal_posting ?></small>

                          <h4><?= $materi->kelas ?> | <?=$materi->judul_materi ?></h4>
                        </div>
                        <div class="accordion-body collapse show" id="panel-body-<?=$materi->id_materi ?>" data-parent="#accordion">
                          <code>author : <?=$materi->pembuat  ?></code>
                           
                            <?php $vark = $materi->jenis_materi; $r_vark='' ?>
                            <?php if ($vark == 'V'): ?>
                             <?php $r_vark='Visual' ?>
                              <b style="float: right;"><?= $r_vark ?></b>
                            <?php elseif($vark =='A'): ?>
                              <?php $r_vark='Audio' ?>
                               <b style="float: right;"><?= $r_vark ?></b>
                                <?php elseif($vark =='R'): ?>
                              <?php $r_vark='Read/Write' ?>
                               <b style="float: right;"><?= $r_vark ?></b>
                               <?php elseif($vark =='K'): ?>
                              <?php $r_vark='Kinethic' ?>
                               <b style="float: right;"><?= $r_vark ?></b>
                            <?php  endif;?>

                          
                          <p class="mb-0"><?= $materi->deskripsi_materi ?></p>
                          <a href="<?= base_url().'Smateri/download_materi/'. $materi->id_materi ?>" class="btn btn-md mx-2 btn-warning float-right">Download materi</a>
                           <?php $vark = $materi->jenis_materi; $r_vark='' ?>
                            <?php if ($vark == 'V'): ?>
                             <?php $r_vark='Visual' ?>
                              
                              <a href="<?=$materi->embed?>" class="btn btn-md btn-success float-right">download vidio</a>
                            <?php  endif;?>

                        </div>
                      </div>
                   <?php endforeach ?>
                    
                     
                      
                      
                     
                  </div>
                    
                   
                     
                    
                   
                   </div>
              </div>
            
         </div>
</div>