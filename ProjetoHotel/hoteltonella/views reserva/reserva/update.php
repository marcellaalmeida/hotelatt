<?php
require "../../model/autoload.php";

$reserva = new Reserva();
$reserva->setIdReserva($_POST['id_reserva']);
$reserva->setHospede($_POST['hospede']);
$reserva->setQuarto($_POST['quarto']);
$reserva->setDataCheckin($_POST['data_checkin']);
$reserva->setDataCheckout($_POST['data_checkout']);
$reserva->setFuncionario($_POST['funcionario']);
$reserva->setStatus($_POST['status']);
$reserva->setValorTotal($_POST['valor_total']);

$dao = new ReservaDAO();
$dao->update($reserva);

header('Location: index.php');