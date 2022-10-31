<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: beige;
        }
    </style>
</head>
<body>
<?php
    require("recibirjson.php");
    if($data["success"]) {
    foreach($data["data"]["memes"] as $meme) {
        $memeId=$meme['id'];
        $cajas=$meme["box_count"];
        $url=$meme["url"];

        echo "<a href='editarMeme.php?id=".$memeId."&cajas=".$cajas."&url=".$url."'><img  width='100px' src='" . $meme["url"] . "'></a>";
        $cajas=$meme["box_count"];
    }
}
    ?>
</body>
</html>




