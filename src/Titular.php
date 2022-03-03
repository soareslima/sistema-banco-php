<?php

class Titular
{
    private $cpf;
    private $nome;

    /**
     * @param CPF $cpf
     * @param string $nome
     */
    public function __construct(CPF $cpf, string $nome)
    {
        $this->cpf = $cpf;
        $this->validaNomeTitular($nome);
        $this->nome = $nome;
    }

    /**
     * @return string
     */
    public function recuperaCpf(): string
    {
        return $this->cpf->recuperaNumero();
    }

    /**
     * @return string
     */
    public function recuperaNome(): string
    {
        return $this->nome;
    }

    /**
     * @param string $nomeTitular
     * @return void
     */
    private function validaNomeTitular(string $nomeTitular)
    {
        if (strlen($nomeTitular) < 5) {
            echo "Nome precisa ter pelo menos 5 caracteres";
            exit();
        }
    }
}
