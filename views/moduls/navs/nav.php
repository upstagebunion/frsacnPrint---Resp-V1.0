<?php $verif = new ContentController; ?>
<?php if(isset($_GET["pag"])): ?>

    <nav class="lateral-izquierdo" id="lateral-izquierdo">
        <div class="enlaces">
            <a href="index.php?pag=main" <?php $verif -> selecNav("main"); ?> ><i class="fas fa-tshirt"></i>Inicio</a>
            <a href="index.php?pag=muestrario"  <?php $verif -> selecNav("muestrario"); ?> ><i class="fas fa-tshirt"></i>Muestrario</a>
            <a href="index.php#about-main" ><i class="fas fa-tshirt"></i>Conócenos</a>
            <a href="index.php#contactanos-main" ><i class="fas fa-tshirt"></i>Contactanos</a>
            <hr />
            <a href="documents/listaPrecios.pdf" target="_blank"><i class="fas fa-tshirt"></i>Lista de precios</a>
            <a href="index.php?pag=logIn" <?php $verif -> selecNav("logIn"); ?> ><i class="fas fa-tshirt"></i>Iniciar Sesión</a>
            <a href="index.php?pag=registro" <?php $verif -> selecNav("registro"); ?> ><i class="fas fa-tshirt"></i>Registrarse</a>
        </div>
        <div class="boton">
            <button id="menuLateralIzquierdoMostrar"><img src="images/boton.png" /></button>
        </div>
    </nav>

<?php else: ?>
	<nav class="lateral-izquierdo" id="lateral-izquierdo">
        <div class="enlaces">
            <a href="index.php?pag=main" class="active"><i class="fas fa-tshirt"></i>Inicio</a>
            <a href="index.php?pag=muestrario"><i class="fas fa-tshirt"></i>Muestrario</a>
            <a href="index.php#about-main"><i class="fas fa-tshirt"></i>Conócenos</a>
            <a href="index.php#contactanos-main"><i class="fas fa-tshirt"></i>Contactanos</a>
            <a href="documents/listaPrecios.pdf" target="_blank"><i class="fas fa-tshirt"></i>Lista de precios</a>
            <hr />
            <a href="index.php?pag=logIn"><i class="fas fa-tshirt"></i>Iniciar Sesión</a>
            <a href="index.php?pag=registro"><i class="fas fa-tshirt"></i>Registrarse</a>
        </div>
        <div class="boton">
            <button id="menuLateralIzquierdoMostrar"><img src="images/boton.png" /></button>
        </div>
    </nav>

<?php endif ?>