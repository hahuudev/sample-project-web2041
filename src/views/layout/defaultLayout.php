<?php


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>X-Shop trang thương mại điện tử hàng đầu VN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous" async></script>

    <link rel="stylesheet" href="<?= DOMAIN ?>/public/css/base.css">
    <link rel="stylesheet" href="<?= DOMAIN ?>/public/css/main.css">
    <link rel="stylesheet" href="<?= DOMAIN ?>/public/css/grid.css">
</head>

<body>
    <div class="app" style="">
        <?php

        $this->render('layout/header');
        ?>

        <div class="container">
            <?php
            $this->render($content, $props);
            ?>
        </div>

        <?php
        $this->render('layout/footer');
        ?>
    </div>
</body>

</html>