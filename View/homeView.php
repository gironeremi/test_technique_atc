<?php $title = 'Accueil';
ob_start(); ?>

<h1>Salut!</h1>

<?php $content = ob_get_clean();
require('template.php'); ?>