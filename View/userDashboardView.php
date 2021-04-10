<?php $title = 'Tableau de bord';
ob_start(); ?>
<div class="jumbotron">
    <h1>Bienvenue <?= $_SESSION['username']; ?> !</h1>
</div>
<div>
    <?php
        if (isset($users)) {
    ?>
    <ul class="list-group">liste des utilisateurs
    <?php
        foreach($users as $user) {
    ?>
    <li class="list-group-item"><?= $user ?></li>
    <?php
        }
    ?>
    </ul>
    <?php
        }
    ?>
</div>


<?php $content = ob_get_clean();
require('template.php'); ?>