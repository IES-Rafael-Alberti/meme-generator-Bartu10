<?php
require("recibirJson.php");

//if success show image
$id=$_GET["id"];
if($data["success"]) {
    //iterates over memes array
    foreach($data["data"]["memes"] as $meme) {
        //show meme image
        if($meme["id"]==$id){
            $vmeme = $meme["url"];
            echo "<a href='editarMeme.php?id=".$id."'><img  width='200px' src='" . $meme["url"] . "'></a>";
            $cajas=$meme["box_count"];
        }
 
    }
}

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
    <form action="editarmeme.php" method="post">
        <input type="text" name="idMeme" hidden value="<?php echo $_GET["id"];?>">
        <?php
            require("recibirJson.php");
            if($data["success"]) {
                //iterates over memes array
                $x=1;
                foreach($data["data"]["memes"] as $meme) {
                    //show meme image

                    if($meme["id"]==$id){
                        $vmeme = $meme["url"];
                        while($x<=$meme["box_count"]){
                            echo "<label for='text'>Texto$x</label>";
                            echo "<input type='text' name='text.$x.' id='text.$x'>";
                            echo "<br>";
                            $x++;
                        }
                        $cajas=$meme["box_count"];
                    }
                }
                    //checks query for custom text
    $text = "Futuro Meme";

    //checks query for image file
    $image = $vmeme ;

    //load image
    $im = imagecreatefromjpeg($image);

    //response will be a jpeg image
    header('Content-Type: image/jpeg');

    //choose color
    $blue = imagecolorallocate($im, 0x14, 0x36, 0x42);

    //ruta archivo de fuente ttf
    $font_file = ".Lora.ttf";
    
    //draws text with size 40
    imagefttext($im, 36, 0, 40, 100, $blue, $font_file, $text);

    //write image data in response
    imagejpeg($im);

    //destroy image object
    imagedestroy($im);
            }
                print("<a href='muestra_imgmod.php'>mostrar meme</a>")
        ?>
        
    </form>
</body>
</html>