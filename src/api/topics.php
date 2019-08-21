<?php
//id is category.id of topic
require_once('../../connect.php');

$size;
if(!isset($_GET['size']))
{
    $size = 10;
}else{
    $size = $_GET['size'];
}

if (!isset($_GET['id'])){
    
}else{
    try {
            $querry->Execute("SELECT * FROM topics WHERE topic_cat = " . mysqli_real_escape_string($link_db,$_GET['id'])." LIMIT ".$size);
            while ($row = mysqli_fetch_assoc($querry->GetResults())) {
                echo '<div class="card">';
                echo '<div class="bigpart">';
                echo '<h2>' . $row['topic_subject'] . '</h2>';
                echo '</div>';
                echo '<div class="smallpart">';
                echo '<p class="small">' . date('d-m-Y', strtotime($row['topic_date'])) . '</p>';
                echo '<p class="small">' . date("H:i:s", strtotime($row['topic_date'])) . '</p>';
                echo '</div>';
                echo '</div>';
            }

            echo '</table>';
    } catch (\Throwable $th) {
        echo $th->getMessage();
    }
    
}