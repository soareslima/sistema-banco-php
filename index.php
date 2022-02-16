<?php

// Mostra o erros existentes no código Php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'src/Conta.php';

$contaUm = new Conta();
$contaDois = new Conta();
$contaUm->depositar(500);
$contaUm->transferir(200, $contaDois);

$contaDois->saldo -= 500;


//Debug
var_dump($contaUm);

var_dump($contaDois);
