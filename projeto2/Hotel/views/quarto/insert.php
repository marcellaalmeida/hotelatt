<?php
    require "../../autoload.php";

    // Construir o objeto do Quarto
    $quarto = new Quarto();
    $quarto->setNumero($_POST['numero']);
    $quarto->setTipo($_POST['tipo']);
    $quarto->setPreco($_POST['preco']);
    $quarto->setStatus($_POST['status']);

    // Inserir no Banco de Dados
    $dao = new QuartoDAO();
    $dao->create($quarto);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');