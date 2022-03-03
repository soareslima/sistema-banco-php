<?php

class Conta
{
    private $titular;
    private $saldo;
    private static $numeroDeContas = 0;

    /**
     * @param Titular $titular
     */
    public function __construct(Titular $titular)
    {
        $this->titular = $titular;
        $this->saldo = 0;

        self::$numeroDeContas++;
    }

    public function __destruct()
    {
        self::$numeroDeContas--;
    }

    /**
     * @param float $valorASacar
     * @return void
     */
    public function saca(float $valorASacar): void
    {
        if ($valorASacar > $this->saldo) {
            echo "Saldo indisponível";
            return;
        }

        $this->saldo -= $valorASacar;
    }

    /**
     * @param float $valorADepositar
     * @return void
     */
    public function deposita(float $valorADepositar): void
    {
        if ($valorADepositar < 0) {
            echo "Valor precisa ser positivo";
            return;
        }

        $this->saldo += $valorADepositar;
    }

    /**
     * @param float $valorATransferir
     * @param Conta $contaDestino
     * @return void
     */
    public function transfere(float $valorATransferir, Conta $contaDestino): void
    {
        if ($valorATransferir > $this->saldo) {
            echo "Saldo indisponível";
            return;
        }

        $this->saca($valorATransferir);
        $contaDestino->deposita($valorATransferir);
    }

    /**
     * @return float
     */
    public function recuperaSaldo(): float
    {
        return $this->saldo;
    }

    /**
     * @return string
     */
    public function recuperaNomeTitular(): string
    {
        return $this->titular->recuperaNome();
    }

    /**
     * @return string
     */
    public function recuperaCpfTitular(): string
    {
        return $this->titular->recuperaCpf();
    }

    /**
     * @return int
     */
    public static function recuperaNumeroDeContas(): int
    {
        return self::$numeroDeContas;
    }
}
