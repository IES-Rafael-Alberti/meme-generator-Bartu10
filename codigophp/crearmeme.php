<?php
require("testlogin.php");
require("conect.php");

$id=$_POST['idMeme'];
$cajas=$_POST['cajas'];

 if (isset($_POST["texto1"])){
     //url for meme creation
    $url = 'https://api.imgflip.com/caption_image';
    $boxes=array();
 //The data you want to send via POST
      for($z=1;$z<=$cajas;$z++){
      $datoForm=$_POST["texto$z"];

      array_push($boxes,array("text" => $datoForm));
      }
 $fields = array(
         "template_id" => $id,
         "username" => "fjortegan",
         "password" => "pestillo",
         "boxes" =>$boxes
         ); 
 //url-ify the data for the POST
 $fields_string = http_build_query($fields);
 
 //open connection
 $ch = curl_init();
 
 //set the url, number of POST vars, POST data
 curl_setopt($ch,CURLOPT_URL, $url);
 curl_setopt($ch,CURLOPT_POST, true);
 curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
 
 //So that curl_exec returns the contents of the cURL; rather than echoing it
 curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
 
 //execute post
 $result = curl_exec($ch);
 
 //decode response
 $data = json_decode($result, true);
 
 //if success show image
 if($data["success"]) {
      $nombre = $_SESSION["nombre"];
      $nombrememe = $nombre . "_" . date("dmyhis").".jpg";
     file_put_contents("memes/$nombrememe", file_get_contents($data["data"]["url"]));
     $url=$data["data"]["url"];
     //echo "<img src='".$url."'>";

      $resultado = $conn->query("SELECT id FROM Usuarios WHERE nombre = '$nombre'");
      $filapersona = $resultado->fetch();


     $sql = "INSERT INTO MEMES(foto,id_usuario) VALUES (:foto,:id_usuario)";
     
     
     $datos = array("foto" => "memes/$nombrememe",
     "id_usuario" => $filapersona["id"]
    );
      
      $stmt = $conn->prepare($sql);
// ejecuta la sentencia usando los valores
      $stmt->execute($datos);
 
      header("Location: index.php");
      exit(0);
}
 }