<?php

    class CuentaBancaria {
        private $numCuentaBancaria = "";
        protected $saldo = 0;
        public function __construct($numCuentaBancaria, $saldo) {
            $this-> set_CuentaBancaria($numCuentaBancaria);
            $this-> set_saldo($saldo);
        }

        public function get_CuentaBancaria() {
            return $this -> numCuentaBancaria;
        }
        public function set_CuentaBancaria($numCuentaBancaria) {
            $this -> numCuentaBancaria = $numCuentaBancaria;
        }
        public function get_saldo() {
            return $this -> saldo;
        }
        public function set_saldo($saldo) {
            $this -> saldo = $saldo;
        }

        public function ingresarDinero($cantidad) {
            $this -> saldo += $cantidad;  
            }
        public function sacarDinero($cantidad) {
            $this -> saldo -= $cantidad;
        }
                
        public function __toString(){
            return "Cuenta Bancaria " . $this -> numCuentaBancaria . "<br>" . "Saldo " . $this -> saldo . "<br>";
        }
    }

    class CuentaCorriente extends CuentaBancaria {
        private $porcentajeInteres = 0;
        public function get_porcentajeInteres() {
            return $this -> porcentajeInteres;
        }
        public function set_porcentajeInteres($porcentajeInteres) {
            return $this -> porcentajeInteres = $porcentajeInteres;
        }
        public function aplicarInteres() {
            return $this -> saldo + ($this -> saldo * $this-> porcentajeInteres/100);
        }
    }
    $persona = new CuentaCorriente(numCuentaBancaria: 01, saldo: 4000);
    $persona -> set_porcentajeInteres(10);
    echo "Saldo con interés: " . $persona->aplicarInteres() . "<br>";
    echo $persona;
        

