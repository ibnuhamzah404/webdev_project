<style>
   .pp-first-text {
   color: #F86969;
   font-family: "Roboto", Sans-serif;
   font-size: 30px;
   text-align: center;
   font-weight: 800;
   }
   .con-mkt h2{
   font-family: "Roboto", Sans-serif;
   font-size: 40px;
   text-align: center;
   font-weight: 800;
   color: white;
   }
   .con-mkt{
   background-image: linear-gradient(to right, rgb(42,73,255),rgb(53,96,253));
   }
   .con-mkt .box-btn .btn-dafsek:hover{
   background-color: #e86861 !important;
   }
   .con-mkt .box-btn .btn-tandul:hover{
   background-color: white !important;
   color :  blue !important;
   }
   .pp-second-text {
   display: block;
   color: #4054B2;
   font-family: "Roboto", Sans-serif;
   font-size: 25px;
   font-weight: 800;
   }
   }
   .con-flex .d-flex .box{
   padding-top: 10px !important;
   padding-bottom: 10px !important;
   }
   .con-flex .d-flex .box:hover{
   cursor: pointer;
   box-shadow: 2px 2px 14px -1px rgba(146,146,146,0.75);
   }
   
   @media only screen and (max-width: 600px) {
       .c-body{
           padding-left : 0px !important;
           padding-right : 0px !important;
       }
       
       .con-mkt {
           padding : 25px 10px;
       }
       
       .con-mkt h2{
           font-size : 26px;
       }
       
       .icon {
          width : 60px !important;
       }
       
       .box-btn {
           display : flex;
           flex-wrap : wrap;
           justify-content : center;
       }
       
       .box-btn .btn-tandul{
           margin : 20px 0 !important;
           
       }
       
       .text p{
           line-height : 23px !important;
       }
       
       .box {
           padding : 5px;
       }
     
   }}
</style>
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Ujian</h1>
      </div>
   </section>
   <span class=""><?= $this->session->flashdata('pesan') ?> </span>
   <div class="card">
      <div class="card-header bg-dark">
         <h4 class="text-white">
         Ujian Pilihan Ganda</h1>
         <h4  style=" position: absolute; right: 20px;"> <?= date("d/m/Y"); ?> </h4>
      </div>
      <div class="card-body">
         <?php foreach($data_tryout as $pt): ?>
         <div class="card mt-2">
            <div class="card-header">
               <h4><?= $pt->nama  ?></h4>
            </div>
            <div class="card-body">
               <div class="card-body c-body">
                  <div class="card">
                     <div class="card-body" style="overflow-x : auto;">
                        <h4 class="text-primary"> TPS </h4>
                        <table id="example" class="table table-bordered table-hover">
                           <tr>
                              <th>#</th>
                              <th>Tanggal Pembuatan</th>
                              <th>Judul Ujian</th>
                              <th>Jurusan Ujian</th>
                              <th>Waktu</th>
                              <th>Aksi</th>
                           </tr>
                           <?php $no = 1; ?>
                           <?php $count = 1; ?>
                           <?php $datatps = [] ?>
                           <?php $arrcount = []; ?>
                           <?php foreach ($data_ulangan_tps as $ulangan): ?>
                           <?php if($ulangan->id_tryout == $pt->id):?>
                           <?php if($count <= 1): ?>
                           <?php $count += 1; ?>
                           <?php foreach ($status_ulangan_tps as $sut): ?>
                           <?php array_push($datatps, $sut->id_to);  ?>
                           <?php endforeach; ?>
                           <?php endif; ?>
                           <tr>
                              <td><?=$no ?></td>
                              <td><?= $ulangan->tanggal_pembuatan  ?></td>
                              <td><?=$ulangan->judul_ulangan ?></td>
                              <td><?= $ulangan->jurusan_ujian ?></td>
                              <td><?= $ulangan->waktu ?> Menit</td>
                              <?php if(in_array($ulangan->id, $datatps)): ?>
                              <td>
                                 <a href="<?= base_url().'Sulangan/detail_ulangan/'.$ulangan->id_ulangan .'/' .$ulangan->id ?>" class="btn btn-sm btn-success">Skor & Pembahasan</a>
                              </td>
                              <?php array_push($arrcount, in_array($ulangan->id, $datatps) )?>
                              <?php elseif($no == count($arrcount) + 1): ?>
                              <td>
                                 <a href="<?= base_url().'Sulangan/detail_ulangan/'.$ulangan->id_ulangan .'/' .$ulangan->id ?>" class="btn btn-sm btn-primary px-3">Kerjakan Tryout</a>
                              </td>
                              <?php else: ?>
                              <td>
                                 <a href="" class="btn btn-sm btn-secondary px-3">Kerjakan Tryout</a>
                              </td>
                              <?php endif; ?>
                              <?php $no+=1; ?>
                           </tr>
                           <?php endif; ?>
                           <?php endforeach ?>
                        </table>
                     </div>
                     <div class="card-body" style="overflow-x : auto;">
                        <h4 class="text-primary"> TKA </h4>
                        <table id="example" class="table table-bordered table-hover">
                           <tr>
                              <th>#</th>
                              <th>Tanggal Pembuatan</th>
                              <th>Judul Ujian</th>
                              <th>Jurusan Ujian</th>
                              <th>Waktu</th>
                              <th>Aksi</th>
                           </tr>
                           <?php $num = 1; ?>
                           <?php $counttka = 1; ?>
                           <?php $datatka = [] ?>
                           <?php $arrcounttka = []; ?>
                           <?php foreach ($data_ulangan_tka as $ul): ?>
                           <?php if($ul->id_tryout == $pt->id):?>
                           <?php if($counttka <= 1): ?>
                           <?php $counttka += 1; ?>
                           <?php foreach ($status_ulangan_tka as $stka): ?>
                           <?php array_push($datatka, $stka->id_to);  ?>
                           <?php endforeach; ?>
                           <?php endif; ?>
                           <tr>
                              <td><?=$num ?></td>
                              <td><?= $ul->tanggal_pembuatan  ?></td>
                              <td><?=$ul->judul_ulangan ?></td>
                              <td><?= $ul->jurusan_ujian ?></td>
                              <td><?= $ul->waktu ?> Menit</td>
                              <?php if(in_array($ul->id, $datatka)): ?>
                              <td>
                                 <a href="<?= base_url().'Sulangan/detail_ulangan/'.$ul->id_ulangan .'/' .$ul->id ?>" class="btn btn-sm btn-success">Skor & Pembahasan</a>
                              </td>
                              <?php array_push($arrcounttka, in_array($ulangan->id, $datatka) )?>
                              <?php elseif($num == count($arrcounttka) + 1): ?>
                              <td>
                                 <a href="<?= base_url().'Sulangan/detail_ulangan/'.$ul->id_ulangan .'/' .$ul->id ?>" class="btn btn-sm btn-primary px-3">Kerjakan Tryout</a>
                              </td>
                              <?php else: ?>
                              <td>
                                 <a   href=""  class="btn btn-sm btn-secondary px-3">Kerjakan Tryout</a>
                              </td>
                              <?php endif; ?>
                           </tr>
                           <?php $num+=1; ?>
                           <?php endif; ?>
                           <?php endforeach; ?>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <?php endforeach; ?>
         </div>
      </div>
      <div class="card-footer bg-whitesmoke">
           <div class="col-lg-12 col-md-4 col-sm-12 p-0">
         <div class="card card-statistic-2">
            <div class="card-wrap pt-5">
               <div class="elementor-widget-container">
                  <h2 class="pp-dual-heading text-center">
                     <span class="pp-first-text">5 ALASAN</span><br>
                     <span class="pp-second-text pt-2">
                     KENAPA KAMU HARUS BERGABUNG<br></span>
                     <span class="pp-second-text pt-2">DI BIMBEL PROF. EXCELLENT</span>
                  </h2>
               </div>
               <div class="con-flex py-4">
                  <div class="d-flex justify-content-center flex-wrap">
                     <div class="box d-flex col-lg-11 col-sm-9 py-1" style="height : auto; min-height: 60px;">
                        <div class="icon col-sm-2 col-lg-1   p-0 d-flex justify-content-end pr-3 ">
                           <div class="circle d-flex justify-content-center align-items-center " style="width : 35px; height: 35px; border-radius: 20px; background-color: #E32249;">
                              <p class="font-weight-bold text-white  m-0 text-center"style="font-size: 20px; ">1</p>
                           </div>
                        </div>
                        <div class="text col-lg-11 col-sm-10 p-0">
                           <p style="    font-size: 20px;color: #4d4d4d;
                              font-family: 'Roboto', Sans-serif;
                              line-height: 50px;
                              font-weight: 600;
                              "
                              >Jika anda tidak lulus SBMPTN, GARANSI 100% bisa mengulang kembali GRATIS</p>
                        </div>
                     </div>
                     <div class="box d-flex col-lg-11 col-sm-10 py-1" style="height : auto; min-height : 60px;">
                        <div class="icon col-sm-2 col-lg-1 p-0 d-flex justify-content-end pr-3 ">
                           <div class="circle d-flex justify-content-center align-items-center " style="width : 35px; height: 35px; border-radius: 20px; background-color: #E32249;">
                              <p class="font-weight-bold text-white  m-0 text-center"style="font-size: 20px; ">2</p>
                           </div>
                        </div>
                        <div class="text  col-lg-11 col-sm-10 p-0">
                           <p style="    font-size: 20px;color: #4d4d4d;
                              font-family: 'Roboto', Sans-serif;
                              line-height: 50px;
                              font-weight: 600;
                              "
                              >Prediksi Soal Akurat hingga 80% yang sumbernya dari Tim Litbang Soal SBMPTN Excellent.</p>
                        </div>
                     </div>
                     <div class="box d-flex col-lg-11 col-sm-10 py-1" style="height : auto; min-height : 60px;">
                        <div class="icon col-sm-2 col-lg-1 p-0 d-flex justify-content-end pr-3 ">
                           <div class="circle d-flex justify-content-center align-items-center " style="width : 35px; height: 35px; border-radius: 20px; background-color: #E32249;">
                              <p class="font-weight-bold text-white  m-0 text-center"style="font-size: 20px; ">3</p>
                           </div>
                        </div>
                        <div class="text  col-lg-11 col-sm-10 p-0">
                           <p style="    font-size: 20px;color: #4d4d4d;
                              font-family: 'Roboto', Sans-serif;
                              line-height: 50px;
                              font-weight: 600;
                              "
                              >   Berpengalaman sejak tahun 2009 memiliki tutor KOMPETEN dari Lulusan PTN Favorit.</p>
                        </div>
                     </div>
                     <div class="box d-flex col-lg-11 col-sm-10 py-1" style="height : auto; min-height : 60px;">
                        <div class="icon col-sm-2 col-lg-1 p-0 d-flex justify-content-end pr-3 ">
                           <div class="circle d-flex justify-content-center align-items-center " style="width : 35px; height: 35px; border-radius: 20px; background-color: #E32249;">
                              <p class="font-weight-bold text-white  m-0 text-center"style="font-size: 20px; ">4</p>
                           </div>
                        </div>
                        <div class="text  col-lg-11 col-sm-10 p-0">
                           <p style="    font-size: 20px;color: #4d4d4d;
                              font-family: 'Roboto', Sans-serif;
                              line-height: 50px;
                              font-weight: 600;
                              "
                              >   Konsultasi PTN, pemilihan Jurusan dan strategi sukses SBMPTN bersama Dosen<br>&amp; mahasiswa PTN Favorit.</p>
                        </div>
                     </div>
                     <div class="box d-flex col-lg-11 col-sm-10 py-1" style="height : auto; min-height : 60px;">
                        <div class="icon col-sm-2 col-lg-1 p-0 d-flex justify-content-end pr-3 ">
                           <div class="circle d-flex justify-content-center align-items-center " style="width : 35px; height: 35px; border-radius: 20px; background-color: #E32249;">
                              <p class="font-weight-bold text-white  m-0 text-center"style="font-size: 20px; ">5</p>
                           </div>
                        </div>
                        <div class="text  col-lg-11 col-sm-10 p-0">
                           <p style="    font-size: 20px;color: #4d4d4d;
                              font-family: 'Roboto', Sans-serif;
                              line-height: 50px;
                              font-weight: 600;
                              "
                              >   Dilengkapi dengan FREE Webinar “Tips Sukses SBMPTN”
                              dari Narasumber (Mahasiswa PTN) yang sudah lolos SBMPTN
                              dengan Tips yang sudah TERBUKTI!.
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="hero con-mkt text-white">
                  <div class="hero-inner">
                     <h2 class="">
                        <span class="">
                        TUNGGU APA LAGI         </span>
                        <span class="">
                        AYO LES DI PROF. EXCELLENT?         </span>
                     </h2>
                     <p class="text-white text-center" style="font-size: 20px;">Yuk kami temani perjuangan kamu untuk menggapai PTN Impian dengan para pengajar <b>SPESIAL</b> dari <b>Lulus PTN </b><b>Favorit</b> yang bikin semangat belajar kamu dengan metode Belajar yang <b>asyik</b> dan <b>seru</b> sehingga kamu akan <b>KETAGIHAN </b><b>belajar</b>.</p>
                     <div class="box-btn mx-auto mt-5" style="width: fit-content; ">
                        <a href="https://api.whatsapp.com/send/?phone=6285962896486&text=Halo+saya+mau+daftar&app_absent=0" class="btn-dafsek btn btn-md rounded-pill p-3 text-white" target="_BLANK" style="background-color : #FF8882;font-size : 20px;"> Daftar Sekarang</a>
                        <a href="https://api.whatsapp.com/send/?phone=6285962896486&text=Halo+saya+mau+tanya&app_absent=0" class="btn-tandul ml-4 btn btn-md btn-outline-light rounded-pill p-3 text-white" style="font-size : 20px; width: 200px;" target="_BLANK"> Tanya Dulu</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
   </div>
</div>
<!-- <td><a href="<?= base_url().'Sulangan/detail_ulangan/'.$ulangan->id_ulangan ?>" class="btn btn-sm btn-info">Detail Ulangan</a></td> -->