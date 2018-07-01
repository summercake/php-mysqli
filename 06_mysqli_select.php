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
$sql = 'SELECT * FROM customer';
// query() sonly can execute one piece of sql
$result = $mysqli->query($sql);
if ($result && $result->num_rows > 0) {
    echo 'Success!!! ' . $result->num_rows . '<br>';
    /**
     * fetch_all()
     */
    // $rows = $result->fetch_all(); // returns two dimension array index+index
    // $rows = $result->fetch_all(MYSQLI_ASSOC); // return key value
    // $rows = $result->fetch_all(MYSQLI_NUM); // return index value
    // $rows = $result->fetch_all(MYSQLI_BOTH); // return index key value
    /**
     * fetch_row()
     */
    $rows = $result->fetch_row(); // return index value
    print_r($rows);
    $rows = $result->fetch_assoc(); // return key value
    print_r($rows);
    $rows = $result->fetch_array(); // return index value
    print_r($rows);
    $rows = $result->fetch_array(MYSQLI_ASSOC); // return key value
    print_r($rows);
    $rows = $result->fetch_object(); // return object
    print_r($rows);
    /**
     * data_seek() move the pointer
     */
    $result->data_seek(0);
    $rows = $result->fetch_assoc(); // return key value
    print_r($rows);

    $result->data_seek(0);
    while ($rows = $result->fetch_assoc()) {
        print_r($rows);
    }
} else {
    echo 'ERROR!!!' . $mysqli->errno . ': ' . $mysqli->error;
}
// var_dump($result);
$mysqli->close();
