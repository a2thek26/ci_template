<?php $this->load->view('includes/header_view'); ?>

<div role="main">
<?php if ($message) : ?><div class="update-message"><?php echo $message; ?></div><?php endif; ?>
<?php $this->load->view($main_content); ?>
</div>

<?php $this->load->view('includes/footer_view'); ?>