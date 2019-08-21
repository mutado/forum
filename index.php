<?php
//create_cat.php
include 'connect.php';
include 'src/elements/header.php';
$sql = "SELECT
            cat_id,
            cat_name,
            cat_description
        FROM
            categories";

$result = mysqli_query($link_db,$sql);

if(!$result)
{
    echo 'The categories could not be displayed, please try again later.';
}
else
{
    if(mysqli_num_rows($result) == 0)
    {
        echo 'No categories defined yet.';
    }
    else
    {

        //prepare the table
        echo '<table class="categories">
              <tr>
                <th>Category</th>
                <th>Last topic</th>
              </tr>';

        while($row = mysqli_fetch_assoc($result))
        {
            echo '<tr>';
            echo '<td class="leftpart">';
            echo "<h3><a href=\"category.php?id=${row['cat_id']}\">" . $row['cat_name'] . '</a></h3>' . $row['cat_description'];
            echo '</td>';
            echo '<td class="rightpart">';
            echo "<a href=\"topic.php?id=${row['cat_id']}\">Topic subject</a> at 10-10";
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
}

include 'src/elements/footer.php';