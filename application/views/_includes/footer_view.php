<div class="push"></div>
</div> <!-- end wrapper -->
<?php $this->load->view('_includes/framework_footer_view'); ?>

<?php 
  $this->carabiner->display('library', 'js');
  $this->carabiner->display($this->config->item('framework'), 'js');
  $this->carabiner->display('custom', 'js');
  if ($this->carabiner->has_files('js')) {
    $this->carabiner->display('js');
  } // end if we have extra javascript to display
?>

<?php if(ENVIRONMENT == 'production') : ?>
<script>
  var _gaq=[['_setAccount','<?php echo GA_ACCOUNT; ?>'],['_trackPageview']];
  (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
  g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
  s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
<?php endif; ?>
</body>
</html>