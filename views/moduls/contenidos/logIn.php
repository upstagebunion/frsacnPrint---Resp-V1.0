<main class="main-inicio">
    <div class="mostrador">
        <h1 class="titulo">Ingresar<a href="editar-producto.html">Editar</a></h1>
        <div class="imagen">
            <img src="images/presentacion.png" />
        </div>
        <div class="grid-formulario">
            <form method="post">
                <div class="input">
                    <p>Correo Electronico</p>
                    <input type="text" id="ingresoEmail" name="ingresoEmail" placeholder="Tucorreo@gmail.com"/>
                </div>
                <div class="input">
                    <p>Contrasena</p>
                    <input type="password" id="ingresoPassword" name="ingresoPassword"/>
                </div>
                <br/>
                <div class="enviar">
                    <button type="submit">Ingresar</button>
                </div>
            </form>
            </br>
        </div>
    </div>

    <?php 
	
		$ingreso = new ControlUsuario;
		$ingreso -> ctrlIngreso();
		
	?>

</main>