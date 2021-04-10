<?php $title = 'Panneau Administrateur'; ?>
<?php ob_start(); ?>
<div class="jumbotron">
    <h1>Bienvenue, cher Administrateur!</h1>
</div>
<?php
    if (isset($users)) {
        ?>
        <ul class="list-group">liste des utilisateurs
        <?php
        foreach($users as $user){
            ?>
            <li class="list-group-item"> <?= $user; ?></li>
            <?php
        }
        ?>
        </ul>
        <?php
    }
?>
<?php $content = ob_get_clean();
require('template.php'); ?>
