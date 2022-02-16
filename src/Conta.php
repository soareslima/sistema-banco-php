<?php

//Class
class Conta
{

    //Atributos
    public string $cpfTitular;
    public string $snomeTitular;
    public float $saldo = 0;


    /**
     * @param float $valorSaque
     */
    public function sacar(float $valorSaque): void
    {

        if ($valorSaque > $this->saldo) {
            echo "Valor indisponível";
            return;
        }
        $this->saldo -= $valorSaque;
    }


    /**
     * @param float $deposito
     */
    public function depositar(float $deposito): void
    {
        if ($deposito < 0) {
            echo "O valor precisa ser positivo";
            return;
        }
        $this->saldo += $deposito;
    }


    /**
     * @param float $valorATransferir
     * @param Conta $contaDestino
     */
    public function transferir(float $valorATransferir, Conta $contaDestino): void
    {
        if ($valorATransferir > $this->saldo) {
            echo "Saldo indisponível";
            return;
        }
        $this->sacar($valorATransferir);
        $contaDestino->depositar($valorATransferir);
    }
}
