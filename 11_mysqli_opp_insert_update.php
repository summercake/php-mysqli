<?php
header('content-type:text/html;charset=utf-8');

// 1. Connect
$conn = mysqli_connect('localhost', 'root', '', 'study') or die('Connect Error: ' . $mysqli->connect_error);
// 2. Set Charset
mysqli_set_charset($conn, 'UTF8');
// 3. SQL Query
$sql = 'INSERT items (item_no) VALUES ("A-999")';
$res = mysqli_query($conn, $sql);
if ($res) {
    echo 'AUTO_INCREMENT: ' . mysqli_insert_id($conn);
    echo '<br>';
    echo 'AFFECTED ROWS: ' . mysqli_affected_rows($conn);
    echo '<br>';
} else {
    echo 'ERROR : <br>';
    echo mysqli_errno($conn) . ':' . mysqli_error($conn);
    echo '<br>';
}

$sql = 'UPDATE items SET item_no=1001 WHERE id=34;';
$sql .= 'DELETE FROM items WHERE id=33;';
$res = mysqli_multi_query($conn, $sql);
var_dump($res);
echo '<br>';

mysqli_close($conn);
