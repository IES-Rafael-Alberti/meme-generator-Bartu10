<?php
require("conect.php");

$meme = $_GET['id'];
$sql = "DELETE FROM Memes WHERE id = :id";
$data = array("id" => $meme);
$stmt = $conn->prepare($sql);

if($stmt->execute($data) != 1){
    print("No se puede eliminar el meme");
    exit(0); 
}
header("Location: index.php");
exit(0);

?>