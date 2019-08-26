<?php

try {
    include_once 'connect.php';
    include 'src/elements/header.php';
    //main content goes here

    include "public/starting_page.html";

    //end of main content
} catch (Throwable $th) {
    include 'src/elements/header.php';
    echo 'Something went wrong. Please reload page';
}
finally{
    include 'src/elements/footer.php';
}
