<?php
$message['status'] = "error";
$message['info'] = "";
$result = $class->check_symbol($_POST);
if (count($result['row_symbolcheck']) > 0) {
    $message['status'] = "susscess";
    $message['info'] = "มี Symbol";
} else {
    $message['status'] = "error";
    $message['info'] = "ไม่มี Symbol " . $_POST['symbol'] . "";
}
echo json_encode($message);
