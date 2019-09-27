<?php
    include_once "vendor/autoload.php";
    
    use Moovin\Job\Backend\Model\Conta as Conta;

    $conta = new Conta();
    $contaTransferencia = new Conta();

    use Moovin\Job\Backend\Model\CaixaEletronico as CaixaEletronico;
    $caixaEletronico = new CaixaEletronico();
    $saque = 200;
    echo $contaTransferencia->saldo = $contaTransferencia->saldo + $caixaEletronico->Transferencia($saque);

    echo "<br>" . $conta->saldo;
    echo "<br>" . $contaTransferencia->saldo;