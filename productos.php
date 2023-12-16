<?php

    $conexion = mysqli_connect("localhost","root","","Tienda") or die("La conexión ha fallado");
    $conexion -> set_charset("utf8");

   
    $consulta = "call agregarProducto('".$_POST['nombre']."','".$_POST['descripcion']."','".$_POST['precio']."')";

    mysqli_query($conexion,$consulta);

    mysqli_close($conexion);

    echo "<h3 style='text-align:center;'>¡¡¡¡El producto se ha añadido correctamente!!!</h3>";

    header("refresh:2;agregarProductos.php");





?>