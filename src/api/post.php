<?php

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
        if (
            $querry->Execute("
            SELECT 
            posts.post_topic,
            posts.post_content,
            posts.post_date,
            posts.post_by,
            users.user_id,
           users.user_name
           FROM
        posts
        LEFT JOIN
        users
        ON
           posts.post_by = users.user_id
           WHERE
           posts.post_topic = " . mysqli_real_escape_string($link_db, $_GET['id']) ."
           ORDER BY post_id DESC
           LIMIT ".$size."")){
               
            echo '<table border="1">';

            while ($row = mysqli_fetch_assoc($querry->GetResults())) {
                echo '<tr>';
                echo '<td class="leftpart">';
                echo '<p>' . $row['post_content'] . '</p>';
                echo '</td>';
                echo '<td class="rightpart">';
                echo '<p class="small">' . $row['user_name'] . '</p>';
                echo '<p class="small">' . date('d-m-Y', strtotime($row['post_date'])) . '</p>';
                echo '<p class="small">' . date("H:i:s", strtotime($row['post_date'])) . '</p>';
                echo '</td>';
                echo '</tr>';
            }

            echo '</table>';
           }else{
            echo 'smth went wrong';
           }
    } catch (\Throwable $th) {
        echo "exception";
    }
    
}