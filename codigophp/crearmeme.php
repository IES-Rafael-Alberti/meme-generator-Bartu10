<?php
require("testlogin.php");

$id=$_POST['idMeme'];
$cajas=$_POST['cajas'];

 if (isset($_POST["texto1"])){
     //url for meme creation
    $url = 'https://api.imgflip.com/caption_image';
    $boxes=array();
 //The data you want to send via POST
      for($x=1;$x<=$cajas;$x++){
      $datoForm=$_POST["texto$x"];
      array_push($boxes,array("text" => $datoForm,
      "color" => "#ff8484"));
      }
 $fields = array(
         "template_id" => $id,
         "username" => "fjortegan",
         "password" => "pestillo",
         "boxes" =>$boxes
         );
/*$fields = array(
         "template_id" => "112126428",
         "username" => "fjortegan",
         "password" => "pestillo",
         "boxes" => array( 
             array("text" => "Frontend",
                   "color" => "#ff8484"),
             array("text" => "Alumno DAW",
                   "color" => "#D6FFF6"),
             array("text" => "Backend",
                   "color" => "#2374ab")
         ));
 */
 
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
      //CUIDADO CON LOS ESPACIOS
     //echo "<img src=".$data["data"]["url"].">";
     echo "<img src='".$data["data"]["url"]."'>";
 }
 }



?>