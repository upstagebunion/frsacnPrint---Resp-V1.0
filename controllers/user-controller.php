<?php

	class ControlUsuario{
	
		/*REGISTRO*/

		static public function ctrlRegistro(){

			if(isset($_POST["ingresoUsuario"]) && strlen($_POST["ingresoUsuario"]) >= 8 && strlen($_POST["ingresoUsuario"]) <= 30 ){
				if(isset($_POST["ingresoEmail"]) && strlen($_POST["ingresoEmail"]) >= 8 && strpos($_POST["ingresoEmail"],"@") != false){
					if(isset($_POST["ingresoPassword"]) && strlen($_POST["ingresoPassword"]) >= 7){
						if($_POST["ingresoPassword"] == $_POST["confirmPassword"]){
							$item = "email";
							$tabla = "registros";
							$emailExist = UserModel::mdlObtenerRegistro($tabla,$item,$_POST["ingresoEmail"],null,null);

							if(empty($emailExist) || count($emailExist) == 0){
								$tabla = "registros";
								$datos = array("usuario" => $_POST["ingresoUsuario"],"email" => $_POST["ingresoEmail"], "password" => $_POST["ingresoPassword"]);

								$respuesta =  UserModel::mdlRegistro($tabla, $datos);

								return $respuesta;
							}else{
								return "Ese correo electrónico ya está registrado";
							}
						}else{
							return "Las contrasenas no coinciden";
						}
					}else{
						return "Inserte alguna contrasena (Min. 7 Caracteres)";
					}
				}else{
					return "Inserte un correo valido";
				}
			}else{
				return "Rellene el campo de Usuario (Debe tener de 8 a 30 Caracteres)";
			}
		
		}

		/*Obtener Imagenes*/
		static public function ctrlObtenerBusqueda($busqueda){
			$tabla = "productos";
			$item = "titulo";
			$value = $busqueda;
			$respuesta = FormularioModel::mdlObtenerVarRegistros($tabla, $item, $value,null,null);

			return $respuesta;
		}

		/*Obtener Busqueda por titulo*/
		static public function ctrlObtenerBusquedaPag($busqueda, $limit1, $limit2){
			$tabla = "productos";
			$item = "titulo";
			$value = $busqueda;
			$respuesta = UserModel::mdlObtenerVarRegistros($tabla, $item, $value, $limit1, $limit2);

			return $respuesta;
		}
		/*Obtener busqueda por tag*/
		static public function ctrlObtenerBusquedaTag($busqueda, $limit1, $limit2){
			$tabla = "productos";
			$item = "tag";
			$value = $busqueda;
			$respuesta = UserModel::mdlObtenerVarRegistros($tabla, $item, $value, $limit1, $limit2);

			return $respuesta;
		}
		/*Obtener total de productos*/
		static public function ctrlObtenerRegistro(){
				$tabla = "productos";
				$respuesta = UserModel::mdlObtenerRegistro($tabla, null, null,null,null);

				return count($respuesta);
			
		}
		/*obtener todos los registros de la tabla asignada*/
		static public function ctrlObtenerRegistros($tabla){
				$respuesta = UserModel::mdlObtenerRegistro($tabla, null, null,null,null);

				return $respuesta;
			
		}

		static public function ctrlObtenerImagen($tabla, $item, $valor){
			$respuesta = FormularioModel::mdlObtenerRegistro($tabla, $item, $valor,null,null);

			return $respuesta;
		}

		/*Obtiene un solo post*/
		static public function ctrlObtenerPost($tabla, $item, $valor){
			$respuesta = UserModel::mdlObtenerPost($tabla, $item, $valor);

			return $respuesta;
		}

		/*Obtener todos los productos (muestrario)*/
		static public function ctrlObtRegPag($limit1,$limit2){
			$tabla = "productos";
			$respuesta = UserModel::mdlObtenerRegistro($tabla, null, null,$limit1,$limit2);

			return $respuesta;
		}

		/*Obtener Comentarios*/
		static public function ctrlObtenerComents($post_id){
			$tabla = "comentarios";
			$item = "post_id";
			$value = $post_id;
			$respuesta = FormularioModel::mdlObtenerVarComentarios($tabla, $item, $value);

			return $respuesta;
		}

		/*SUBIR PUBLICACIÓN*/

		static public function subirImagen(){
		
			if(isset($_POST["ingresoTitulo"]) && $_POST['ingresoTitulo'] != "" && strlen($_POST["ingresoTitulo"]) <= 60 ){
				if(isset($_SESSION["admin"]) && $_SESSION["admin"]== true){
						if(isset($_FILES["archivo"])){
							$nombreArchivo = $_FILES["archivo"]["name"];
							$nombreTemp =$_FILES["archivo"]["tmp_name"];
							$tipoArchivo =$_FILES["archivo"]["type"];
							$fileSize = $_FILES["archivo"]["size"];

							if($tipoArchivo == "image/jpeg" || $tipoArchivo == "image/png"){
								if($fileSize <= 3000000){
									$subida = UserModel::mdlSubirImagen($nombreTemp, $nombreArchivo);
								}else{
									return "El archivo es demasiado pesado (Máximo 3 Mb)";
								}
							}else{
								return "Formato de imagen no Valido";
							}
						}else{
							return "Seleccione un archivo";
						}


						if($subida == "ok"){
							$tabla = "productos";
							$ruta = "images/muestrario/".$nombreArchivo;
							$datos = array("titulo" => $_POST["ingresoTitulo"], "ruta" => $ruta, "autor_id" => $_SESSION["id"], "descripcion" => $_POST["descripcion"], "diseno" => $_POST["diseno"], "precio" => $_POST["ingresoPrecio"], "tipo" => $_POST["ingresoTipo"], "tag" => $_POST["ingresoTags"]);
							$respuesta =  UserModel::dbSubirImagen($tabla, $datos);
						}else{
							$respuesta = "No se pudo guardar el archivo";
						}

						return $respuesta;
				}else{
					return "Usted no es Administrador";
				}
			}else{
				return "Rellene el campo de Titulo (Max. 60 Caracteres)";
			}
		
		}

		/*INGRESAR*/

		public function ctrlIngreso(){
			if(isset($_POST["ingresoEmail"])){
				$tabla = "registros";
				$item = "email";
				$valor = $_POST["ingresoEmail"];
				$respuesta = UserModel::mdlObtenerUsPs($tabla, $item, $valor, $_POST["ingresoPassword"]);
				if($respuesta != null){
					if($respuesta["emailObt"] == $_POST["ingresoEmail"] && $respuesta["passwordObt"] == $respuesta["passwordIngresada"]){
                        
						$_SESSION["accesAllow"] = "ok";
						$_SESSION["id"] = $respuesta["id"];
						$_SESSION["user"] = $respuesta["usuario"];
						$_SESSION["pedidos"] = $respuesta["pedidos"];
						$_SESSION["likes"] = $respuesta["likes"];

						if($respuesta["admin"] == 1){
							$_SESSION["admin"] = true;
								echo '<div class="notificacion-verde"><p>Ingreso exitoso</p></div>';
								echo '<script>
									if(window.history.replaceState){
				
										window.history.replaceState(null, null, window.location.href);
				
									}
									window.location = "index.php?pag=main";
		
								</script>';
						}else{
							$_SESSION["admin"] = false;
							echo "<div class='notificacion'>Ingreso Exitoso</div>";
							echo '<script>
								if(window.history.replaceState){
				
									window.history.replaceState(null, null, window.location.href);
				
								}
								window.location = "index.php?pag=main";
		
							</script>';
						}
					}else{
						echo "<script>
							if(window.history.replaceState){
				
								window.history.replaceState(null, null, window.location.href);
				
							}
		
						</script>";
						echo '<div class="notificacion-roja"><p>El correo y la contrasena no coinciden</p></div>';
					}
				}else{
					echo "<script>
							if(window.history.replaceState){
				
								window.history.replaceState(null, null, window.location.href);
				
							}
		
						</script>";
						echo '<div class="notificacion-roja"><p>El correo no está registrado, debe registrarse primero</p></div>';
				}
			}
		}

		/*Editar*/
		static public function editImagen($id_actual){
		
			if(isset($_POST["ingresoTitulo"]) && $_POST['ingresoTitulo'] != "" && strlen($_POST["ingresoTitulo"]) <= 60 ){
				if(isset($_SESSION["admin"]) && $_SESSION["admin"]== true){
						if(!empty($_FILES["archivo"]['name'])){
							$nombreArchivo = $_FILES["archivo"]["name"];
							$nombreTemp =$_FILES["archivo"]["tmp_name"];
							$tipoArchivo =$_FILES["archivo"]["type"];
							$fileSize = $_FILES["archivo"]["size"];

							if($tipoArchivo == "image/jpeg" || $tipoArchivo == "image/png"){
								if($fileSize <= 3000000){
									$subida = UserModel::mdlSubirImagen($nombreTemp, $nombreArchivo);
								}else{
									return "El archivo es demasiado pesado (Máximo 3 Mb)";
								}
							}else{
								return "Formato de imagen no Valido";
							}
						}else{
							$subida = "sin-archivo";
						}


						if($subida == "ok"){
							$anterior = ControlUsuario::ctrlObtenerPost("productos", "id", $id_actual);
							$tabla = "productos";
							$ruta = "images/muestrario/".$nombreArchivo;
							$datos = array("titulo" => $_POST["ingresoTitulo"], "ruta" => $ruta, "autor_id" => $_SESSION["id"], "descripcion" => $_POST["descripcion"], "diseno" => $_POST["diseno"], "precio" => $_POST["ingresoPrecio"], "tipo" => $_POST["ingresoTipo"], "tag" => $_POST["ingresoTags"]);
							$respuesta =  UserModel::dbEditImagen($tabla, $datos, $id_actual);
							if($respuesta == 'ok'){
								unlink($anterior['ruta']);
							}
						}elseif($subida == "sin-archivo"){
							$tabla = "productos";
							$datos = array("titulo" => $_POST["ingresoTitulo"], "autor_id" => $_SESSION["id"], "descripcion" => $_POST["descripcion"], "diseno" => $_POST["diseno"], "precio" => $_POST["ingresoPrecio"], "tipo" => $_POST["ingresoTipo"], "tag" => $_POST["ingresoTags"]);
							$respuesta =  UserModel::dbEditImagen($tabla, $datos, $id_actual);
						}else{
							$respuesta = "No se pudo guardar el archivo";
						}

						return $respuesta;
				}else{
					return "Usted no es Administrador";
				}
			}else{
				return "Rellene el campo de Titulo (Max. 60 Caracteres)";
			}
		
		}

		static public function ctrlCambiarEstado(){
			if(isset($_SESSION['admin']) && $_SESSION['admin'] == true){
				if(isset($_POST['nVal']) && $_POST['nVal'] != null && $_POST['nVal'] != " "){
					$tabla = 'tipos';
					$datos = array('n_val' => $_POST['nVal'], 'id' => $_POST['id_mod'], 'valor' => 'valor');
					$respuesta =  UserModel::dbEditDato($tabla, $datos);
				}elseif(isset($_POST['nPorcent']) && $_POST['nPorcent'] != null && $_POST['nPorcent'] != " "){
					$tabla = 'descuentos';
					$datos = array('n_porcent' => $_POST['nPorcent'], 'id' => $_POST['id_mod'], 'valor' => 'porcentaje');
					$respuesta =  UserModel::dbEditDato($tabla, $datos);
				}else{
					$respuesta = 'No hay nada';
				}
			}else{
				$respuesta = 'Usted no es administrador';
			}

			return $respuesta;
		}

		static public function ctrlAgregar(){
			if(isset($_SESSION['admin']) && $_SESSION['admin'] == true){
				if(isset($_POST['nuevo']) && $_POST['nuevo'] != null && $_POST['nuevo'] != " "){
					$tabla = 'tipos';
					$respuesta =  UserModel::dbAddDato($tabla, $_POST['nuevo']);
				}elseif(isset($_POST['nuevoPorcentaje'])){
					$tabla = 'descuentos';
					$datos = array('n_porcent' => $_POST['nuevoPorcentaje'], 'tipo' => $_POST['ingresoTipo']);
					$respuesta =  UserModel::dbAddDato($tabla, $datos);
				}else{
					$respuesta = 'No hay nada';
				}
			}else{
				$respuesta = 'Usted no es administrador';
			}

			return $respuesta;
		}

		static public function ctrlEliminar($tabla){
			if(isset($_SESSION['admin']) && $_SESSION['admin'] == true){
				if(isset($_POST['id_elim'])){
					$respuesta =  UserModel::dbElimDato($tabla, $_POST['id_elim']);
				}else{
					$respuesta = 'No hay nada';
				}
			}else{
				$respuesta = 'Usted no es administrador';
			}

			return $respuesta;
		}
	}


?>