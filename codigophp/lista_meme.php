<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require("recibirjson.php");
    if($data["success"]) {
    foreach($data["data"]["memes"] as $meme) {
        //show meme image
        echo "<img width='100px' src='" . $meme["url"] . "'>";
    }
}
    ?>
</body>
</html>