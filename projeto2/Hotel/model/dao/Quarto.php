<?php
    class QuartoDAO {
        public function create($quarto) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO quarto(numero, tipo, preco, status) 
                     VALUES (:n, :t, :p, :s)"
                );
                $query->bindValue(':n', $quarto->getNumero(), PDO::PARAM_INT);
                $query->bindValue(':t', $quarto->getTipo(), PDO::PARAM_STR);
                $query->bindValue(':p', $quarto->getPreco(), PDO::PARAM_STR);
                $query->bindValue(':s', $quarto->getStatus(), PDO::PARAM_STR);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }

        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM quarto");
                

                if(!$query->execute())
                    print_r($query->errorInfo());

                $quartos = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $quarto = new Quarto();
                    $quarto->setIdquarto($linha['idquarto']);
                    $quarto->setNumero($linha['numero']);
                    $quarto->setTipo($linha['tipo']);
                    $quarto->setPreco($linha['preco']);
                    $quarto->setStatus($linha['status']);

                    array_push($quartos, $quarto);
                }

                return $quartos;
            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }

        public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM quarto WHERE idquarto = :i");
                $query->bindValue(':i', $id, PDO::PARAM_INT);

                if(!$query->execute())
                    print_r($query->errorInfo());

                $linha = $query->fetch(PDO::FETCH_ASSOC);
                $quarto = new Quarto();
                $quarto->setIdquarto($linha['idquarto']);
                $quarto->setNumero($linha['numero']);
                $quarto->setTipo($linha['tipo']);
                $quarto->setPreco($linha['preco']);
                $quarto->setStatus($linha['status']);

                return $quarto;
            }
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }

        public function update($quarto) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE quarto 
                     SET numero = :n, tipo = :t, preco = :p, status = :s 
                     WHERE idquarto = :i"
                );
                $query->bindValue(':n', $quarto->getNumero(), PDO::PARAM_INT);
                $query->bindValue(':t', $quarto->getTipo(), PDO::PARAM_STR);
                $query->bindValue(':p', $quarto->getPreco(), PDO::PARAM_STR);
                $query->bindValue(':s', $quarto->getStatus(), PDO::PARAM_STR);
                $query->bindValue(':i', $quarto->getIdquarto(), PDO::PARAM_INT);

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
                    "DELETE FROM quarto 
                     WHERE idquarto = :i"
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