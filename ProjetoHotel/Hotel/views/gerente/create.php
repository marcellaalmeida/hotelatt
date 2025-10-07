<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistema de Gestão Hotel Tonella">
    <meta name="author" content="Hotel Tonella">
    <title>Hotel Tonella - Gerentes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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

        .card {
            transition: transform 0.2s;
        }
        
        .card:hover {
            transform: translateY(-2px);
        }
    </style>
</head>

<body>
    <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">Hotel Tonella</a>
    </header>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Simulada -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <span data-feather="home"></span>
                                Gerentes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="users"></span>
                                Funcionários
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="bar-chart-2"></span>
                                Relatórios
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="my-4">
                    <h2>Gestão de Gerentes</h2>
                    
                    <!-- Formulário Simplificado -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">Cadastrar Gerente</h5>
                        </div>
                        <div class="card-body">
                            <form action="insert.php" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="nome" class="form-label">Nome</label>
                                            <input type="text" name="nome" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="departamento" class="form-label">Departamento</label>
                                            <select name="departamento" class="form-control" required>
                                                <option value="">Selecione...</option>
                                                <option value="Recepção">Recepção</option>
                                                <option value="Limpeza">Limpeza</option>
                                                <option value="Restaurante">Restaurante</option>
                                                <option value="Financeiro">Financeiro</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="salario" class="form-label">Salário</label>
                                            <input type="text" name="salario" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="status" class="form-label">Status</label>
                                            <select name="status" class="form-control" required>
                                                <option value="Ativo">Ativo</option>
                                                <option value="Inativo">Inativo</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex gap-2">
                                    <input type="reset" value="Limpar" class="btn btn-secondary">
                                    <input type="submit" value="Salvar" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Lista de Gerentes -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Gerentes Cadastrados</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Departamento</th>
                                            <th>Salário</th>
                                            <th>Status</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>João Silva</td>
                                            <td>Recepção</td>
                                            <td>R$ 8.500,00</td>
                                            <td><span class="badge bg-success">Ativo</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary">Editar</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Maria Santos</td>
                                            <td>Restaurante</td>
                                            <td>R$ 9.200,00</td>
                                            <td><span class="badge bg-success">Ativo</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary">Editar</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Carlos Oliveira</td>
                                            <td>Financeiro</td>
                                            <td>R$ 10.000,00</td>
                                            <td><span class="badge bg-secondary">Inativo</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary">Editar</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>