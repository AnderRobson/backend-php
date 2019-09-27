<?php
    namespace Moovin\Job\Backend\Model;

    class Conta
    {
        private $numeroConta;
        private $tipoDeConta = "Corrente";
        private $saldo = 500;

        public function __construct()
        {

        }

        public function __destruct()
        {

        }

        public function __GET($atributo)
        {
            return $this->$atributo;
        }

        public function __SET($atributo, $valor)
        {
            $this->$atributo = $valor;
        }

        public function __toString()
        {
            return nl2br("Conta: $this->agencia - $this->numeracao
                          Tipo de conta $this->tipoDeConta
                          Saldo: $this->saldo <br>");
        }
    }