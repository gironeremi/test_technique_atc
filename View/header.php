<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-lg">
    <a class="navbar-brand" href="index.php">Exo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" wfd-invisible="true">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <?php
                if (isset($_SESSION['username'])) {
                    if ($_SESSION['role_id'] === 1) {
                    ?>
                        <li class="nav nav-item">
                        <a href="index.php?action=adminDashboard" class="nav-link">
                        Panneau d'administration</a>
                        </li>
                        <?php
                    } else {
                    ?>
                    <li class="nav nav-item">
                        <a href="index.php?action=userDashboard" class="nav-link">
                            Salut <?= $_SESSION['username'] ?> !</a>
                    </li>
                    <?php
                    }
                    ?>
                <li class="nav nav-item">
                    <a href="index.php?action=logout" class="nav-link">Déconnexion</a>
                </li>
                <?php
                } else {
                ?>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=login">Connexion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=register">Inscription</a>
            </li>
            <?php }
            ?>
        </ul>
    </div>
</nav>
<?php if (!empty($successMessage)) {
    ?>
    <div id="successMessage" class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <?= $successMessage ?>
    </div>
<?php }
?>