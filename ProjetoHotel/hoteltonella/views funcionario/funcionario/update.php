<?php
    require "../../autoload.php";

    // Construir o objeto do Hóspede
    $funcionario = new Funcionario();
    $funcionario->setNome($_POST['nome']);
    $funcionario->setCargo($_POST['cargo']);
    $funcionario->setSalario($_POST['salario']);
    $funcionario->setId($_POST['id']);

    // Atualizar registro no Banco de Dados
    $dao = new FuncionarioDAO();
    $dao->update($funcionario);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');