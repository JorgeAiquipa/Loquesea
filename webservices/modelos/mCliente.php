<?php
	require_once("../entidades/eCliente.php");

	class Clientes {

		public function validaciones($eCliente){
			$validar = "ok";
			$emailregex = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
			
			if($eCliente->getRazon() == ''){
				$validar = "Ingrese la razón social";
			} elseif($eCliente->getRuc() == ''){
				$validar = "Ingrese el RUC";
			} elseif($eCliente->getDireccion() == ''){
				$validar = "Ingrese la dirección";
			}
			
			return $validar;
		}

		public function grabar($eCliente){
			$url = "http://localhost:4325/ClienteREST.svc/Clientes";
            $fields = array(
                            'Razonsocial' => $eCliente->getRazon(),
                            'Ruc' => $eCliente->getRuc(),
                            'Direccion' => $eCliente->getDireccion(),
                            'Telefono' => $eCliente->getTelf()
                            );
            $data_json = json_encode($fields);
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            
            curl_setopt($ch,CURLOPT_POSTFIELDS, $data_json);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($ch);
            curl_close($ch);
            return $result;
		}

		public function listarClientes(){
           $url = "http://localhost:4325/ClienteREST.svc/GetAllClientes/";
           $ch = curl_init();
           curl_setopt($ch, CURLOPT_URL, $url);
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
           $result  = curl_exec($ch);
           curl_close($ch);
           return $result;
		}

		public function borrarDatos($id){
           $url = "http://localhost:4325/ClienteREST.svc/Clientes/".$id;
           $ch = curl_init();
           curl_setopt($ch, CURLOPT_URL, $url);
           curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
           $result  = curl_exec($ch);
           curl_close($ch);
           return $result;
		}

        public function cargarDatos($id){		
			$url = "http://localhost:4325/ClienteREST.svc/Clientes/".$id;
		    $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $result  = curl_exec($ch);
            curl_close($ch);
            return $result;	
		}		

        public function actualizar($eCliente){
			$url = "http://localhost:4325/ClienteREST.svc/Clientes";
            $fields = array(
                            'Razonsocial' => $eCliente->getRazon(),
                            'Ruc' => $eCliente->getRuc(),
                            'Direccion' => $eCliente->getDireccion(),
                            'Telefono' => $eCliente->getTelf()
                            );
            $data_json = json_encode($fields);
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_json)));
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($ch);
            curl_close($ch);
            return $result;
		}

	}
?>
