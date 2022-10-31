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
    <title>MemesGenerator</title>

    <style>
body{
    background-color: beige;
}
h1{
    text-align: center;
}

a{
	width:100%;
	padding:8px 16px;
	margin-top:32px;
	border:1px solid #000;
	border-radius:5px;
	display:block;
	color:#fff;
	background-color:#000;
    text-decoration: none;
    text-align: center;
}

a:hover{

    cursor:pointer;
}

*{box-sizing:border-box;}

form{
	width:300px;
	padding:16px;
	border-radius:10px;
	margin:auto;
	background-color:#ccc;
}

form label{
	width:72px;
	font-weight:bold;
	display:inline-block;
}

form input[type="text"],
form input[type="email"]{
	width:180px;
	padding:3px 10px;
	border:1px solid #f6f6f6;
	border-radius:3px;
	background-color:#f6f6f6;
	margin:8px 0;
	display:inline-block;
}

form input[type="submit"]{
	width:100%;
	padding:8px 16px;
	margin-top:32px;
	border:1px solid #000;
	border-radius:5px;
	display:block;
	color:#fff;
	background-color:#000;
} 

form input[type="submit"]:hover{
	cursor:pointer;
}

textarea{
	width:100%;
	height:100px;
	border:1px solid #f6f6f6;
	border-radius:3px;
	background-color:#f6f6f6;			
	margin:8px 0;
	/*resize: vertical | horizontal | none | both*/
	resize:none;
	display:block;
}

    </style>
</head>
<body>
<h1>Login</h1>

<form action="" method="post" enctype="multipart/form-data">
    <label for="nombre">Nombre: </label>
    <input type="text" name="nombre" id="nombre">
    <label for="password">Password: </label>
    <input type="password" name="password" id="password">
    <input type="submit" value="Login">
    __________________________________
    <?php
    print("<a href='register.php'><i class='fa-regular fa-key'>Registrarse</i>");
    ?>
</form>    
</body>
</html>