<?php

    $conexion = mysqli_connect("localhost","root","","Tienda") or die("La conexión ha fallado");
    $conexion -> set_charset("utf8");

   
    $consulta = "call hacerPedido('".$_POST['precio']."')";

    mysqli_query($conexion,$consulta);


    $consulta2 = "call vaciarCesta();";

    mysqli_query($conexion,$consulta2);

    mysqli_close($conexion);


    echo "<h3 style='text-align:center;'>¡¡¡¡El pedido se ha realizado correctamente!!!</h3>";

    header("refresh:2;index.php");





?>