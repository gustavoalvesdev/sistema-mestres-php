<?php

include_once '../../includes/config.php';

$message = '';

$search = addslashes($_POST['searching']);

if (empty($search)) {

    $message = ['status' => 'info', 'message' => 'Favor, preencha o campo de busca', 'redirect' => ''];

    echo json_encode($message);

    return;

}

$read = $pdo->prepare("SELECT cliente_id, cliente_nome, cliente_email, cliente_status, cliente_cadastro FROM " . DB_CLIENTS . " WHERE cliente_nome = :cliente_nome AND cliente_status = :cliente_status");
$read->bindValue(':cliente_nome', $search);
$read->bindValue(':cliente_status', 1);
$read->execute();

$lines = $read->rowCount();

if ($lines == 0) {

    $message = ['status' => 'info', 'message' => 'Esse Cliente não foi encontrado!', 'redirect' => ''];

    echo json_encode($message);

    return;

}

foreach($read as $show) {
    $message = [
        'status' => 'success',
        'message' => 'Cliente encontrado!',
        'cliente_nome' => addslashes($show['cliente_nome']), 
        'cliente_email' => addslashes($show['cliente_email']), 
        'cliente_status' => addslashes($show['cliente_status']), 
        'cliente_cadastro' => addslashes($show['cliente_cadastro']), 
        'cliente_id' => addslashes($show['cliente_id']), 
        'redirect' => ''
    ];

    echo json_encode($message);
    return;
}
