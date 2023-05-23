<div class="main-content">
  
    <section class="section">
        
          <div class="section-header">

            <h1>Materi</h1>
            </div>
        </section>
        <span class=""><?= $this->session->flashdata('pesan') ?> </span>
         <div class="col-md-12">
              <div class="card">
                
                  <div class="card-header">
                    <h4>Materi Pelajaran</h4>
                  </div>
                  <div class="card-body">
                   
                    <?php foreach ($data_tugas as $tugas): ?>
                     <table id="example" class="table table-bordered table-hover">
                               <tr>
                                <th>Guru<br></th><td><?=$tugas->pembuat  ?></td>
                              </tr>
                              <tr>
                                <th>Judul Tugas<br></th><td><?=$tugas->judul_tugas  ?></td>
                              </tr>
                              <tr>
                                <th>Status <br>Pengumpulan</th> 
                                <?php if($cek == false): ?>
                                 <td><b> Tidak ada upaya.. </b></td>
                                 <?php else: ?>
                                   <?php foreach ($data_hasil as $hasil): ?>
                                  <td>
                                    <?php $spg =   $hasil->status_pengumpulan?>
                                      <?php if($spg == 'Y'): ?>
                                        <b class="text-success"> Sudah Dikumpulkan</b>
                                       <?php else: ?>
                                         <b class="text-danger">Belum Dikumpulkan</b>
                                      <?php endif ?>
                                     </td>
                                <?php endforeach ?>
                                <?php endif; ?>
                               
                               
                              </tr>
                              <tr>
                                  <th>Status <br> Penilaian</th>
                                  <?php if($cek == false): ?>
                                 <td><b class="text-danger"> Belum dinilai</b></td>
                                 <?php else: ?>
                                   <?php foreach ($data_hasil as $hasil): ?>
                                   <td>
                                    <?php $sp =   $hasil->status_penilaian?>
                                      <?php if($sp == 'Y'): ?>
                                        <b class="text-success"> Sudah Dinilai</b>
                                       <?php else: ?>
                                         <b class="text-danger">Belum Dinilai</b>
                                      <?php endif ?>
                                     </td>
                                <?php endforeach ?>
                                <?php endif; ?>
                                </tr>
                                <tr>
                                  <th>Nilai</th>
                                  <?php if($cek == false): ?>
                                 <td><b class="text-danger"> - </b></td>
                                 <?php else: ?>
                                   <?php foreach ($data_hasil as $hasil): ?>
                                   <td>
                                    <?php $sp =   $hasil->status_penilaian?>
                                      <?php if($sp == 'Y'): ?>
                                        <b class="text-success"> <?= $hasil->nilai ?></b>
                                       <?php else: ?>
                                         <b class="text-danger">-</b>
                                      <?php endif ?>
                                     </td>
                                <?php endforeach ?>
                                <?php endif; ?>
                                </tr>
                                <tr>
                                  <th>Batas <br>Waktu</th><td class="
                                  text-danger">
                                  <?php $dl = $tugas->tanggal_deadline ?>
                                  <?php if ($dl < date("Y-m-d H:i:s")): ?>
                                   <b class="text-success"><?=$tugas->tanggal_deadline ?> </b>
                                  <?php else: ?>
                                     <b class="text-danger"><?=$tugas->tanggal_deadline ?> </b>
                                  <?php endif ?>
                                  </td>
                                </tr>
                                <tr>
                                 
                                  <th> Deskripsi <br> Tugas</th><td> <p class="mb-0"><?= $tugas->deskripsi_tugas ?></p></td>
                                </tr>
                               <tr>
                                 <th> File Soal</th>
                                 <td> <a href="<?= base_url().'sTugas/download_tugas/'. $tugas->id_tugas ?>" class="btn btn-sm btn-warning ">Download Tugas</a></td>
                               </tr>
                                
                                 <tr>
                                    <?= form_open_multipart(base_url().'sTugas/upload_tugas/'. $tugas->id_tugas); ?>
                                  
                                  <th>Kumpulkan Tugas</th>
                                  <td><input type="file" name="file_tugas" class="form-control" required> </td>
                                </tr>


                            </table>
                              <?php if($cek == false): ?>
                                  
                                 <?php else: ?>
                                   <button class="btn btn-md- btn-primary">Kumpulkan Tugas</button>
                                   <?php form_close() ?>
                                <?php endif; ?>
                                 <a href="<?= base_url().'Stugas' ?>" class="btn btn-md- btn-success">Kembali</a>

                    <?php endforeach; ?>
                    
                     
                    
                   
                   </div>
              </div>
            
         </div>
</div>