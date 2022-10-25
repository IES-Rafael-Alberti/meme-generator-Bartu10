<?php
if(isset($_POST['nombre'])) {
   require("conect.php");
   $nombre = $_POST["nombre"];
   $password = $_POST["password"];
  
   // prepara la sentencia SQL. Le doy un nombre a cada dato del formulario 
   $sql = "SELECT * FROM Usuarios WHERE nombre = :nombre AND pwd = :pwd";
   // asocia valores a esos nombres
   $datos = array("nombre" => $nombre,
                  "pwd" => $password
                 );
    // comprueba que la sentencia SQL preparada está bien 
    $stmt = $conn->prepare($sql);
    // ejecuta la sentencia usando los valores
    $stmt->execute($datos);
    if($stmt->rowCount() == 1) {
        session_start();
        $_SESSION["nombre"] = $nombre;
        session_write_close();
        header("Location: index.php");
        exit(0);
    }
    header("Location: login.php");
    exit(0);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protectora de animales RAfaNO - Login</title>
</head>
<body>
<h1>Login</h1>
<form action="" method="post" enctype="multipart/form-data">
    <label for="nombre">Usuario: </label>
    <input type="text" name="nombre" id="nombre">
    <label for="password">Password: </label>
    <input type="password" name="password" id="password">
    <input type="submit" value="Login">

    <?php
    print("<a href='register.php'>registrarse");
    ?>
</form>    
</body>
</html>