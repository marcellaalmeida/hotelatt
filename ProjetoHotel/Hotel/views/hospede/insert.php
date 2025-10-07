<?php
    require "../../autoload.php";

    // Construir o objeto do Hospede
    $Hospede = new Hospede();
    $Hospede->setNome($_POST['nome']);
    $Hospede->setDocumento($_POST['documento']);

    // Inserir no Banco de Dados
    $dao = new HospedeDAO();
    $dao->create($Hospede);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');