<?php
    class ReservaDAO {
        public function create($reserva) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO reserva(data_checkin, data_checkout, quarto, hospede, funcionario, status, valor_total, funcionario_id_funcionario, hospede_id_hospede, quarto_idquarto) 
                     VALUES (:checkin, :checkout, :q, :h, :f, :s, :vt, :fid, :hid, :qid)"
                );
                $query->bindValue(':checkin', $reserva->getDataCheckin(), PDO::PARAM_STR);
                $query->bindValue(':checkout', $reserva->getDataCheckout(), PDO::PARAM_STR);
                $query->bindValue(':q', $reserva->getQuarto(), PDO::PARAM_INT);
                $query->bindValue(':h', $reserva->getHospede(), PDO::PARAM_STR);
                $query->bindValue(':f', $reserva->getFuncionario(), PDO::PARAM_STR);
                $query->bindValue(':s', $reserva->getStatus(), PDO::PARAM_STR);
                $query->bindValue(':vt', $reserva->getValorTotal(), PDO::PARAM_STR);
                $query->bindValue(':fid', $reserva->getFuncionarioIdFuncionario(), PDO::PARAM_INT);
                $query->bindValue(':hid', $reserva->getHospedeIdHospede(), PDO::PARAM_INT);
                $query->bindValue(':qid', $reserva->getQuartoIdquarto(), PDO::PARAM_INT);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }

        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM reserva");
                

                if(!$query->execute())
                    print_r($query->errorInfo());

                $reservas = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $reserva = new Reserva();
                    $reserva->setIdReserva($linha['id_reserva']);
                    $reserva->setDataCheckin($linha['data_checkin']);
                    $reserva->setDataCheckout($linha['data_checkout']);
                    $reserva->setQuarto($linha['quarto']);
                    $reserva->setHospede($linha['hospede']);
                    $reserva->setFuncionario($linha['funcionario']);
                    $reserva->setStatus($linha['status']);
                    $reserva->setValorTotal($linha['valor_total']);
                    $reserva->setFuncionarioIdFuncionario($linha['funcionario_id_funcionario']);
                    $reserva->setHospedeIdHospede($linha['hospede_id_hospede']);
                    $reserva->setQuartoIdquarto($linha['quarto_idquarto']);

                    array_push($reservas, $reserva);
                }

                return $reservas;
            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }

        public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM reserva WHERE id_reserva = :i");
                $query->bindValue(':i', $id, PDO::PARAM_INT);

                if(!$query->execute())
                    print_r($query->errorInfo());

                $linha = $query->fetch(PDO::FETCH_ASSOC);
                $reserva = new Reserva();
                $reserva->setIdReserva($linha['id_reserva']);
                $reserva->setDataCheckin($linha['data_checkin']);
                $reserva->setDataCheckout($linha['data_checkout']);
                $reserva->setQuarto($linha['quarto']);
                $reserva->setHospede($linha['hospede']);
                $reserva->setFuncionario($linha['funcionario']);
                $reserva->setStatus($linha['status']);
                $reserva->setValorTotal($linha['valor_total']);
                $reserva->setFuncionarioIdFuncionario($linha['funcionario_id_funcionario']);
                $reserva->setHospedeIdHospede($linha['hospede_id_hospede']);
                $reserva->setQuartoIdquarto($linha['quarto_idquarto']);

                return $reserva;
            }
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }

        public function update($reserva) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE reserva 
                     SET data_checkin = :checkin, data_checkout = :checkout, quarto = :q, hospede = :h, funcionario = :f, status = :s, valor_total = :vt, funcionario_id_funcionario = :fid, hospede_id_hospede = :hid, quarto_idquarto = :qid 
                     WHERE id_reserva = :i"
                );
                $query->bindValue(':checkin', $reserva->getDataCheckin(), PDO::PARAM_STR);
                $query->bindValue(':checkout', $reserva->getDataCheckout(), PDO::PARAM_STR);
                $query->bindValue(':q', $reserva->getQuarto(), PDO::PARAM_INT);
                $query->bindValue(':h', $reserva->getHospede(), PDO::PARAM_STR);
                $query->bindValue(':f', $reserva->getFuncionario(), PDO::PARAM_STR);
                $query->bindValue(':s', $reserva->getStatus(), PDO::PARAM_STR);
                $query->bindValue(':vt', $reserva->getValorTotal(), PDO::PARAM_STR);
                $query->bindValue(':fid', $reserva->getFuncionarioIdFuncionario(), PDO::PARAM_INT);
                $query->bindValue(':hid', $reserva->getHospedeIdHospede(), PDO::PARAM_INT);
                $query->bindValue(':qid', $reserva->getQuartoIdquarto(), PDO::PARAM_INT);
                $query->bindValue(':i', $reserva->getIdReserva(), PDO::PARAM_INT);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #4: " . $e->getMessage();
            }
        }

        public function destroy($id) {
            try {
                $query = BD::getConexao()->prepare(
                    "DELETE FROM reserva 
                     WHERE id_reserva = :i"
                );
                $query->bindValue(':i', $id, PDO::PARAM_INT);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #5: " . $e->getMessage();
            }
        }
    }
?>