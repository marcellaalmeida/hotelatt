<?php
class ReservaDAO {
    public function create($Reserva) {
        try {
            $query = BD::getConexao()->prepare(
                "INSERT INTO reserva(data_checkin, data_checkout, quarto, hospede, funcionario, status, valor_total, funcionario_id_funcionario, hospede_id_hospede, quarto_idquarto) 
                 VALUES (:checkin, :checkout, :quarto, :hospede, :funcionario, :status, :valor_total, :funcionario_id, :hospede_id, :quarto_id)"
            );
            
            $query->bindValue(':checkin', $Reserva->getDataCheckin(), PDO::PARAM_STR);
            $query->bindValue(':checkout', $Reserva->getDataCheckout(), PDO::PARAM_STR);
            $query->bindValue(':quarto', $Reserva->getQuarto(), PDO::PARAM_INT);
            $query->bindValue(':hospede', $Reserva->getHospede(), PDO::PARAM_STR);
            $query->bindValue(':funcionario', $Reserva->getFuncionario(), PDO::PARAM_STR);
            $query->bindValue(':status', $Reserva->getStatus(), PDO::PARAM_STR);
            $query->bindValue(':valor_total', $Reserva->getValorTotal(), PDO::PARAM_STR);
            $query->bindValue(':funcionario_id', $Reserva->getFuncionarioIdFuncionario(), PDO::PARAM_INT);
            $query->bindValue(':hospede_id', $Reserva->getHospedeIdHospede(), PDO::PARAM_INT);
            $query->bindValue(':quarto_id', $Reserva->getQuartoIdquarto(), PDO::PARAM_INT);

            if(!$query->execute())
                print_r($query->errorInfo());
        }
        catch(PDOException $e) {
            echo "Erro #1: " . $e->getMessage();
        }
    }

    public function read() {
        try {
            $query = BD::getConexao()->prepare("SELECT * FROM reserva ORDER BY data_checkin DESC");
            
            if(!$query->execute())
                print_r($query->errorInfo());

            $Reservas = array();
            foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                $Reserva = new Reserva();
                $this->preencherReserva($Reserva, $linha);
                array_push($Reservas, $Reserva);
            }

            return $Reservas;
        }
        catch(PDOException $e) {
            echo "Erro #2: " . $e->getMessage();
        }
    }

    public function find($id) {
        try {
            $query = BD::getConexao()->prepare("SELECT * FROM reserva WHERE id_reserva = :id");
            $query->bindValue(':id', $id, PDO::PARAM_INT);

            if(!$query->execute())
                print_r($query->errorInfo());

            $linha = $query->fetch(PDO::FETCH_ASSOC);
            $Reserva = new Reserva();
            $this->preencherReserva($Reserva, $linha);

            return $Reserva;
        }
        catch(PDOException $e) {
            echo "Erro #3: " . $e->getMessage();
        }
    }

    public function update($Reserva) {
        try {
            $query = BD::getConexao()->prepare(
                "UPDATE reserva 
                 SET data_checkin = :checkin, data_checkout = :checkout, quarto = :quarto, 
                     hospede = :hospede, funcionario = :funcionario, status = :status, 
                     valor_total = :valor_total, funcionario_id_funcionario = :funcionario_id,
                     hospede_id_hospede = :hospede_id, quarto_idquarto = :quarto_id
                 WHERE id_reserva = :id"
            );
            
            $query->bindValue(':checkin', $Reserva->getDataCheckin(), PDO::PARAM_STR);
            $query->bindValue(':checkout', $Reserva->getDataCheckout(), PDO::PARAM_STR);
            $query->bindValue(':quarto', $Reserva->getQuarto(), PDO::PARAM_INT);
            $query->bindValue(':hospede', $Reserva->getHospede(), PDO::PARAM_STR);
            $query->bindValue(':funcionario', $Reserva->getFuncionario(), PDO::PARAM_STR);
            $query->bindValue(':status', $Reserva->getStatus(), PDO::PARAM_STR);
            $query->bindValue(':valor_total', $Reserva->getValorTotal(), PDO::PARAM_STR);
            $query->bindValue(':funcionario_id', $Reserva->getFuncionarioIdFuncionario(), PDO::PARAM_INT);
            $query->bindValue(':hospede_id', $Reserva->getHospedeIdHospede(), PDO::PARAM_INT);
            $query->bindValue(':quarto_id', $Reserva->getQuartoIdquarto(), PDO::PARAM_INT);
            $query->bindValue(':id', $Reserva->getIdReserva(), PDO::PARAM_INT);

            if(!$query->execute())
                print_r($query->errorInfo());
        }
        catch(PDOException $e) {
            echo "Erro #4: " . $e->getMessage();
        }
    }

    public function destroy($id) {
        try {
            $query = BD::getConexao()->prepare("DELETE FROM reserva WHERE id_reserva = :id");
            $query->bindValue(':id', $id, PDO::PARAM_INT);

            if(!$query->execute())
                print_r($query->errorInfo());
        }
        catch(PDOException $e) {
            echo "Erro #5: " . $e->getMessage();
        }
    }

    // Métodos específicos para Reserva
    public function findByStatus($status) {
        try {
            $query = BD::getConexao()->prepare("SELECT * FROM reserva WHERE status = :status ORDER BY data_checkin");
            $query->bindValue(':status', $status, PDO::PARAM_STR);

            if(!$query->execute())
                print_r($query->errorInfo());

            $Reservas = array();
            foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                $Reserva = new Reserva();
                $this->preencherReserva($Reserva, $linha);
                array_push($Reservas, $Reserva);
            }

            return $Reservas;
        }
        catch(PDOException $e) {
            echo "Erro #6: " . $e->getMessage();
        }
    }

    public function findAtivas() {
        return $this->findByStatus('Ativa');
    }

    public function findPendentes() {
        return $this->findByStatus('Pendente');
    }

    // Método auxiliar para preencher objeto Reserva
    private function preencherReserva($Reserva, $linha) {
        $Reserva->setIdReserva($linha['id_reserva']);
        $Reserva->setDataCheckin($linha['data_checkin']);
        $Reserva->setDataCheckout($linha['data_checkout']);
        $Reserva->setQuarto($linha['quarto']);
        $Reserva->setHospede($linha['hospede']);
        $Reserva->setFuncionario($linha['funcionario']);
        $Reserva->setStatus($linha['status']);
        $Reserva->setValorTotal($linha['valor_total']);
        $Reserva->setFuncionarioIdFuncionario($linha['funcionario_id_funcionario']);
        $Reserva->setHospedeIdHospede($linha['hospede_id_hospede']);
        $Reserva->setQuartoIdquarto($linha['quarto_idquarto']);
    }
}
?>