<?php $title = 'Tableau de bord';
ob_start(); ?>
<div class="jumbotron">
    <h1>Bienvenue <?= $_SESSION['username']; ?> !</h1>
</div>


<?php $content = ob_get_clean();
require('template.php'); ?>