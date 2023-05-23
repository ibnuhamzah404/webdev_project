<div class="main-content">
  
    <section class="section">
        
          <div class="section-header">

            <h1>Detail Soal Ujian</h1>
            </div>
        </section>
        <span class=""><?= $this->session->flashdata('pesan') ?> </span>
         <div class="col-md-12">
              <div class="card">
                
                  <div class="card-header">
                    <h4>Soal</h4>
                  </div>
                  <div class="card-body">
                   
                        <?php $no = 1; ?>                    
                    
                      <?php foreach ($soal_ulangan as $soal): ?>
                       <b>Soal No. [<?= $no++ ?>]</b> 
                         <table id="example" class="mb-4 table table-bordered table-hover">
                        
                      <tr>
                        <th>Pertanyaan</th><td><?= $soal->soal ?></td>
                      </tr>
                       <tr>
                        <th>Pilihan A</th><td><?= $soal->pg_a ?></td>
                      </tr>
                      <tr>
                        <th>Pilihan B</th><td><?= $soal->pg_b ?></td>
                      </tr>
                      <tr>
                        <th>Pilihan C</th><td><?= $soal->pg_c ?></td>
                      </tr>
                      <tr>
                        <th>Pilihan D</th><td><?= $soal->pg_d ?></td>
                      </tr>
                       <tr>
                        <th>Pilihan E</th><td><?= $soal->pg_e ?></td>
                      </tr>
                       <tr>
                        <th>Kunci Jawaban</th><td><?= $soal->pg_jawaban ?></td>

                      </tr>
                      <tr>
                      <th>Pembahasan Soal</th><td> <?= $soal->pembahasan ?></td>
                      </tr>
                       <tr>
                        <th>Aksi</th><td><a  href="<?=base_url().'Ulangan/edit_soal/'. $id_ulangan . '/'. $soal->id_soal ?>" class="btn btn-sm btn-warning">Edit</a><a  onclick="javascript : return confirm('anda yakin akan menghapus data ini ? ')" href="<?=base_url().'Ulangan/delete_soal/' . $soal->id_soal ?>" class="ml-2 btn btn-sm btn-danger">Hapus</a></td>
                      </tr>
                       </table>
                      <?php endforeach ?>

                             
                           
                              
                    
                   
                   </div>
                   <div class="card-footer">
                     <a href="<?= base_url('Ulangan') ?>" class="btn btn-md btn-primary">Kembali</a>
                   </div>
              </div>
              
         </div>
</div>