<?php
    require "../../autoload.php";

    // Construir o objeto do quarto
    $quarto = new Quarto();
    $quarto->setIdquarto($_POST['id']);
    $quarto->setNumero($_POST['numero']);
    $quarto->setTipo($_POST['tipo']);
    $quarto->setPreco($_POST['preco']);
    $quarto->setStatus($_POST['status']);

    // Atualizar registro no Banco de Dados
    $dao = new QuartoDAO();
    $dao->update($quarto);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');