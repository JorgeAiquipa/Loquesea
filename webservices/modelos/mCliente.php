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
			$url = "acá pones la url";
            $fields = array(
                            'razon' => urlencode($eCliente->getRazon()),
                            'ruc' => urlencode($eCliente->getRuc()),
                            'direccion' => urlencode($eCliente->getDireccion()),
                            'telf' => urlencode($eCliente->getTelf())
                            );
                    $fields_string = "";
                    foreach($fields as $key=>$value) {
                        $fields_string .= $key.'='.$value.'&';
                    }
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_POST, count($fields));
            curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($ch);
            curl_close($ch);
		}
	}
?>
