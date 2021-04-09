<?php $title = 'Panneau Administrateur'; ?>
<?php ob_start(); ?>
<div class="jumbotron">
<h1>Bienvenue, cher Administrateur!</h1>
</div>
<h2>Ici, vous avez tous les droits.</h2>
<?php $content = ob_get_clean();
require('template.php'); ?>
