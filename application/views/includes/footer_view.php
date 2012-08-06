<div class="push"></div>
</div> <!-- end wrapper -->
<?php $this->load->view('includes/framework_footer_view'); ?>

<script src="<?php echo base_url();?>assets/js/libs/jquery-latest.min.js"></script>
<script src="<?php echo base_url();?>assets/js/libs/jquery-ui.min.js"></script>
<script src="<?php echo base_url();?>assets/js/libs/jquery.dataSelector.js"></script>
<script src="<?php echo base_url();?>assets/js/libs/jquery.metadata.js"></script>
<script src="<?php echo base_url();?>assets/js/control.js"></script>

<?php	
// load all javascript
if (isset($js_includes)) {
	foreach($js_includes as $key => $js_include) {
		echo $js_include;
	}
}
?>
<script>
    var _gaq=[['_setAccount','<?php echo GA_ACCOUNT;?>'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
</body>
</html>