<?php
//create_cat.php
include 'connect.php';
include 'src/elements/header.php';

$_SESSION['signed_in'] = false;

include 'src/elements/footer.php';

echo '<script>window.history.back()</script>';