<?php
    require "../../autoload.php";

    // Construir o objeto do Funcionario
    $Funcionario = new Funcionario();
    $Funcionario->setNome($_POST['nome']);
    $Funcionario->setCargo($_POST['cargo']);
    $Funcionario->setSalario($_POST['salario']);

    // Inserir no Banco de Dados
    $dao = new FuncionarioDAO();
    $dao->create($Funcionario);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');