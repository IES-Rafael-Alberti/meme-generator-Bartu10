<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    
body{
    background-color: beige;
}
h1{
    text-align: center;
}

img{
    display: block;
    margin: auto;
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
    <form action="crearmeme.php" method="post">
        <input type="text" name="idMeme" hidden value="<?php echo $_GET["id"];?>">
        <input type="text" name="cajas" hidden value="<?php echo $_GET["cajas"];?>">
        <?php
            $id=$_GET["id"];
            $cajas=$_GET["cajas"];
            $url=$_GET["url"];
            $i=1;
                echo "<img width='150px' src='".$url."'>";
                while($i<=$cajas){
                    echo "</br><label for='texto$i'>Texto $i</label> ";
                    echo "<input type='text2' name='texto$i' id='texto$i'> ";
                    echo "<br>";
                    $i++;
                }
        ?>
        </br>        
        <input type="submit" value="CREAR MEME">
    </form>
</body>
</html>