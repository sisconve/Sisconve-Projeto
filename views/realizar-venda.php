<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISCONVE - Realizar venda</title>
    <link rel="shortcut icon" href="../public/img/favicon.svg" type="image/x-icon">
    <!-- Estilos -->
    <?php include("../include/etc/styles.php") ?>
</head>

<body onload="countTableRows()">

    <!-- nav bar inicio -->
    <?php include("../include/parts/navbar.php") ?>
    <!-- navbar fim -->

    <div id="container">

        <!-- inicio menu-bar (barra lateral)-->
        <?php include("../include/parts/menubar.php") ?>
        <!-- menu-bar fim -->
        
        <!-- box-center início (area central) -->
        <div class="content-center">
            <?php include("../include/pages/realizar-venda.php") ?>
        </div>
        <!-- box-center fim -->

    </div>

</body>

<?php 
    // scripts js
    include("../include/etc/scripts.php");
?>

</html>