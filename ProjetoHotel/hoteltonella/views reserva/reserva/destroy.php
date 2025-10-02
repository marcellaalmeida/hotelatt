<?php
require "../../model/autoload.php";

// Excluir do Banco de Dados
$dao = new ReservaDAO();
$dao->destroy($_GET['id']);

// Redirecionar para o index
header('Location: index.php');