<?php
    require "../../autoload.php";

    // Construir o objeto da reserva
    $reserva = new Reserva();
    $reserva->setDataCheckin($_POST['data_checkin']);
    $reserva->setDataCheckout($_POST['data_checkout']);
    $reserva->setQuarto($_POST['quarto']);
    $reserva->setHospede($_POST['hospede']);
    $reserva->setFuncionario($_POST['funcionario']);
    $reserva->setStatus($_POST['status']);
    $reserva->setValorTotal($_POST['valor_total']);
    $reserva->setFuncionarioIdFuncionario($_POST['funcionario_id_funcionario']);
    $reserva->setHospedeIdHospede($_POST['hospede_id_hospede']);
    $reserva->setQuartoIdquarto($_POST['quarto_idquarto']);

    // Inserir no Banco de Dados
    $dao = new ReservaDAO();
    $dao->create($reserva);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');