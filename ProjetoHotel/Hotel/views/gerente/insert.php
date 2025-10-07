<?php
    require "../../autoload.php";

    // Construir o objeto do Gerente
    $gerente = new Gerente();
    $gerente->setNome($_POST['nome']);
    $gerente->setDepartamento($_POST['departamento']);
    $gerente->setSalario($_POST['salario']);
    $gerente->setStatus($_POST['status']);

    // Inserir no Banco de Dados
    $dao = new GerenteDAO();
    $dao->create($gerente);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');