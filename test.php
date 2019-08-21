<?php
include("src/elements/header.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="temp">
    </div>


    <script>
    var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.querySelector('.temp').innerHTML = this.responseText;
     
    }
  };
  xhttp.open("GET", "src/api/post.php?id=2&size=20", true);
  xhttp.send();
    </script>
</body>
</html>

<?php
include("src/elements/footer.php");
?>
