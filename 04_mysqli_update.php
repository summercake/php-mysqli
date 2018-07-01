<?php
header('content-type:text/html;charset=utf-8');
$mysqli = @new mysqli('localhost', 'root', '', 'study');
// connect_errno can get the error number that caused by connect
if ($mysqli->connect_errno) {
    // connect_error can get the error info by error number
    die('Connect Error: ' . $mysqli->connect_error);
}
$mysqli->set_charset('utf8');
// $sql = 'INSERT items(item_no) values ("A-999")';
$sql = 'UPDATE items SET item_no=1000 WHERE id=20';
// query() sonly can execute one piece of sql
$result = $mysqli->query($sql);
if ($result) {
    // if faild, affected_rows will return -1
    echo 'Success!!! ' . $mysqli->affected_rows . ' has been updated';
} else {
    echo 'ERROR!!!' . $mysqli->errno . ': ' . $mysqli_error;
}

$mysqli->close();
