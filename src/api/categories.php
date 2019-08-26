<?php
//id is category.id of topic
require_once('../../connect.php');

class Category
{
    public $name;
    public $description;
    public $id;
}


$size;
if(!isset($_GET['size']))
{
    $size = 10;
}else{
    $size = $_GET['size'];
}

    try {
            $querry->Execute("SELECT * FROM categories LIMIT ".$size);
            $results = array();
            while ($row = mysqli_fetch_assoc($querry->GetResults())) {
                $card = new Category();
                $card->name = $row['cat_name'];
                $card->description = $row['cat_description'];
                $card->id = $row['cat_id'];

                array_push($results,$card);
            }
            echo json_encode($results);
    } catch (\Throwable $th) {
        // echo $th->getMessage();
    }