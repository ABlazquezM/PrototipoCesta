<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Nuevo Producto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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
         margin-top: 15px;
        }

        .titulo {
            font-size: 40px;
            font-weight: bold;
            color: #333;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);        }

        .container {
            background-color: #f2f2f2;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .campos {
            margin-bottom: 20px;
        }

        .campos label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .campos input,
        .campos textarea {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .campos- input[type="number"] {
            -moz-appearance: textfield;
        }

        .campos button {
            background-color: teal; /* Cambia el color aquí */
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
        }

        .campos button:hover {
            background-color: turquoise;
        }

        .web{
            font-size: 20px;
            font-weight: bold;
            color: #333;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        a{
            color: steelblue;
    text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="cabecera">
        <h1 class="titulo">Nuevo Producto</h1>
    </div>

    <div class="container">
        <form action="productos.php" method="post">
            
            <div class="campos">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>

            <div class="campos">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" required></textarea>
            </div>

            <div class="campos">
                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" step="0.01" required>
            </div>

            <div class="campos">
                <button type="submit">Guardar</button>
            </div>
        </form>
        <div class="web">
    <span> Ir a -> <a href="index.php">Web</a> </span>
</div>
    </div>
</body>

</html>
