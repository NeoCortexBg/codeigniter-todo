<?php

$sessionSuccess = $this->session->flashdata('success');
if(!empty($sessionSuccess)) {
?>
<div class='alert alert-success'>
<button type="button" class="close" data-dismiss="alert">&times;</button>
<?php echo $sessionSuccess;?>
</div>
<?php
}

$sessionError = $this->session->flashdata('error');
if(!empty($sessionError)) {
?>
<div class='alert alert-danger'>
<button type="button" class="close" data-dismiss="alert">&times;</button>
<?php echo $sessionError;?>
</div>
<?php
}