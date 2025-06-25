<?php

include_once '../../includes/config.php';

$message = '';

$search = addslashes($_POST['searching']);

if (empty($search)) {

    $message = ['status' => 'info', 'message' => 'Favor, preencha o campo de busca', 'redirect' => '', 'lines' => 0];

    echo json_encode($message);

    return;

}

$read = $pdo->prepare("SELECT cliente_id, cliente_nome, cliente_email, cliente_status, cliente_cadastro FROM " . DB_CLIENTS . " WHERE cliente_nome = :cliente_nome AND cliente_status = :cliente_status");
$read->bindValue(':cliente_nome', $search);
$read->bindValue(':cliente_status', 1);
$read->execute();

$lines = $read->rowCount();

if ($lines == 0) {

    $message = ['status' => 'info', 'message' => 'Esse Cliente não foi encontrado!', 'redirect' => '', 'lines' => 0];

    echo json_encode($message);

    return;

}

foreach($read as $show) {
    $register = ($show['cliente_cadastro'] == '' || $show['cliente_cadastro'] == '0000-00-00 00:00:00' ? '-' : date('d/m/Y H:i', strtotime($show['cliente_cadastro'])));
    $status = ($show['cliente_status'] == 0 ? 'INATIVO' : 'ATIVO');
    $message = [
        'status' => 'success',
        'message' => 'Cliente encontrado!',
        'cliente_nome' => addslashes($show['cliente_nome']), 
        'cliente_email' => addslashes($show['cliente_email']), 
        'cliente_status' => addslashes($status), 
        'cliente_cadastro' => addslashes($register), 
        'cliente_id' => addslashes($show['cliente_id'])
    ];

    echo json_encode($message);
    return;
}
