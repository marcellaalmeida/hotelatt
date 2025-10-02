<?php
require "../../model/autoload.php";

// Buscar dados para os selects
$hospedeDAO = new HospedeDAO();
$hospedes = $hospedeDAO->read();

$quartoDAO = new QuartoDAO();
$quartos = $quartoDAO->read();

$funcionarioDAO = new FuncionarioDAO();
$funcionarios = $funcionarioDAO->read();
?>

<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Hotel Tonella">
    <meta name="generator" content="Astro v5.9.2">
    <title>Nova Reserva - Hotel Tonella</title>
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

        .form-section {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .form-section h5 {
            color: #495057;
            border-bottom: 2px solid #712cf9;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        
        .required::after {
            content: " *";
            color: #dc3545;
        }
    </style>
</head>

<body>
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="check2" viewBox="0 0 16 16">
            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"></path>
        </symbol>
        <symbol id="circle-half" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"></path>
        </symbol>
        <symbol id="moon-stars-fill" viewBox="0 0 16 16">
            <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"></path>
            <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"></path>
        </symbol>
        <symbol id="sun-fill" viewBox="0 0 16 16">
            <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"></path>
        </symbol>
    </svg>

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
        <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button"
            aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
            <svg class="bi my-1 theme-icon-active" aria-hidden="true">
                <use href="#circle-half"></use>
            </svg>
            <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
            <li><button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
                <svg class="bi me-2 opacity-50" aria-hidden="true"><use href="#sun-fill"></use></svg>
                Light
                <svg class="bi ms-auto d-none" aria-hidden="true"><use href="#check2"></use></svg>
            </button></li>
            <li><button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
                <svg class="bi me-2 opacity-50" aria-hidden="true"><use href="#moon-stars-fill"></use></svg>
                Dark
                <svg class="bi ms-auto d-none" aria-hidden="true"><use href="#check2"></use></svg>
            </button></li>
            <li><button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
                <svg class="bi me-2 opacity-50" aria-hidden="true"><use href="#circle-half"></use></svg>
                Auto
                <svg class="bi ms-auto d-none" aria-hidden="true"><use href="#check2"></use></svg>
            </button></li>
        </ul>
    </div>

    <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">
            <strong>🏨 Hotel Tonella</strong>
        </a>
        <ul class="navbar-nav flex-row d-md-none">
            <li class="nav-item text-nowrap">
                <button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle search">
                    <svg class="bi" aria-hidden="true"><use xlink:href="#search"></use></svg>
                </button>
            </li>
            <li class="nav-item text-nowrap">
                <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <svg class="bi" aria-hidden="true"><use xlink:href="#list"></use></svg>
                </button>
            </li>
        </ul>
        <div id="navbarSearch" class="navbar-search w-100 collapse">
            <input class="form-control w-100 rounded-0 border-0" type="text" placeholder="Buscar..." aria-label="Search">
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <?php include "../../sidebar.html" ?>
            
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Nova Reserva</h1>
                    <a href="index.php" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i>
                        Voltar para Lista
                    </a>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Dados da Reserva</h5>
                    </div>
                    <div class="card-body">
                        <form action="insert.php" method="post">
                            <!-- Seção: Dados do Hóspede -->
                            <div class="form-section">
                                <h5><i class="bi bi-person"></i> Dados do Hóspede</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="hospede_id_hospede" class="form-label required">Hóspede</label>
                                            <select name="hospede_id_hospede" class="form-select" required>
                                                <option value="">Selecione um hóspede...</option>
                                                <?php foreach($hospedes as $hospede): ?>
                                                    <option value="<?= $hospede->getIdHospede() ?>">
                                                        <?= $hospede->getNome() ?> - <?= $hospede->getDocumento() ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="hospede" class="form-label required">Nome do Hóspede</label>
                                            <input type="text" name="hospede" class="form-control" required placeholder="Nome completo do hóspede">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Seção: Datas e Quarto -->
                            <div class="form-section">
                                <h5><i class="bi bi-calendar"></i> Datas e Quarto</h5>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="data_checkin" class="form-label required">Check-in</label>
                                            <input type="date" name="data_checkin" class="form-control" required min="<?= date('Y-m-d') ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="data_checkout" class="form-label required">Check-out</label>
                                            <input type="date" name="data_checkout" class="form-control" required min="<?= date('Y-m-d') ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="quarto_idquarto" class="form-label required">Quarto</label>
                                            <select name="quarto_idquarto" class="form-select" required>
                                                <option value="">Selecione um quarto...</option>
                                                <?php foreach($quartos as $quarto): ?>
                                                    <?php if($quarto->getStatus() === 'Disponível'): ?>
                                                        <option value="<?= $quarto->getIdQuarto() ?>" data-preco="<?= $quarto->getPreco() ?>">
                                                            Quarto <?= $quarto->getNumero() ?> - <?= $quarto->getTipo() ?> (R$ <?= number_format($quarto->getPreco(), 2, ',', '.') ?>/noite)
                                                        </option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="quarto" class="form-label required">Número do Quarto</label>
                                            <input type="number" name="quarto" class="form-control" required placeholder="Número do quarto">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Seção: Valores e Status -->
                            <div class="form-section">
                                <h5><i class="bi bi-currency-dollar"></i> Valores e Status</h5>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="valor_total" class="form-label required">Valor Total (R$)</label>
                                            <input type="number" name="valor_total" class="form-control" step="0.01" required placeholder="0.00">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="status" class="form-label required">Status</label>
                                            <select name="status" class="form-select" required>
                                                <option value="">Selecione o status...</option>
                                                <option value="Pendente">Pendente</option>
                                                <option value="Confirmada">Confirmada</option>
                                                <option value="Ativa">Ativa</option>
                                                <option value="Cancelada">Cancelada</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="funcionario_id_funcionario" class="form-label required">Funcionário Responsável</label>
                                            <select name="funcionario_id_funcionario" class="form-select" required>
                                                <option value="">Selecione o funcionário...</option>
                                                <?php foreach($funcionarios as $funcionario): ?>
                                                    <option value="<?= $funcionario->getIdFuncionario() ?>">
                                                        <?= $funcionario->getNome() ?> - <?= $funcionario->getCargo() ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="funcionario" class="form-label required">Nome do Funcionário</label>
                                            <input type="text" name="funcionario" class="form-control" required placeholder="Nome do funcionário responsável">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Botões -->
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="d-flex gap-2 justify-content-end">
                                        <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                        <button type="reset" class="btn btn-warning">Limpar</button>
                                        <button type="submit" class="btn btn-success">
                                            <i class="bi bi-check-lg"></i>
                                            Criar Reserva
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script>
        // Cálculo automático do valor total baseado nas datas e preço do quarto
        document.addEventListener('DOMContentLoaded', function() {
            const checkinInput = document.querySelector('input[name="data_checkin"]');
            const checkoutInput = document.querySelector('input[name="data_checkout"]');
            const quartoSelect = document.querySelector('select[name="quarto_idquarto"]');
            const valorTotalInput = document.querySelector('input[name="valor_total"]');
            const numeroQuartoInput = document.querySelector('input[name="quarto"]');

            // Preencher número do quarto automaticamente
            quartoSelect.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                if (selectedOption.value) {
                    const quartoText = selectedOption.text;
                    const numeroMatch = quartoText.match(/Quarto (\d+)/);
                    if (numeroMatch) {
                        numeroQuartoInput.value = numeroMatch[1];
                    }
                }
            });

            // Calcular valor total quando datas ou quarto mudarem
            function calcularValorTotal() {
                const checkin = new Date(checkinInput.value);
                const checkout = new Date(checkoutInput.value);
                const selectedOption = quartoSelect.options[quartoSelect.selectedIndex];
                
                if (checkin && checkout && selectedOption.value && checkin < checkout) {
                    const precoDiaria = parseFloat(selectedOption.getAttribute('data-preco'));
                    const diffTime = Math.abs(checkout - checkin);
                    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                    const valorTotal = precoDiaria * diffDays;
                    
                    valorTotalInput.value = valorTotal.toFixed(2);
                }
            }

            checkinInput.addEventListener('change', calcularValorTotal);
            checkoutInput.addEventListener('change', calcularValorTotal);
            quartoSelect.addEventListener('change', calcularValorTotal);
        });
    </script>
</body>
</html>