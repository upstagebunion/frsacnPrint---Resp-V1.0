<?php header('Content-Type: text/html; charset=UTF-8'); ?>

<!DOCTYPE html>

<html lang="es">

    <head>
        <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title> FRSANC || Sublimación </title>
        <link rel="icon" href="images/logo150.png" type="image/png" sizes="150x150">
        <link href="styles/normalize.css" rel="stylesheet" />
        <?php 
        
        $head = ContentController::ctrlHead();
				echo $head;
        ?>


    </head>

    <body>

        <div class="contenedor">

            <?php
				$navAct = ContentController::ctrlNav();
				include $navAct;
			?>

            <?php 
                include "moduls/main.php"; 
            ?>
        </div>

        <bottom>
        <p>
             Copyright <br /><br />
            <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/" target="_blank"><img alt="Licencia Creative Commons" src="https://i.creativecommons.org/l/by-nc-sa/4.0/88x31.png" /></a><br />
            Esta obra, incluyendo logotipos, marca y codigo fuente están bajo una <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/" target="_blank">Licencia Creative Commons Atribución-NoComercial-CompartirIgual 4.0 Internacional</a>
        </p>
        </bottom>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.js"></script>
        <script src="https://kit.fontawesome.com/4d06835232.js" crossorigin="anonymous"></script>
        <script src="jscript/scripts.js"></script>

</html> 