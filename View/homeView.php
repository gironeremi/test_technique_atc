<?php $title = 'Accueil';
ob_start(); ?>

<h1>Salut!</h1>
<div>
<p>Coordonnées: <span id="position"></span></p>
</div>
<?php $content = ob_get_clean();
require('template.php'); ?>