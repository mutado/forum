<?php
//connect.php
session_start();
require_once('src/classes/sqlQuerry.php');

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'forum_db';

$querry = new Querry($server,$username,$password,$database);

$link_db = mysqli_connect($server, $username, $password);

if (!$link_db) {
    exit('Error: could not establish database connection');
}
if (!mysqli_select_db($link_db, $database)) {
    exit('Error: could not select the database');
}