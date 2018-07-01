<?php
header('content-type:text/html;charset=utf-8');
// 1. Connect
$conn = @mysqli_connect('localhost', 'root', '', 'study') or die('Connect Error: ' . $mysqli->connect_error);
// 2. Set Charset
mysqli_set_charset($conn, 'UTF8');
// 3. SQL Query
$sql = 'SELECT id, item_no FROM items';
$res = mysqli_query($conn, $sql);
echo mysqli_num_rows($res);
if ($res && mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
        // print_r($row);
        $rows[] = $row;
    }
} else {

}
print_r($rows);
