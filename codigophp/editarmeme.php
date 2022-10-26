<?php
require("recibirjson.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="generarmeme.php" method="post">
        <input type="text" name="idMeme" hidden value="<?php echo $_GET["id"];?>">
        <input type="text" name="cajas" hidden value="<?php echo $_GET["cajas"];?>">
        <?php
            require("recibirjson.php");
            if($data["success"]) {
                //iterates over memes array
                $x=1;
                $id=$_GET["id"];
                foreach($data["data"]["memes"] as $meme) {
                    //show meme image

                    if($meme["id"]==$id){
                        $vmeme = $meme["url"];
                        echo "<a href='editarMeme.php?id=".$id."'><img  width='200px' src='" . $meme["url"] . "'></a><p>";
                        $array=array();
                        while($x<=$meme["box_count"]){
                            echo "<label for='text'>Texto$x</label>";
                            echo "<input type='text' name='text$x' id='text$x'>";
                            echo "<br>";
                            $x++;
                            array_push($array, "texto.$x");
                        }
                    }
                }
                print("<a href='crearmeme.php?url=$vmeme'>mostrar meme</a>");
            }

        ?>
        
    </form>
</body>
</html>