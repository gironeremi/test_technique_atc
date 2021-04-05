<?php $title = 'Panneau Administrateur'; ?>
<?php ob_start(); ?>
<div class="jumbotron">
<h1>Bienvenue, cher Administrateur!</h1>
</div>

<?php $content = ob_get_clean();
require('template.php'); ?>
