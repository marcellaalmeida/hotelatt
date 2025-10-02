<?php
class Hospede {
    //Atributos
    private $id_hospede;
    private $nome;
    private $documento;

    //Métodos
    public function getIdHospede() {
        return $this->id_hospede;
    }

    public function setIdHospede($id_hospede) {
        $this->id_hospede = $id_hospede;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getDocumento() {
        return $this->documento;
    }

    public function setDocumento($documento) {
        $this->documento = $documento;
    }

    //Método para retornar uma string do objeto
    public function __toString() {
        return $this->nome;
    }
}
?>