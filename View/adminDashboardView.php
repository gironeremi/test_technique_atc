<?php $title = 'Panneau Administrateur'; ?>
<?php ob_start(); ?>
<div class="jumbotron">
    <h1>Bienvenue, cher Administrateur!</h1>
</div>
<?php
    if (isset($users)) {
        ?>
        <div class="container">
            <ul class="list-group">
                <h2>liste des utilisateurs</h2>
        <?php
        foreach($users as $user){
            ?>
                <li class="list-group-item"> <?= ucfirst(strtolower($user)); ?></li>
            <?php
        }
        ?>
            </ul>
        </div>
        <?php
    }
?>
<?php $content = ob_get_clean();
require('template.php'); ?>
