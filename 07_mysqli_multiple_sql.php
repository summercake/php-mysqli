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
$sql = 'SELECT * FROM customer;';
$sql .= 'SELECT * FROM order;';
$sql .= 'SELECT * FROM employee;';
$sql .= 'SELECT NOW();';
// multi_query() can execute multiple pieces of sql
if ($mysqli->multi_query($sql)) {
    echo 'Success!!! ' . '<br>';
    do {
        // store_result() store current sql result
        if ($result = $mysqli->store_result()) {
            $rows[] = $result->fetch_all(MYSQLI_ASSOC);
        }
        // more_results() to find if it has more data
        // next_result() move pointer to next sql statement
    } while ($mysqli->more_results() && $mysqli->next_result());
} else {
    echo 'ERROR!!!' . $mysqli->errno . ': ' . $mysqli->error;
}
print_r($rows);
// var_dump($result);
$mysqli->close();
