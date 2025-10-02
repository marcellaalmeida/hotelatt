<?php
    require "../../model/autoload.php";

    $dao = new GerenteDAO();
?>

<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Hotel Tonella">
    <meta name="generator" content="Astro v5.9.2">
    <title>Hotel Tonella</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">
    <script src="../../js/color-modes.js"></script>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <meta name="theme-color" content="#712cf9">
    <link href="../../css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: #0000001a;
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em #0000001a, inset 0 .125em .5em #00000026
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;
            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8
        }

        .bd-mode-toggle {
            z-index: 1500
        }

        .bd-mode-toggle .bi {
            width: 1em;
            height: 1em
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important
        }
        
        .status-badge {
            font-size: 0.75rem;
        }
    </style>
</head>

<body> 
    <!-- SVG icons e header... -->
    
    <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark"> 
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">Hotel Tonella</a>
        <!-- Resto do header... -->
    </header>
    
    <div class="container-fluid">
        <div class="row">
            <?php include "../../sidebar.html" ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="my-4">
                    <h2>Gerentes</h2>
                    <a href="create.php" class="btn btn-primary mb-3">Novo Gerente</a>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Departamento</th>
                                    <th>Salário</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($dao->read() as $gerente) : ?>
                                    <tr>
                                        <td><?= $gerente->getId() ?></td>
                                        <td><?= $gerente->getNome() ?></td>
                                        <td><?= $gerente->getDepartamento() ?></td>
                                        <td>R$ <?= number_format($gerente->getSalario(), 2, ',', '.') ?></td>
                                        <td>
                                            <?php 
                                                $status = $gerente->getStatus();
                                                $badgeClass = $status == 'Ativo' ? 'bg-success' : 'bg-secondary';
                                            ?>
                                            <span class="badge <?= $badgeClass ?> status-badge"><?= $status ?></span>
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <a href="edit.php?id=<?= $gerente->getId() ?>" class="btn btn-outline-primary" title="Editar">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <a href="destroy.php?id=<?= $gerente->getId() ?>" class="btn btn-outline-danger" title="Excluir" onclick="return confirm('Tem certeza que deseja excluir este gerente?')">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
    
    <script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>