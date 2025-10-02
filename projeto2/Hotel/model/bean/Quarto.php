<?php
    class Quarto {
        // Atributos
        private $idquarto;
        private $numero;
        private $tipo;
        private $preco;
        private $status;

        // Métodos
        public function getIdquarto() {
            return $this->idquarto;
        }

        public function setIdquarto($idquarto) {
            $this->idquarto = $idquarto;
        }

        public function getNumero() {
            return $this->numero;
        }

        public function setNumero($numero) {
            $this->numero = $numero;
        }

        public function getTipo() {
            return $this->tipo;
        }

        public function setTipo($tipo) {
            $this->tipo = $tipo;
        }

        public function getPreco() {
            return $this->preco;
        }

        public function setPreco($preco) {
            $this->preco = $preco;
        }

        public function getStatus() {
            return $this->status;
        }

        public function setStatus($status) {
            $this->status = $status;
        }

        // Método para retornar uma string do objeto
        public function __toString() {
            return "Quarto #" . $this->numero . " - " . $this->tipo;
        }
    }
?>