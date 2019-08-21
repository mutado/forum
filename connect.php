<?php
//connect.php
session_start();

$server = 'localhost';
$username = 'mutado';
$password = '2304';
$database = 'forum_db';

$link_db = mysqli_connect($server, $username, $password);
if (!$link_db) {
    exit('Error: could not establish database connection');
}
if (!mysqli_select_db($link_db, $database)) {
    exit('Error: could not select the database');
}