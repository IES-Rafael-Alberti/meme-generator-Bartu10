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
