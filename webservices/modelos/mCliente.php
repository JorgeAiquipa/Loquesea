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
    }
?>
