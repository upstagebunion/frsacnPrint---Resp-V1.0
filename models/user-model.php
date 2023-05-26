<?php

	require_once "conexion.php";
	require_once "crypt.php";

	class UserModel{
	
		/*Registro*/

		static public function mdlRegistro($tabla, $datos){
			$encPass = Crypt::encrypt($datos["password"], "mastodonte");

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario, email, password) VALUES (:usuario, :email, :password)");

			$stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
			$stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
			$stmt -> bindParam(":password", $encPass, PDO::PARAM_STR);

			if($stmt -> execute()){
				return "ok";
			}else{
				print_r(Conexion::conectar()->errorInfo());
			}
			$stmt -> close();
			$stmt = null;
		}


		/*Obtener Busqueda*/
		static public function mdlObtenerVarRegistros($tabla, $item, $valor, $limit1, $limit2){
			if($limit1 == null && $limit2 == null){
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item LIKE '%$valor%' ORDER BY id DESC");
				$stmt -> execute();
				return $stmt -> fetchAll();	
			}else{
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item LIKE '%$valor%' ORDER BY id DESC LIMIT $limit1,$limit2 ");
				$stmt -> execute();
				return $stmt -> fetchAll();	
			}
		}

		/*Obtener Comentarios*/
		static public function mdlObtenerVarComentarios($tabla, $item, $valor){
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = $valor ORDER BY idcoment DESC");
				$stmt -> execute();
				return $stmt -> fetchAll();	
		}

		/*Obtener Imagenes*/
		static public function mdlObtenerRegistro($tabla, $item, $valor, $limit1, $limit2){
			if($item == null && $valor == null && $limit1 == null && $limit2 == null){
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");
				$stmt -> execute();
				return $stmt -> fetchAll();	
			}/*Obtener item de tabla*/elseif($limit1 == null && $limit2 == null){
				$stmt = Conexion::conectar()->prepare("SELECT $item FROM $tabla WHERE $item = :$item");
				$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
				$stmt -> execute();
				return $stmt -> fetch();
			}else{
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC LIMIT $limit1,$limit2");
				$stmt -> execute();
				return $stmt -> fetchAll();	
			}

			$stmt -> close();
			$stmt = null;
		}

		/*Ingresar*/
		static public function mdlObtenerUsPs($tabla,$item,$valor,$passwordIng){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			$data = $stmt -> fetch();
				if($data != null){
					$datos = array("emailObt" => $data["email"], "passwordObt" => $data["password"], "passwordIngresada" => Crypt::encrypt( $passwordIng, "mastodonte"), "usuario" => $data["usuario"], "id" => $data["id"], "admin" => $data["admin"], "pedidos" => $data["pedidos"], "likes" =>["likes"]);
				}else{
					$datos = null;
				}
			return $datos;
		}

		static public function mdlObtenerPost($tabla,$item,$valor){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			$datos = $stmt -> fetch();
			return $datos;
		}

		/*Sube Imagenes*/
		static public function mdlSubirImagen($temp, $nombre){
			if (move_uploaded_file($temp,"images/muestrario/".$nombre)){
				return "ok";
			}
		}

		/*Subir Imagen Base de Datos*/
		static public function dbSubirImagen($tabla, $datos){
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(autor_id, titulo, diseno, descripcion, precio, ruta, id_tipo, tag) VALUES (:autor_id, :titulo, :diseno, :descripcion, :precio, :ruta, :id_tipo, :tag)");
			
			$stmt -> bindParam(":autor_id", $datos["autor_id"], PDO::PARAM_STR);
			$stmt -> bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
			$stmt -> bindParam(":diseno", $datos["diseno"], PDO::PARAM_STR);
			$stmt -> bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
			$stmt -> bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
			$stmt -> bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
			$stmt -> bindParam(":id_tipo", $datos["tipo"], PDO::PARAM_STR);
			$stmt -> bindParam(":tag", $datos["tag"], PDO::PARAM_STR);

			if($stmt -> execute()){
				return "ok";
			}else{
				print_r(Conexion::conectar()->errorInfo());
			}
			$stmt -> close();
			$stmt = null;
		}

		 /*Editar Imagen Base de Datos*/
		static public function dbEditImagen($tabla, $datos, $id_actual){
			if(!isset($datos['ruta']) || $datos['ruta'] == null){
				$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET autor_id = :autor_id, titulo = :titulo, diseno = :diseno, descripcion = :descripcion, precio = :precio, id_tipo = :id_tipo, tag = :tag WHERE id = $id_actual");

				$stmt -> bindParam(":autor_id", $datos["autor_id"], PDO::PARAM_STR);
				$stmt -> bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
				$stmt -> bindParam(":diseno", $datos["diseno"], PDO::PARAM_STR);
				$stmt -> bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
				$stmt -> bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
				$stmt -> bindParam(":id_tipo", $datos["tipo"], PDO::PARAM_STR);
				$stmt -> bindParam(":tag", $datos["tag"], PDO::PARAM_STR);
			}else{
				$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET autor_id = :autor_id, titulo = :titulo, diseno = :diseno, descripcion = :descripcion, precio = :precio, ruta = :ruta, id_tipo = :id_tipo, tag = :tag WHERE id = $id_actual");

				$stmt -> bindParam(":autor_id", $datos["autor_id"], PDO::PARAM_STR);
				$stmt -> bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
				$stmt -> bindParam(":diseno", $datos["diseno"], PDO::PARAM_STR);
				$stmt -> bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
				$stmt -> bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
				$stmt -> bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
				$stmt -> bindParam(":id_tipo", $datos["tipo"], PDO::PARAM_STR);
				$stmt -> bindParam(":tag", $datos["tag"], PDO::PARAM_STR);
			}
			if($stmt -> execute()){
				return "ok";
			}else{
				print_r(Conexion::conectar()->errorInfo());
			}
			$stmt -> close();
			$stmt = null;
		}

		/*Editar dato en DB*/
		static public function dbEditDato($tabla, $datos){
			
			if(isset($datos['n_val'])){
				$valor = $datos['valor'] ;
				$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $valor = :n_val WHERE id = :id");
				$stmt -> bindParam(":n_val", $datos["n_val"], PDO::PARAM_STR);
				$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_STR);

				if($stmt -> execute()){
				return "ok";
				}else{
					print_r(Conexion::conectar()->errorInfo());
				}
				$stmt -> close();
				$stmt = null;
			}elseif(isset($datos['n_porcent']) && isset($datos['valor'])){
				$valor = $datos['valor'] ;
				$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $valor = :n_val WHERE id = :id");
				$stmt -> bindParam(":n_val", $datos["n_porcent"], PDO::PARAM_STR);
				$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_STR);

				if($stmt -> execute()){
				return "ok";
				}else{
					print_r(Conexion::conectar()->errorInfo());
				}
				$stmt -> close();
				$stmt = null;
			}

		}

		/*Agregar Dato en DB*/
		static public function dbAddDato($tabla, $datos){
			if(isset($datos['tipo'])){
				$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_tipo, porcentaje) VALUES ( :id , :nuevo)");
				$stmt -> bindParam(":id", $datos['tipo'], PDO::PARAM_STR);
				$stmt -> bindParam(":nuevo", $datos['n_porcent'], PDO::PARAM_STR);
			}else{
				$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (valor) VALUES (:nuevo)");
				$stmt -> bindParam(":nuevo", $datos, PDO::PARAM_STR);
			}
			if($stmt -> execute()){
				return "ok";
			}else{
				print_r(Conexion::conectar()->errorInfo());
			}
			$stmt -> close();
			$stmt = null;
		}

		/*Elim Dato en DB*/
		static public function dbElimDato($tabla, $datos){
			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

			$stmt -> bindParam(":id", $datos, PDO::PARAM_STR);

			if($stmt -> execute()){
				return "ok";
			}else{
				print_r(Conexion::conectar()->errorInfo());
			}
			$stmt -> close();
			$stmt = null;
		}
	}

?>