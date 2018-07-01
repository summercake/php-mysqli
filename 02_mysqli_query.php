<?php
header('content-type:text/html;charset=utf-8');
$mysqli = @new mysqli('localhost', 'root', '', 'study');
// connect_errno can get the error number that caused by connect
if ($mysqli->connect_errno) {
    // connect_error can get the error info by error number
    die('Connect Error: ' . $mysqli->connect_error);
}
$mysqli->set_charset('utf8');
$sql = 'SELECT * FROM product';
$mysqli->query($sql);
/**
 * Key words: SELECT/DESC/DESCRIBE/SHOW/EXPLAIN
 * if success, returns result set
 * if fail, returns false
 * Other key word will return true or false
 */

$mysqli->close();
