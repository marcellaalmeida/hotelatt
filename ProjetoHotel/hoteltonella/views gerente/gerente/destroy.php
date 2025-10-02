1 of 2,709
(no subject)
Inbox

Marcella Almeida
Oct 1, 2025, 8:27 PM (13 hours ago)
https://github.com/marcellaalmeida/hoteltonella/upload/main

Marcella Almeida
Oct 1, 2025, 8:28 PM (13 hours ago)
https://github.com/marcellaalmeida/hoteltonella On Wed, Oct 1, 2025 at 8:27 PM Marcella Almeida <marcellaalmeidaprtb@gmail.com> wrote: https://github.com/marcel

ANTONIELY DOS SANTOS
Attachments
6:43 AM (3 hours ago)
to me

Arquivos Gerente -Hotel Tonella
 6 Attachments
  •  Scanned by Gmail
<?php
    require "../../autoload.php";

    // Excluir do Banco de Dados
    $dao = new GerenteDAO();
    $dao->destroy($_GET['id']);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');