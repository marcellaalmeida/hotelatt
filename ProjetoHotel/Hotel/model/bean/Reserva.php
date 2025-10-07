<?php
    class Reserva {
        // Atributos
        private $id_reserva;
        private $data_checkin;
        private $data_checkout;
        private $quarto;
        private $hospede;
        private $funcionario;
        private $status;
        private $valor_total;
        private $funcionario_id_funcionario;
        private $hospede_id_hospede;
        private $quarto_idquarto;

        // Métodos
        public function getIdReserva() {
            return $this->id_reserva;
        }

        public function setIdReserva($id_reserva) {
            $this->id_reserva = $id_reserva;
        }

        public function getDataCheckin() {
            return $this->data_checkin;
        }

        public function setDataCheckin($data_checkin) {
            $this->data_checkin = $data_checkin;
        }

        public function getDataCheckout() {
            return $this->data_checkout;
        }

        public function setDataCheckout($data_checkout) {
            $this->data_checkout = $data_checkout;
        }

        public function getQuarto() {
            return $this->quarto;
        }

        public function setQuarto($quarto) {
            $this->quarto = $quarto;
        }

        public function getHospede() {
            return $this->hospede;
        }

        public function setHospede($hospede) {
            $this->hospede = $hospede;
        }

        public function getFuncionario() {
            return $this->funcionario;
        }

        public function setFuncionario($funcionario) {
            $this->funcionario = $funcionario;
        }

        public function getStatus() {
            return $this->status;
        }

        public function setStatus($status) {
            $this->status = $status;
        }

        public function getValorTotal() {
            return $this->valor_total;
        }

        public function setValorTotal($valor_total) {
            $this->valor_total = $valor_total;
        }

        public function getFuncionarioIdFuncionario() {
            return $this->funcionario_id_funcionario;
        }

        public function setFuncionarioIdFuncionario($funcionario_id_funcionario) {
            $this->funcionario_id_funcionario = $funcionario_id_funcionario;
        }

        public function getHospedeIdHospede() {
            return $this->hospede_id_hospede;
        }

        public function setHospedeIdHospede($hospede_id_hospede) {
            $this->hospede_id_hospede = $hospede_id_hospede;
        }

        public function getQuartoIdquarto() {
            return $this->quarto_idquarto;
        }

        public function setQuartoIdquarto($quarto_idquarto) {
            $this->quarto_idquarto = $quarto_idquarto;
        }

        // Método para retornar uma string do objeto
        public function __toString() {
            return "Reserva #" . $this->id_reserva . " - " . $this->hospede;
        }
    }
?>