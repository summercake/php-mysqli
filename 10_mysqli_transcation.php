<?php
header('content-type:text/html;charset=utf-8');
$mysqli = @new mysqli('localhost', 'root', '', 'study');
// connect_errno can get the error number that caused by connect
if ($mysqli->connect_errno) {
    // connect_error can get the error info by error number
    die('Connect Error: ' . $mysqli->connect_error);
}
$mysqli->set_charset('UTF8');
$mysqli->autocommit(false);

$sql = 'UPDATE items SET item_no=1000 WHERE id=33';
$res = $mysqli->query($sql);
$res_affect = $mysqli->affected_rows;

$sql1 = 'UPDATE items SET item_no=1001 WHERE id=32';
$res1 = $mysqli->query($sql1);
$res1_affect = $mysqli->affected_rows;

if ($res && $res_affect && $res1 && $res1_affect) {
    $mysqli->commit();
    echo 'Success<br>';
    $mysqli->autocommit(true);
} else {
    $mysqli->rollback();
    echo 'Fail<br>';
}
$mysqli->close();
