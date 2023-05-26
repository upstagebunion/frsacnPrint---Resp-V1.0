<?php

	if(!isset($_SESSION["accesAllow"])){
		echo '<script>window.location = "index.php?pag=registro";</script>';
		
		return;
	}else{
		if($_SESSION["accesAllow"] != "ok" || $_SESSION['admin'] != true){
			echo '<script>window.location = "index.php?pag=registro";</script>';
		
			return;
		}
	}

    $tipos = ControlUsuario::ctrlObtenerRegistros("tipos");
    $descuentos = ControlUsuario::ctrlObtenerRegistros("descuentos");
?>

<main class="main-inicio">
    <div class="mostrador">
        <h1 class="titulo">Editar publicación</h1>
        <div class="imagen">
            <img src="images/presentacion.png" />
        </div>

        <div class="tipos">
	        <div class="table">
		        <table>
                    <tr class ="titulo">
                    <th>Valor</th>
                    <th>Modificar</th>
                    </tr>
                    <?php foreach ($tipos as $key => $value): ?>
                        <tr>
                        <td><?php echo $value['valor']?></td>
                        <td><form method="post"><input type="hidden" name="id_mod" value="<?php echo $value['id'];?>"><input type="text" name="nVal"/><input type="submit" value="cambiar"/></form></td>
                        </tr>
                    <?php endforeach ?>
                </table> 
                <form method="post"><input type="text" name="nuevo"/><input type="submit" name="estado-send" value="Agregar"/></form>
	        </div>

            <div class="descuentos">
		        <table>
                    <tr class ="titulo">
                    <th>Productos</th>
                    <th>Porcentaje</th>
                    <th>Modificar</th>
                    </tr>
                    <?php foreach ($descuentos as $key => $value): ?>
                        <tr>
                        <td><?php $producto = ControlUsuario::ctrlObtenerPost('tipos', 'id', $value['id_tipo']); echo $producto['valor'];?></td>
                        <td><?php echo $value['porcentaje']?></td>
                        <td><form method="post"><input type="hidden" name="id_elim" value="<?php echo $value['id'];?>"/><input class ="eliminar" type="submit" name="eliminar" value="eliminar"/></form></td>
                        <td><form method="post"><input type="hidden" name="id_mod" value="<?php echo $value['id'];?>"><input type="text" name="nPorcent"/><input type="submit" value="cambiar"/></form></td>
                        </tr>
                    <?php endforeach ?>
                </table> 
                <form method="post">
                    <select id="ingresoTipo" name="ingresoTipo">
                        <?php foreach($tipos as $key => $value): ?>
					        <option value="<?php echo $value['id'];?>"><?php echo $value["valor"];?></option>
				        <?php endforeach ?>
                    </select>
                    <input type="number" name="nuevoPorcentaje" min="1" max="50"/>
                    <input type="submit" name="nuevoDescuento" value="Agregar"/>
                </form>
	        </div>
        </div>  
    </div>

    <?php 
        /*Esta linea se inserta para eliminar (retirada por seguridad)*/
        /*
            //PARTE PHP//
                 
        */
        $eliminado = ControlUsuario::ctrlEliminar('descuentos');
        $actualizado = ControlUsuario::ctrlCambiarEstado();
        $agregado = ControlUsuario::ctrlAgregar();

        if ($actualizado == 'ok' || $eliminado == 'ok' || $agregado == 'ok'){
            echo '<script>window.location = "index.php?pag=adm-desc";</script>';
		}
    ?>
</main>