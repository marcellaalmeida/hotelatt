<?php
    class HospedeDAO {
        public function create($hospede) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO hospede(nome,documento) 
                     VALUES (:n)"
                );
                $query->bindValue(':n',$hospede->getNome(), PDO::PARAM_STR);
                $query->bindValue(':d',$hospede->getDocumento(), PDO::PARAM_STR);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }

        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM hospede");
                

                if(!$query->execute())
                    print_r($query->errorInfo());

                $hospedes = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $hospede = new Hospede();
                    $hospede->setId($linha['id_hospede']);
                    $hospede->setNome($linha['nome']);
                    $hospede->setDocumento($linha['documento']);

                    array_push($hospedes,$hospede);
                }

                return $hospedes;
            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }

        public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM hospede WHERE id_hospede = :i");
                $query->bindValue(':i',$id, PDO::PARAM_INT);

                if(!$query->execute())
                    print_r($query->errorInfo());

                $linha = $query->fetch(PDO::FETCH_ASSOC);
                $hospede = new Hospede();
                $hospede->setId($linha['id_hospede']);
                $hospede->setNome($linha['nome']);
                $hospede->setDocumento($linha['documento']);

                return $hospede;
            }
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }

        public function update($hospede) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE hospede 
                     SET nome = :n, documento = :d
                     WHERE id_hospede = :i"
                );
                $query->bindValue(':n',$hospede->getNome(), PDO::PARAM_STR);
                $query->bindValue(':d',$hospede->getDocumento(), PDO::PARAM_STR);
                $query->bindValue(':i',$hospede->getId(), PDO::PARAM_STR);

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
                    "DELETE FROM hospede 
                     WHERE id_hospede = :i"
                );
                $query->bindValue(':i',$id, PDO::PARAM_INT);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #5: " . $e->getMessage();
            }
        }
    }