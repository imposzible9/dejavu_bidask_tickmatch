<?php 

$message['status'] = "susscess";
$message['info'] = "สำเร็จ";

$result = $class->querybidask($_POST);

$res = [];
$res['success'] = true;
// $res['data'] = $row;
// $res['count'] = count($row);
// $res['x1'] = $stDt;
// $res['x2'] = $enDt;
// $res['fromdata'] = $data;
// $res['row_tickmatch'] = $row_tickmatch;
$res['bidask'] = $result['bidask'];
$res['tickmatch'] = $result['tickmatch'];

echo json_encode($res);
