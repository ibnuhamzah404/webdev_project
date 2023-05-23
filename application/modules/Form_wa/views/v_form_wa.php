



<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700,900&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="fonts,_icomoon,_style.css+css,_owl.carousel.min.css+css,_bootstrap.min.css+css,_style.css.pagespeed.cc.Bj21RVNKzU.css" />
      <title>Contact Form #3</title>
      <script nonce="f3977286-1830-4edd-a491-b8b53bb18188">(function(w,d){!function(a,e,t,r,z){a.zarazData=a.zarazData||{},a.zarazData.executed=[],a.zarazData.tracks=[],a.zaraz={deferred:[]};var s=e.getElementsByTagName("title")[0];s&&(a.zarazData.t=e.getElementsByTagName("title")[0].text),a.zarazData.w=a.screen.width,a.zarazData.h=a.screen.height,a.zarazData.j=a.innerHeight,a.zarazData.e=a.innerWidth,a.zarazData.l=a.location.href,a.zarazData.r=e.referrer,a.zarazData.k=a.screen.colorDepth,a.zarazData.n=e.characterSet,a.zarazData.o=(new Date).getTimezoneOffset(),a.dataLayer=a.dataLayer||[],a.zaraz.track=(e,t)=>{for(key in a.zarazData.tracks.push(e),t)a.zarazData["z_"+key]=t[key]},a.zaraz._preSet=[],a.zaraz.set=(e,t,r)=>{a.zarazData["z_"+e]=t,a.zaraz._preSet.push([e,t,r])},a.dataLayer.push({"zaraz.start":(new Date).getTime()}),a.addEventListener("DOMContentLoaded",(()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r);z.defer=!0,z.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData))),t.parentNode.insertBefore(z,t)}))}(w,d,0,"script");})(window,document);</script>
   </head>
   <style>
   	body{
   		background-image: linear-gradient(120deg, #D10239 0%, #B93040 100%);
   	}

   	.box {
    padding: 40px 70px;
    background: #fff;
    -webkit-box-shadow: 0 15px 30px 0 rgb(0 0 0 / 20%);
    box-shadow: 0 15px 30px 0 rgb(0 0 0 / 20%);
}
   </style>
   <body>
      <div class="content" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-lg-6 mr-auto">
               <div class="mb-5">
                  <h3 class="text-white mb-4">Contact Info</h3>
                  <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus blanditiis, perferendis aliquam.</p>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <h3 class="text-white h5 mb-3">London</h3>
                     <ul class="list-unstyled mb-5">
                        <li class="d-flex text-white mb-2">
                           <span class="mr-3"><span class="icon-map"></span></span> 34 Street Name, City Name Here, United States
                        </li>
                        <li class="d-flex text-white mb-2"><span class="mr-3"><span class="icon-phone"></span></span> +1 (222) 345 6789</li>
                        <li class="d-flex text-white"><span class="mr-3"><span class="icon-envelope-o"></span></span> <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="bad3d4dcd5fad7c3cddfd8c9d3cedf94d9d5d7">[email&#160;protected]</a> </li>
                     </ul>
                  </div>
                  <div class="col-md-6">
                     <h3 class="text-white h5 mb-3">New York</h3>
                     <ul class="list-unstyled mb-5">
                        <li class="d-flex text-white mb-2">
                           <span class="mr-3"><span class="icon-map"></span></span> 34 Street Name, City Name Here, United States
                        </li>
                        <li class="d-flex text-white mb-2"><span class="mr-3"><span class="icon-phone"></span></span> +1 (222) 345 6789</li>
                        <li class="d-flex text-white"><span class="mr-3"><span class="icon-envelope-o"></span></span> <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="137a7d757c537e6a647671607a67763d707c7e">[email&#160;protected]</a> </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="box">

                  <h3 class="heading">Send us a message</h3>
                 <?= form_open_multipart(base_url().'Form_wa/input_data'); ?>
                     <div class="row">
                        <div class="col-md-12 form-group">
                        	<span class="" id="pesan"><?= $this->session->flashdata('pesan') ?> </span>
                           <label for="name" class="col-form-label">Name</label>
                           <input type="text" class="form-control" name="nama" id="name" placeholder="nama">
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-md-12 form-group">
                           <label for="email" class="col-form-label">No Whatsapp</label>
                           <input type="number" class="form-control" name="no_wa" id="email" placeholder="EX.628123456789">
                        </div>
                     </div>
                   
                     <div class="row">
                        <div class="col-md-12">
                           <input type="submit" value="Send Message" class="btn btn-block btn-danger rounded-0 py-2 px-4">
                           <span class="submitting"></span>
                        </div>
                     </div>
                   <?= form_close(); ?>
                  <div id="form-message-warning mt-4"></div>
                  <div id="form-message-success">
                     Your message was sent, thank you!
                 	 
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/popper.min.js+bootstrap.min.js.pagespeed.jc.lEz1ljtnz_.js"></script><script>eval(mod_pagespeed_hsIu1SxNtG);</script>
      <script>eval(mod_pagespeed_NJhLuUK9dr);</script>
      <script src="js/jquery.validate.min.js+main.js.pagespeed.jc.3mPo6fdQhd.js"></script><script>eval(mod_pagespeed_ky1FGKagRy);</script>
      <script>eval(mod_pagespeed_7qQVtWHX3_);</script>
      <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"6e8d9cf8195c356d","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2021.12.0","si":100}' crossorigin="anonymous"></script>
   </body>
</html>

 
