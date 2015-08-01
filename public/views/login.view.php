<h1>Login!</h1>
<?php
    if (isset($view_vars['error_msg'])) {

?>
    <p class="error"><?=$view_vars['error_msg'];?></p>
<?php
    }
?>
<?=$view_vars['login_form']?>