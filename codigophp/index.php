<?php
require("testlogin.php");
require("conect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<p><a href="login.php">Cambiar Usuario</a></p>
<a href='lista_meme.php'>Crear Meme</a>

<?php

$SesNombre = $_SESSION["nombre"];

$resultadoId = $conn->query("SELECT id FROM Usuarios WHERE nombre = '$SesNombre'");
$filaId = $resultadoId->fetch();
$idValido = $filaId["id"];

$resultadoUrl = $conn->query("SELECT * FROM Memes WHERE id_usuario = '$idValido'"); 
$memesUrls = $resultadoUrl->fetchAll(PDO::FETCH_ASSOC);

print("<table class='memes'>");
print("<h1>MEMES CREADOS</h1>");
foreach($memesUrls as $memeCreado) {
    $meme = $memeCreado['foto'];
    print("<tr>");
    print("<p><a href='borrarmeme.php?id=".$memeCreado["id"]."'><i class='fa-solid fa-minus'>BORRAR</i></a></p>");
    print("<img src = '$meme'>");
    print("</td>");
}    
?>



</body>
</html>