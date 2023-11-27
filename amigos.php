<?php
include("php/conexion.php");
include("php/ValidarSesion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Alfredo Alvarez </title>
    <link rel="stylesheet" href="css/estilo.css" type="text/css">
</head>
<body>
    <header>
        <div id="logo">
            <img src="img/logo.png" alt="logo" height="80" width="270">  
        </div>
        <nav class="menu">
            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="miperfil.php">Perfil</a></li>
                <li><a href="amigos.php">Mis Amigos</a></li>
                <li><a href="fotos.php">Fotos</a></li>
                <li><a href="agregar.php">Agregar  Amigos</a></li>
                <li><a href="php/CerrarSesion.php">CerrarSesion</a></li>
            </ul>
        </nav>
    </header>
    <section id="recuadros">
        <h2> Mis amigos </h2>

        <?php
        $consulta="Select * From persona P Where P.Nickname in (Select A.Nickname2 From amistad A Where A.Nickname1='$nickname')";
        $datos=mysqli_query($conexion, $consulta);
        while($fila=mysqli_fetch_array($datos)){
        ?>
        <section class="recuadro">
            <img src="<?php echo $fila['FotoPerfil']?>" height="150">
            <h2> <?php echo $fila['Nombre']."". $fila['Apellidos']?> </h2>
            <p class="parrafo">
                <?php echo $fila['Descripcion']?>
            </p>
            <a href="<?php echo "perfil.php?nickname=". $fila['Nickname']?>" class="boton">Ver perfil UvU</a><br><br>
        </section>

        <?php
        } 
        ?>
 
    </section>
        <footer>
        <p> copyright &copy; Alfredo Alvarez </p>
    </footer>
    
</body>
</html>