<?php
header('content-type:text/html;charset=utf-8');

// 1. Connect
$conn = @mysqli_connect('localhost', 'root', '', 'study') or die('Connect Error: ' . $mysqli->connect_error);
// 2. Set Charset
mysqli_set_charset($conn, 'UTF8');
// 3. SQL Query
$sql = 'UPDATE items SET item_no=? WHERE id=?';
$statement = mysqli_prepare($conn, $sql);
$item_no = 1000;
$id = 35;
mysqli_stmt_bind_param($statement, 'si', $item_no, $id);
$res = mysqli_stmt_execute($statement);
var_dump($res);

mysqli_close($conn);
