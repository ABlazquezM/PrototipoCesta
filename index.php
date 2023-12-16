<!DOCTYPE html>
<html lang="es">

<head>

    <style>
        .contenido {
            display: flex;
        }

        .col-9 {
            flex: 70%;
        }

        .col-3 {
            flex: 30%;
        }

        .cabecera {

            background-image: url("fondo.jpg");
            padding: 20px;
            text-align: center;
            width: 80%;
            height: 100px;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 20px;
        }

        .titulo {
            font-size: 40px;
            font-weight: bold;
            color: #333;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .producto {
            background-color: #f2f2f2;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            margin-left: auto;
            margin-right: 40px;
            width: 78%;
            display;

        }

        .nombre {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .descipcion {
            font-size: 19px;
            font-style: italic;
            color: #333;
        }

        .precio {
            color: blue;
            margin-bottom: 10px;
        }

        .boton button {
            background-color: blueviolet;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .boton button:hover {
            background-color: mediumorchid;
        }

        .cestaTitulo {
            background-color: aquamarine;
            padding: 9px;
            margin-bottom: 20px;
            border-radius: 5px;
            width: 64%;
            height: auto;
            text-align: center;

        }

        .Cesta {
            background-color: #f2f2f2;
            padding: 9px;
            margin-bottom: 20px;
            border-radius: 5px;
            width: 40%;
            height: auto;
            text-align: center;
            margin-left: 50px;


        }

        .nom {
            font-weight: bold;
            color: maroon;

        }

        .botonnn{
            margin-left: 90px;
        }
        .botonn {
            margin-left: 100px;

        }

        span{
            color: indianred;
            font-weight: bold;
            font-size: 19px;
        }

        .vaciar-cesta-btn {
            background-color: teal;
            /* Cambia el color aquí */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .vaciar-cesta-btn:hover {
            background-color: turquoise;
        }
        .hacerPedido-btn {
            background-color: teal;
            margin-bottom: 5px;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .hacePedido-btn:hover {
            background-color: turquoise;
        }
    </style>
</head>

<body>
    <div class="container">
        <div id="cabecera" class="row">

            <div class="cabecera">
                <h1 class="titulo">Tienda</h1>
            </div>
        </div>
        <div class="row">

            <div class="contenido">
                <div class="col-9">
                    <div class="row">

                        <?php

                        $conexion = mysqli_connect("localhost", "root", "", "Tienda") or die("La conexión ha fallado");
                        $conexion->set_charset("utf8");

                        $consulta = "SELECT * FROM productos";
                        $resultado = mysqli_query($conexion, $consulta);


                        while ($fila = mysqli_fetch_assoc($resultado)) {


                            echo '<div class="producto">';
                            echo '<form action="meterEnCesta.php" method="post" enctype="multipart/form-data">';
                            echo '<div class="nombre">';
                            echo '<label for="nombre">' . $fila["nombrePro"] . '</label>';
                            echo '<input type="text" id="nombre" name="nombre" value="' . $fila["nombrePro"] . '" style="display: none">';
                            echo '</div>';

                            echo '<div class="descipcion">';
                            echo '<label for="descripcion">' . $fila["descripcionPro"] . '</label>';
                            echo '<textarea id="descripcion" name="descripcion" style="display: none">' . $fila["descripcionPro"] . '</textarea>';
                            echo '</div>';

                            echo '<div class="precio">';
                            echo '<label for="precio">' . $fila["precio"] . '</label>';
                            echo '<input type="text" id="precio" name="precio" value="' . $fila["precio"] . '" style="display: none">';
                            echo '</div>';
                            echo '<div class="boton">';
                            echo '<button type="submit">Añadir a la cesta</button>';
                            echo '</div>';

                            echo '</form>';
                            echo '</div>';



                        }



                        $conexion->close();
                        ?>

                    </div>
                </div>


                <div class="col-3">
                    <div class="cestaTitulo">CESTA</div>

                    <div class="row">
                        <?php

                        $conexion = mysqli_connect("localhost", "root", "", "Tienda") or die("La conexión ha fallado");
                        $conexion->set_charset("utf8");


                        $consulta = "SELECT * FROM cesta";
                        $resultado = mysqli_query($conexion, $consulta);


                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            echo '<div class="Cesta">';
                            echo '<div class="nom">' . $fila["nombre"] . '</div>';
                            echo '<div>' . $fila["descipcion"] . '</div>';
                            echo '<div>Precio: ' . $fila["pecioC"] . '</div>';
                            echo '</div>';
                        }


                        $conexion->close();
                        ?>
                    </div>



                    <?php
                    $conexion = mysqli_connect("localhost", "root", "", "Tienda") or die("La conexión ha fallado");

                    $consulta = "SELECT SUM(pecioC) AS total FROM cesta";
                    $resultado = mysqli_query($conexion, $consulta);

                    $total = 0;
                    if ($fila = mysqli_fetch_array($resultado)) {
                        $total = $fila[0];
                    }

                    mysqli_close($conexion);
                    ?>

                    <div class="total">
                        Total:
                        <span>
                        <?php echo $total; ?> </span>
                        €
                    </div>


                    <div class="botonnn">
                        <form action="pedido.php" method="post">
                            <button type="submit" class="hacerPedido-btn">Realizar pedido</button>
                            <input type="text" id="precio" name="precio" value="<?php echo $total; ?>"  style="display: none">
                        </form>
                    </div>


                    <div class="botonn">
                        <form action="vaciarCesta.php" method="post">
                            <button type="submit" class="vaciar-cesta-btn">Vaciar Cesta</button>
                        </form>
                    </div>
                    



                </div>
            </div>

        </div>
</body>

</html>