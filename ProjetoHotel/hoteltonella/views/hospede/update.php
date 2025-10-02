<?php
    require "../../autoload.php";

    // Construir o objeto do Hóspede
    $hospede = new Hospede();
    $hospede->setNome($_POST['nome']);
    $hospede->setDocumento($_POST['documento']);
    $hospede->setId($_POST['id']);

    // Atualizar registro no Banco de Dados
    $dao = new HospedeDAO();
    $dao->update($Hospede);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');