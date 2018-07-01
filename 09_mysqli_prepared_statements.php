<?php
header('content-type:text/html;charset=utf-8');
$mysqli = @new mysqli('localhost', 'root', '', 'study');
// connect_errno can get the error number that caused by connect
if ($mysqli->connect_errno) {
    // connect_error can get the error info by error number
    die('Connect Error: ' . $mysqli->connect_error);
}
$mysqli->set_charset('utf8');
$sql = 'SELECT customer_name, contact_name FROM customer WHERE customer_id<?';
$statement = $mysqli->prepare($sql);
$id = 1010;
$statement->bind_param('i', $id);
if ($statement->execute()) {
    $statement->bind_result($customer_name, $contact_name);
    while ($statement->fetch()) {
        echo 'customer_name=' . $customer_name . '<br>';
        echo 'contact_name=' . $contact_name . '<br>';
        echo '<hr>';
    }
} else {
    $statement->error;
}
$statement->free_result();
$mysqli->close();
