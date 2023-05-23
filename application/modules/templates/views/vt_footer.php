<footer class="main-footer">
   <div class="footer-left">
      Copyright &copy; 2021 
      <div class="bullet"></div>
      By <a target="_BLANK" href=""> Ibnuhamzah</a>
   </div>
   <div class="footer-right">
      1.0
   </div>
</footer>
</div>
</div>
<!-- General JS Scripts -->
  <script src="<?= base_url().'assets/vendor/jquery-3.6.0.js'?>" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"> </script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"> </script>
<script src="<?= base_url().'assets/ckeditor/ckeditor.js' ?>"> </script>
<script src="<?= base_url().'assets/ckeditor/plugins/ckeditor_wiris/plugin.js'  ?>"> </script>
<script>
MathJax = {
  tex: {
    inlineMath: [['$', '$'], ['\\(', '\\)']]
  },
  svg: {
    fontCache: 'global'
  }
};
</script>
<script type="text/javascript" src="//cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>

<script> 
   var textarea = document.getElementsByClassName('mytextarea');
   
   $( ".mytextarea" ).each(function( index ) {
      CKEDITOR.replace($('.mytextarea')[index],{
          enterMode: CKEDITOR.ENTER_BR 
      });
   });
   
   CKEDITOR.config.extraPlugins = 'ckeditor_wiris'
   
</script>
<script>
   $(document).ready(function() {
     $('#example').DataTable();
   } );

    $(document).ready(function() {
     $('#ex').DataTable();
   } );
</script>

 
        
      
        <script type="text/javascript" src="<?= base_url() . 'assets/inc/TimeCircles.js' ?>"></script>

<script>
     $("#DateCountdown").TimeCircles();
            $("#CountDownTimer").TimeCircles({ time: { Days: { show: false }, Hours: { show: false } }});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<!-- Template JS File -->
<script src="<?= base_url('assets/assets_stisla') ?>/assets/js/scripts.js"></script>
<script src="<?= base_url('assets/assets_stisla') ?>/assets/js/custom.js"></script>
<!-- Page Specific JS File -->
<script src="<?= base_url('assets/assets_stisla')?> /assets/js/page/index-0.js"></script>
<script>
  $( document ).ready(function() {
    $('.overlay').remove();
});
</script>

</body>
</html>