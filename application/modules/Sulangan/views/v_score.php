<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          </section>

           <div class="card">
                  <div class="card-header bg-dark">
                    <h4 class="text-white">Hasil Ujian</h1>
                  	<h4  style=" position: absolute; right: 20px;"> <?= date("d/m/Y"); ?> </h4>
                  </div>
                  
                  <div class="card-body">
                  
                   <table id="example" class="table table-bordered table-hover"><tr> 
                      
                      </tr>
                      <?php $no =1; ?>
                      <?php foreach ($data_score as $score): ?>
                        <tr>
                          <th>Nama siswa</th>
                          <td><?= $this->session->userdata('nama') ?></td>
                        </tr>
                        <tr>
                          <th>Soal Benar</th>
                          <td><b><?= $score->soal_benar ?></b> Soal Benar dari <?= $score->jum_soal ?> Soal Keseluruhan</td>
                        </tr>
                        <tr>
                          <th>Soal Salah</th>
                          <td><b><?= $score->soal_salah ?></b> Soal Salah dari <?= $score->jum_soal ?> Soal Keseluruhan</td>
                        </tr>
                        <tr>
                          <th>Soal Tidak Dijawab</th>
                          <td><b><?= $score->soal_kosong ?></b> soal tidak dijawab dari <?= $score->jum_soal ?> Soal</td>
                        </tr>
                         <tr>
                          <th>Jumlah Soal</th>
                          <td><b><?= $score->jum_soal ?></b> Soal</td>
                        </tr>
                         <tr>
                          <th>Nilai</th>
                          <td><b ><?= $score->nilai ?></b> </td>
                        </tr>
                      <?php endforeach ?>
                      

                     </table>
                  </div>
                  <div class="card-footer bg-whitesmoke">
                    <a href="<?= base_url().'Sulangan' ?>" class="btn btn-md btn-warning">Kembali</a>
                  </div>
                </div>
     </div>