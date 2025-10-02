<?php
    require "../../model/autoload.php";

    $dao = new FuncionarioDAO();
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
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
    </style>
</head>

<body> <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <!-- ... todos os símbolos SVG ... -->
    </svg>
    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle"> <button
            class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button"
            aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)"> <svg
                class="bi my-1 theme-icon-active" aria-hidden="true">
                <use href="#circle-half"></use>
            </svg> <span class="visually-hidden" id="bd-theme-text">Toggle theme</span> </button>
        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
            <li> <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light"
                    aria-pressed="false"> <svg class="bi me-2 opacity-50" aria-hidden="true">
                        <use href="#sun-fill"></use>
                    </svg>
                    Light
                    <svg class="bi ms-auto d-none" aria-hidden="true">
                        <use href="#check2"></use>
                    </svg> </button> </li>
            <li> <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"
                    aria-pressed="false"> <svg class="bi me-2 opacity-50" aria-hidden="true">
                        <use href="#moon-stars-fill"></use>
                    </svg>
                    Dark
                    <svg class="bi ms-auto d-none" aria-hidden="true">
                        <use href="#check2"></use>
                    </svg> </button> </li>
            <li> <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto"
                    aria-pressed="true"> <svg class="bi me-2 opacity-50" aria-hidden="true">
                        <use href="#circle-half"></use>
                    </svg>
                    Auto
                    <svg class="bi ms-auto d-none" aria-hidden="true">
                        <use href="#check2"></use>
                    </svg> </button> </li>
        </ul>
    </div> <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <!-- ... todos os símbolos SVG ... -->
    </svg>
    <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark"> <a
            class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">Hotel Tonella</a>
        <ul class="navbar-nav flex-row d-md-none">
            <li class="nav-item text-nowrap"> <button class="nav-link px-3 text-white" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarSearch" aria-controls="navbarSearch"
                    aria-expanded="false" aria-label="Toggle search"> <svg class="bi" aria-hidden="true">
                        <use xlink:href="#search"></use>
                    </svg> </button> </li>
            <li class="nav-item text-nowrap"> <button class="nav-link px-3 text-white" type="button"
                    data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
                    aria-expanded="false" aria-label="Toggle navigation"> <svg class="bi" aria-hidden="true">
                        <use xlink:href="#list"></use>
                    </svg> </button> </li>
        </ul>
        <div id="navbarSearch" class="navbar-search w-100 collapse"> <input
                class="form-control w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
        </div>
    </header>
    <div class="container-fluid">
        <div class="row">
            <?php include "../../sidebar.html" ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="my-4">
                    <h2>Funcionários</h2>
                    <a href="create.php">Novo Funcionário</a>
                    <table class="table table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Cargo</th>
                            <th>Salário</th>
                            <th>Ações</th>
                        </tr>
                        <?php foreach($dao->read() as $funcionario) : ?>
                            <tr>
                                <td><?= $funcionario->getId() ?></td>
                                <td><?= $funcionario->getNome() ?></td>
                                <td><?= $funcionario->getCargo() ?></td>
                                <td><?= $funcionario->getSalario() ?></td>
                                <td>
                                    <a href="edit.php?id=<?= $funcionario->getId() ?>" title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a class="link link-danger" href="destroy.php?id=<?= $funcionario->getId() ?>" title="Excluir">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </table>
                </div>
            </main>
        </div>
    </div>
    <script src="../../js/bootstrap.bundle.min.js" class="astro-vvvwv3sm"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js"
        integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"
        class="astro-vvvwv3sm"></script>
    <script src="../../js/dashboard.js" class="astro-vvvwv3sm"></script>
</body>

</html>