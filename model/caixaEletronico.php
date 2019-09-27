<?php
    namespace Moovin\Job\Backend\Model;

    use Moovin\Job\Backend\Model\Conta as Conta;

    class CaixaEletronico
    {
        
        public function __construct()
        {
            
        }

        public function saque($numeroConta, $valor)
        {
            if (!is_numeric($valor) || $valor < 0) {
                return "Valor incorreto!";
            }

            if ($numeroConta->tipoDeConta == "Corrente" || $numeroConta->tipoDeConta == "Poupança") {
                if ($numeroConta->tipoDeConta == "Corrente") {
                    if ($valor > 600.00) {
                        return "Limite de saque por transação é de B$ 600,00";
                    }
                    $taxa = 2.50;
                } else {
                    if ($valor > 1000.00) {
                        return "Limite de saque por transação é de B$ 1.000,00";
                    }
                    $taxa = 0.80;
                }
            } else {
                return "Tipo de conta invalida!";
            }            

            $saque = $valor + $taxa;
            if($saque > $numeroConta->saldo) {
                $disponivelSaque = $numeroConta->saldo - $taxa;
                return "Você não tem saldo suficiente para fazer o saque desse valor, valor disponivel para saque é B$ " . $disponivelSaque;
            }

            $numeroConta->saldo = $numeroConta->saldo - ($valor + $taxa);
            return 'Novo saldo:' . $numeroConta->saldo;
        }

        public function deposito($numeroConta, $valor)
        {
            if (!is_numeric($valor)|| $valor < 0) {
                return "Valor incorreto!";
            }
            $numeroConta->saldo = $numeroConta->saldo + $valor; 
            return $numeroConta->saldo;
        }

        public function transferencia($numeroConta, $valor, $numeroContaTransferencia)
        {
            if (!is_numeric($valor)) {
                return "Valor incorreto!";
            }

            if($valor > $numeroConta->saldo) {
                return "Você não tem saldo suficiente para fazer a trnasferencia desse valor, valor disponivel para transfencia é B$ " . $conta->saldo;
            }

            $numeroConta->saldo = $numeroConta->saldo - $valor;
            $numeroContaTransferencia->saldo = $numeroContaTransferencia->saldo + $valor;
            return "Transferencia feita com sucesso!";
        }
    }