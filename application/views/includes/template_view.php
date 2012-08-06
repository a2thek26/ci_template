<?php $this->load->view('includes/header_view'); ?>

<div role="main">
<?php
if ($message) echo '<p class="message">' . $message. '</p>';
$this->load->view($main_content); 
?>
</div>

<?php $this->load->view('includes/footer_view'); ?>