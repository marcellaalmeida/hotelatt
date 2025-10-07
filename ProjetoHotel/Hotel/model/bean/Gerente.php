<?php
class Gerente extends Funcionario {
    // Atributos
    private $nivelAcesso;

    // Métodos
    public function getNivelAcesso() {
        return $this->nivelAcesso;
    }

    public function setNivelAcesso($nivelAcesso) {
        $this->nivelAcesso = $nivelAcesso;
    }

    // Método para retornar uma string do objeto
    public function __toString() {
        return $this->getNome();
    }
}
?>