<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISCONVE - Clientes</title>
    <link rel="shortcut icon" href="<?= URL ?>/public/img/favicon.svg" type="image/x-icon">
    <!-- Estilos -->
    <?php include("./../app/include/etc/styles.php") ?>
</head>

<body>

    <!-- navbar topo-->
    <?php include("./../app/include/parts/navbar.php") ?>

    <div id="container">

        <!-- menu lateral -->
        <?php include("./../app/include/parts/menubar.php") ?>

        <div class="content-center">
            <!-- conteudo do centro -->
            <div class="dashboard">
                <div class="title-content">
                    <div class="title-text">
                        <span>
                            <a href="<?= URL ?>/DashboardController/dashboard">
                                <img src="../public/img/dashboard-verde.svg" alt="Dashboard">
                                Dashboard
                            </a>
                        </span>
                        <span>/</span>
                        <span>
                            <img src="../public/img/truck-icon.svg" alt="Fornecedor">
                            Fornecedores
                        </span>
                    </div>
                </div>

                <div class="item-area">
                    <div class="manage-item-top">
                        <div class="search-item">
                            <input id="search" onkeyup="search()" type="text" placeholder="Procure por um fornecedor">
                            <img src="../public/img/search-icon.svg" alt="Search">
                        </div>

                        <button type="button" id="btn" data-toggle="modal" data-target="#cadastrar-fornecedor-modal">
                            <img src="../public/img/adicionar-item.svg" alt="Adicionar fornecedor">
                            Cadastrar Fornecedor
                        </button>

                        <!-- modal para cadastro do fornecedor -->
                        <?php include('./../app/include/modal/cadastrar-fornecedor-modal.php'); ?>

                    </div>

                    <div class="table-item-area">
                        <table id="table-item">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome do Fornecedor</th>
                                    <th>Telefone</th>
                                    <th>Cidade</th>
                                    <th>Estado</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dados['fornecedores'] as $fornecedor) : ?>
                                    <tr>
                                        <td><?= $fornecedor->id_fornecedor ?></td>
                                        <td><?= $fornecedor->nome_fornecedor ?></td>
                                        <td><?= $fornecedor->telefone ?></td>
                                        <td><?= $fornecedor->cidade ?></td>
                                        <td><?= $fornecedor->estado ?></td>
                                        <td>
                                            <button title="Ver fornecedor" onclick="">
                                                <img src="../public/img/eye-icon.svg" alt="">
                                            </button>
                                            <button title="Editar fornecedor" onclick="">
                                                <img src="../public/img/pencil-icon.svg" alt="">
                                            </button>
                                            <button title="Exluir fornecedor" onclick="deleteFornecedor('<?= $fornecedor->id_fornecedor ?>', '<?= $fornecedor->nome_fornecedor ?>')">
                                                <img src="../public/img/trash-icon.svg" alt="">
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

<?php include("./../app/include/etc/scripts.php"); ?>

</html>