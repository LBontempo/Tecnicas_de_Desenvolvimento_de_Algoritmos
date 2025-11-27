<?php
    require_once("../config.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Painel Administrativo - Bontempo Contabilidade</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="../style.css">
</head>

<body>

<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <i class="fa-solid fa-calculator"></i> Bontempo Contabilidade
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">
                        Home
                    </a>
                </li>

                <!-- CARGOS -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" 
                       data-bs-toggle="dropdown">
                        <i class="fa-solid fa-briefcase"></i> Cargo
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="?page=cadastrar_cargo">Cadastrar</a></li>
                        <li><a class="dropdown-item" href="?page=listar_cargo">Listar</a></li>
                    </ul>
                </li>

                <!-- FUNCIONÁRIOS -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" 
                       data-bs-toggle="dropdown">
                        <i class="fa-solid fa-users"></i> Funcionário
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="?page=cadastrar_funcionario">Cadastrar</a></li>
                        <li><a class="dropdown-item" href="?page=listar_funcionario">Listar</a></li>
                    </ul>
                </li>

                <!-- FÉRIAS -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" 
                       data-bs-toggle="dropdown">
                        <i class="fa-solid fa-plane"></i> Férias
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="?page=cadastrar_ferias">Cadastrar</a></li>
                        <li><a class="dropdown-item" href="?page=listar_ferias">Listar</a></li>
                    </ul>
                </li>

                <!-- SERVIÇOS -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" 
                       data-bs-toggle="dropdown">
                        <i class="fa-solid fa-file-invoice-dollar"></i> Serviços
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="?page=cadastrar_servico">Cadastrar</a></li>
                        <li><a class="dropdown-item" href="?page=listar_servico">Listar</a></li>
                    </ul>
                </li>

            </ul>

            <a href="../index.html" class="btn btn-outline-light">
                <i class="fa-solid fa-right-from-bracket"></i> Sair
            </a>

        </div>
    </div>
</nav>

<!-- CONTEÚDO -->
<div class="container mt-3">
    <div class="row">
        <div class="col">

            <?php

                switch (@$_REQUEST["page"]) {

                    // CARGO
                    case "cadastrar_cargo":
                        include("cargo/cadastrar_cargo.php");
                        break;

                    case "listar_cargo":
                        include("cargo/listar_cargo.php");
                        break;

                    case "salvar_cargo":
                        include("cargo/salvar_cargo.php");
                        break;

                    case "editar_cargo":
                        include("cargo/editar_cargo.php");
                        break;

                    // FUNCIONARIO
                    case "cadastrar_funcionario":
                        include("funcionario/cadastrar_funcionario.php");
                        break;

                    case "listar_funcionario":
                        include("funcionario/listar_funcionario.php");
                        break;

                    case "salvar_funcionario":
                        include("funcionario/salvar_funcionario.php");
                        break;

                    case "editar_funcionario":
                        include("funcionario/editar_funcionario.php");
                        break;

                    // FERIAS
                    case "cadastrar_ferias":
                        include("ferias/cadastrar_ferias.php");
                        break;

                    case "listar_ferias":
                        include("ferias/listar_ferias.php");
                        break;

                    case "editar_ferias":
                        include("ferias/editar_ferias.php");
                        break;

                    case "salvar_ferias":
                        include("ferias/salvar_ferias.php");
                        break;

                    // SERVICO
                    case "cadastrar_servico":
                        include("servico/cadastrar_servico.php");
                        break;

                    case "listar_servico":
                        include("servico/listar_servico.php");
                        break;

                    case "editar_servico":
                        include("servico/editar_servico.php");
                        break;

                    case "salvar_servico":
                        include("servico/salvar_servico.php");
                        break;

                    default:
                        print "<h1 class='mt-3'>Bem-vindo ao painel do Bontempo Contabilidade!</h1>";
                        break;
                }
            ?>

        </div>
    </div>
</div>

<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>