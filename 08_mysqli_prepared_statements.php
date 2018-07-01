<?php
header('content-type:text/html;charset=utf-8');
$mysqli = @new mysqli('localhost', 'root', '', 'study');
// connect_errno can get the error number that caused by connect
if ($mysqli->connect_errno) {
    // connect_error can get the error info by error number
    die('Connect Error: ' . $mysqli->connect_error);
}
$mysqli->set_charset('utf8');
$sql = 'INSERT items(item_no) VALUES (?)';
$statement = $mysqli->prepare($sql);
$value = 'A-999';
// bind_param() the first params is type of other params
$statement->bind_param('s', $value);

if ($statement->execute()) {
    echo $statement->insert_id;
    echo '<br>';
} else {
    $statement->error;
}
$statement->free_result();
$mysqli->close();
