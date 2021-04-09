<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title><?php
        if (!empty($title)) {
            echo $title;
        } else {
            echo 'test';
        }?></title>
    <link href="../public/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../public/css/style.css" rel="stylesheet" />
</head>

<body id="page-top">
<?php require('header.php'); ?>
<?php if (!empty($content)) {
    echo $content;
} ?>
<script type="text/javascript" src="../public/js/main.js"></script>
</body>
</html>