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
</style>
<div class="overlay-wrapper" style="
   z-index: 900;
   position: absolute;
   text-align: center;  
   background-color: black; 
   opacity: 50%; 
   width: 100%;
   height: 2000px;
   display: none;
   "></div>
<div class="overlay" style="position: absolute; z-index: 999; opacity: 100%; color: white; margin-left: auto;
   margin-right: auto;
   left: 0;
   right: 0;text-align: center;">
   <i class="fas fa-3x fa-sync-alt fa-spin" style="font-size: 50px; margin-top: 200px; "></i>
   <div class="text-bold pt-2">Loading...</div>
</div>
<div class="main-content">
   <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12">
         <a href="<?=base_url('Stugas/') ?>">
            <div class="card card-statistic-2">
               <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-pencil-alt" style="line-height: 50px;"></i>
               </div>
               <div class="card-wrap">
                  <div class="card-header">
                     <h4 >Tugas</h4>
                  </div>
                  <div class="card-body">
                     <?= $total_tugas ?>
                  </div>
               </div>
            </div>
         </a>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12">
         <a href="<?=base_url('Smateri/') ?>">
            <div class="card card-statistic-2">
               <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-book-open" style="line-height: 50px;"></i>
               </div>
               <div class="card-wrap">
                  <div class="card-header">
                     <h4>Materi</h4>
                  </div>
                  <div class="card-body">
                     <?= $total_materi; ?>
                  </div>
               </div>
            </div>
         </a>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12">
         <a href="<?=base_url('Sulangan/') ?>">
            <div class="card card-statistic-2">
               <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-tasks"></i>
               </div>
               <div class="card-wrap">
                  <div class="card-header">
                     <h4>Ujian</h4>
                  </div>
                  <div class="card-body">
                     <?= $total_ujian ?>
                  </div>
               </div>
            </div>
         </a>
      </div>
   </div>
   <section class="section">
      <span class=""><?= $this->session->flashdata('pesan') ?> </span>
      <div class="col-12 mb-4" style="padding: 0">
         <div class="hero bg-primary text-white">
            <div class="hero-inner">
               <h2>Welcome, <?= $this->session->userdata('nama'); ?>!</h2>
               <?php $gb=  $gaya_belajar  ?>
               <?php if ($gb == 'V'): ?>
               <h5> Gaya belajar anda cenderung kearah <i>Visual</i></h5>
               <?php elseif($gb == 'A'): ?>
               <h5> Gaya belajar anda cenderung kearah <i>Audio</i></h5>
               <?php elseif($gb == 'R'): ?>
               <h5> Gaya belajar anda cenderung kearah <i>Read/Write</i></h5>
               <?php elseif($gb == 'K'): ?> 
               <h5> Gaya belajar anda cenderung kearah <i>Kinetic</i></h5>
               <?php endif ?>
               <h3> </h3>
               <p class="lead"></p>
               <div class="mt-4">
                  <a href="<?= base_url().'Varkquiz/replace_kuis/'.$id_siswa ?>" class="btn btn-md  bg-white">Ulang Tes</a>
               </div>
            </div>
         </div>
      </div>
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
                     <div class="box d-flex col-11 py-1" style="height : auto; min-height: 60px;">
                        <div class="icon col-1 p-0 d-flex justify-content-end pr-3 ">
                           <div class="circle d-flex justify-content-center align-items-center " style="width : 35px; height: 35px; border-radius: 20px; background-color: #E32249;">
                              <p class="font-weight-bold text-white  m-0 text-center"style="font-size: 20px; ">1</p>
                           </div>
                        </div>
                        <div class="text col-11 p-0">
                           <p style="    font-size: 20px;color: #4d4d4d;
                              font-family: 'Roboto', Sans-serif;
                              line-height: 50px;
                              font-weight: 600;
                              "
                              >Jika anda tidak lulus SBMPTN, GARANSI 100% bisa mengulang kembali GRATIS</p>
                        </div>
                     </div>
                     <div class="box d-flex col-11 py-1" style="height : auto; min-height : 60px;">
                        <div class="icon col-1 p-0 d-flex justify-content-end pr-3 ">
                           <div class="circle d-flex justify-content-center align-items-center " style="width : 35px; height: 35px; border-radius: 20px; background-color: #E32249;">
                              <p class="font-weight-bold text-white  m-0 text-center"style="font-size: 20px; ">2</p>
                           </div>
                        </div>
                        <div class="text  col-11 p-0">
                           <p style="    font-size: 20px;color: #4d4d4d;
                              font-family: 'Roboto', Sans-serif;
                              line-height: 50px;
                              font-weight: 600;
                              "
                              >Prediksi Soal Akurat hingga 80% yang sumbernya dari Tim Litbang Soal SBMPTN Excellent.</p>
                        </div>
                     </div>
                     <div class="box d-flex col-11 py-1" style="height : auto; min-height : 60px;">
                        <div class="icon col-1 p-0 d-flex justify-content-end pr-3 ">
                           <div class="circle d-flex justify-content-center align-items-center " style="width : 35px; height: 35px; border-radius: 20px; background-color: #E32249;">
                              <p class="font-weight-bold text-white  m-0 text-center"style="font-size: 20px; ">3</p>
                           </div>
                        </div>
                        <div class="text  col-11 p-0">
                           <p style="    font-size: 20px;color: #4d4d4d;
                              font-family: 'Roboto', Sans-serif;
                              line-height: 50px;
                              font-weight: 600;
                              "
                              >   Berpengalaman sejak tahun 2009 memiliki tutor KOMPETEN dari Lulusan PTN Favorit.</p>
                        </div>
                     </div>
                     <div class="box d-flex col-11 py-1" style="height : auto; min-height : 60px;">
                        <div class="icon col-1 p-0 d-flex justify-content-end pr-3 ">
                           <div class="circle d-flex justify-content-center align-items-center " style="width : 35px; height: 35px; border-radius: 20px; background-color: #E32249;">
                              <p class="font-weight-bold text-white  m-0 text-center"style="font-size: 20px; ">4</p>
                           </div>
                        </div>
                        <div class="text  col-11 p-0">
                           <p style="    font-size: 20px;color: #4d4d4d;
                              font-family: 'Roboto', Sans-serif;
                              line-height: 50px;
                              font-weight: 600;
                              "
                              >   Konsultasi PTN, pemilihan Jurusan dan strategi sukses SBMPTN bersama Dosen<br>&amp; mahasiswa PTN Favorit.</p>
                        </div>
                     </div>
                     <div class="box d-flex col-11 py-1" style="height : auto; min-height : 60px;">
                        <div class="icon col-1 p-0 d-flex justify-content-end pr-3 ">
                           <div class="circle d-flex justify-content-center align-items-center " style="width : 35px; height: 35px; border-radius: 20px; background-color: #E32249;">
                              <p class="font-weight-bold text-white  m-0 text-center"style="font-size: 20px; ">5</p>
                           </div>
                        </div>
                        <div class="text  col-11 p-0">
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
   </section>
</div>
<script>
   $(window).load(function() {
    $('.overlay-wrapper').css('display', 'block');
     $('.overlay').css('display', 'block');
   
     $().ready(function(){
   
       $('.overlay-wrapper').delay(1000).fadeOut();
     $('.overlay').delay(1000).fadeOut();
   
    });
   });
   
   
   
   
   
</script>