<?php

	session_start();

?>
<?php
    require_once "controllers/template-controller.php";
    require_once "controllers/content-controller.php";
    require_once "controllers/user-controller.php";
    require_once "models/user-model.php";


    $plantilla = new TemplateControl();
    $plantilla -> traerPlantilla();
?>