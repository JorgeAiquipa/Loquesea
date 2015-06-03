<?php
	require_once("../modelos/conex.php");
	
	class Usuarios {
		private $conn;
		private $conn2;

		public function validarPwd($actual, $nuevo, $repetir){
			session_start();
			$error = "ok";
			$this->conn2 = Conexion::abrir2();
			$sql = "SELECT * FROM sec_users WHERE login=? AND pswd=?";
			$stmt = $this->conn2->prepare($sql);
			$stmt->bindParam(1, $_SESSION['usr_login']);
			$stmt->bindParam(2, md5($actual));
			$stmt->execute();
			if($actual == ''){
				$error = "Ingrese la contraseña actual";
			} elseif($stmt->rowCount() == 0){
				$error = "Contraseña actual incorrecta";
			} elseif($nuevo == ''){
				$error = "Ingrese la contraseña nueva";
			} elseif($repetir == ''){
				$error = "Repita la contraseña nueva";
			} elseif($repetir != $nuevo){
				$error = "Las contraseñas nuevas no coinciden";
			}
			return $error;
		}

		public function login($usuario, $pwd){
			$error = "ok";
			$this->conn2 = Conexion::abrir2();
			$sql = "SELECT * FROM sec_users WHERE login=? AND pswd=?";
			$stmt = $this->conn2->prepare($sql);
			$stmt->bindParam(1, $usuario);
			$stmt->bindParam(2, $pwd);
			$stmt->execute();
			if($stmt->rowCount() == 0){
				$error = "error";
			} elseif($stmt->rowCount() == 1){
				$row = $stmt->fetch();
				session_start();
				$_SESSION['usr_login'] = $row['login'];
			}
			$this->conn2 = NULL;
			return $error;
		}

		public function cargarPermisos($usuario){
			$permisos = array();
			$this->conn2 = Conexion::abrir2();
			$sqlOpciones = "SELECT 
					(CASE WHEN ug.group_id=1 THEN 'all' ELSE a.app_name END) AS PERMISOS
					FROM sec_users u INNER JOIN sec_users_groups ug ON(u.login=ug.login)
					LEFT OUTER JOIN sec_groups_apps a ON(ug.group_id=a.group_id)
					WHERE u.login=?";
			$stmt = $this->conn2->prepare($sqlOpciones);
			$stmt->bindParam(1, $usuario);
			$stmt->execute();
			$this->conn2 = NULL;
			while($row = $stmt->fetch()){
				if($row['PERMISOS'] != 'all'){
					array_push($permisos, $row['PERMISOS']);
					$_SESSION['permisos'] = $permisos;
				} else {
					unset($permisos);
					$permisos = 'all';
					$_SESSION['permisos'] = $permisos;
				}
			}						
			return $permisos;
		}

		public function grabarPwd($usuario, $pwd){
			$this->conn = Conexion::abrir();
			$sql = "UPDATE sec_users SET pswd=? WHERE login=?";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(1, $pwd);
			$stmt->bindParam(2, $usuario);
			$stmt->execute();
			$this->conn = NULL;
		}
	}
?>
