<?php $this->load->view('_includes/header_view'); ?>

<div class="container main" role="main">
<?php if ($message) : ?><div class="update-message"><?php echo $message; ?></div><?php endif; ?>
<?php $this->load->view($main_content); ?>
</div>

<?php $this->load->view('_includes/footer_view'); ?>