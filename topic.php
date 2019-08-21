<?php
//topic.php
include 'connect.php';
include 'src/elements/header.php';

//first select the topic based on $_GET['cat_id']
$sql = "SELECT
    topic_id,
    topic_subject
FROM
    topics
WHERE
    topics.topic_id = " . mysqli_real_escape_string($link_db, $_GET['id']);

$result = mysqli_query($link_db, $sql);

if (!$result) {
    echo 'The topic could not be displayed, please try again later.' . mysqli_error($link_db);
} else {
    //display topic data
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<h2>`' . $row['topic_subject'] . '`</h2>';
    }

    //do a query for the topics
    $sql = "
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
    posts.post_topic = " . mysqli_real_escape_string($link_db, $_GET['id'])."
    ORDER BY post_id DESC";


    $result = mysqli_query($link_db, $sql);

    if (!$result) {
        echo 'The posts could not be displayed, please try again later.';
    } else {
        if (mysqli_num_rows($result) == 0) {
            echo 'There are no posts in this topic yet.';
        } else {
            //prepare the table
            echo '<table border="1">';

            while ($row = mysqli_fetch_assoc($result)) {
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
        }
        if (isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true) {

            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                //the form hasn't been posted yet, display it
                echo '<form method="post" action="">
 <textarea name="content" placeholder="write your reply"/></textarea>
    <input type="submit" value="Reply" />
 </form>';
            } else {
                //the form has been posted, so save it
                $sql = "INSERT INTO posts(post_content, post_date,post_topic,post_by)
       VALUES('" . mysqli_real_escape_string($link_db, $_POST["content"]) . "',
             NOW(),
             ".$_GET['id'].",
             ".$_SESSION['user_id'].")";

                $result = mysqli_query($link_db, $sql);
                if (!$result) {
                    //something went wrong, display the error
                    echo 'Error' . mysqli_error($link_db);
                } else {
                    echo 'New post added successful.';
                    header("Refresh:0");
                }
            }
        }
        else
        {
            echo "<p>Sign in to reply</p>";
        }
    }

}

include 'src/elements/footer.php';
?>