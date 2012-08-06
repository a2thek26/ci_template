<header>
<div class="content clearfix">
<?php echo img(array('src' => 'assets/images/assets/logo.png', 'class' => 'logo', 'alt' => 'Logo Name')); ?>
<?php echo SITE_NAME; ?>
<?php if(!empty($show_menu)) : ?>
	<div class="navigation">
	<?php $this->load->view('includes/menu_view'); ?>
	</div>
<?php endif; ?>
</div>
</header>