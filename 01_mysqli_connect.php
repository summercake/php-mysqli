<?php
// 1. establish conection to mysql
/* $mysqli = new mysqli();
$mysqli->connect('localhost', 'root', ''); */
// $mysqli = new mysqli('localhost', 'root', '');
// 2. open specific db
// $mysqli->select_db('study');
// print_r($mysqli);

// 3. establish connection and open db; @ is Error Control Operators
$mysqli = @new mysqli('localhost', 'root', '', 'study');
if ($mysqli->connect_errno) {
    die('Connect Error: ' . $mysqli->connect_error);
}
print_r($mysqli);
echo '<hr color="red">';
echo 'Client Info: ' . $mysqli->client_info;
echo '<hr color="red">';
echo 'Client version: ' . $mysqli->client_version;
echo '<hr color="red">';
echo 'Client Info: ' . $mysqli->get_client_info();
echo '<hr color="red">';
echo 'Server Info: ' . $mysqli->server_info;
echo '<hr color="red">';
echo 'Server Info: ' . $mysqli->get_server_info();
echo '<hr color="red">';
echo 'Server version: ' . $mysqli->server_version;
