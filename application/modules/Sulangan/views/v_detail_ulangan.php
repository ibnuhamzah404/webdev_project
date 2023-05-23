

<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          </section>
          <?php if($cek ==FALSE): ?>
           <div class="alert alert-success" role="alert">
                 
                  <h4 class="text-white">Persiapan Ujian</h4>
                  <p>Mulailah Ujian dengan membaca basmallah, periksa jawaban kembali jika selesai, Selamat mengerjakan!..</p>
                  <hr>
                  <q>Barang siapa yang bersungguh sungguh maka ia akan berhasil</q>
                </div>
            <?php else: ?>
              
            <?php endif; ?>
           <div class="card">
                  <div class="card-header bg-dark">
                    <h4 class="text-white">Detail Ujian</h1>
                  	<h4  style=" position: absolute; right: 20px;"> <?= date("d/m/Y"); ?> </h4>
                  </div>
                  
                  <div class="card-body">
                  
                   <table id="example" class="table table-bordered table-hover"><tr> 
                      
                      </tr>
                      <?php $no =1; ?>
                      <?php foreach ($data_ulangan as $ulangan): ?>

                       

                        <tr>
                          <th>Guru </th><td><?= $ulangan->pembuat ?> </td>
                          
                        </tr>
                        <tr>
                          <th> Tanggal Pembuatan</th><td><?= $ulangan->tanggal_pembuatan  ?> </td>
                           
                        </tr>
                        <tr>
                           <th> Judul Ulangan</th><td><?=$ulangan->judul_ulangan ?></td>
                        </tr>
                        <tr>
                           <th> Kelas </th><td><?=$ulangan->jurusan_ujian ?></td>
                        </tr>
                         <tr>
                           <th> Waktu </th><td><?=$ulangan->waktu ?> Menit</td>
                        </tr>
                        <tr>
                          <th>Aksi</th>
                            <?php if($cek ==TRUE): ?>
                           <td><a href="<?= base_url().'Sulangan/lihat_score/' . $ulangan->id_ulangan .  '/'. $ulangan->id  ?>" class="btn btn-sm btn-success">Lihat Score</a>
                              <a href="<?= base_url().'Sulangan/pembahasan_soal/' . $ulangan->id_ulangan . '/1/'  . $ulangan->id  ?>" class="btn btn-sm btn-primary">Lihat Pembahasan Ujian</a>
                           </td>
                          
                            <?php else: ?>
                               <td><a href="<?= base_url().'Sulangan/mulai_ulangan/'.$ulangan->id_ulangan . '/1/' . $ulangan->id  ?>" class="btn btn-sm btn-info">Mulai Ujian</a></td>
                            <?php endif; ?>
                          
                        </tr>
                     
                      <?php endforeach ?>
                      

                     </table>
                  </div>


                  
                 
                 
                  <div class="card-footer bg-whitesmoke">
                 
                  </div>
                </div>
     </div>