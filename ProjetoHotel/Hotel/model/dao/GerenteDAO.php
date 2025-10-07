<?php
class GerenteDAO {
    public function create($Gerente) {
        try {
            $query = BD::getConexao()->prepare(
                "INSERT INTO gerente(id_gerente, nivel_acesso) 
                 VALUES (:id, :na,"
            );
            $query->bindValue(':id',$Gerente->getIdGerente(), PDO::PARAM_STR);
            $query->bindValue(':na',$Gerente->getNivelAcesso(), PDO::PARAM_STR);

            if(!$query->execute())
                print_r($query->errorInfo());
        }
        catch(PDOException $e) {
            echo "Erro #1: " . $e->getMessage();
        }
    }

    public function read() {
        try {
            $query = BD::getConexao()->prepare("SELECT * FROM gerente");
            

            if(!$query->execute())
                print_r($query->errorInfo());

            $Gerentes = array();
            foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                $Gerente = new Gerente();
                $Gerente->setIdGerente($linha['id_gerente']);
                $Gerente->setNivel_acesso($linha['nivel_acesso']);

                array_push($Gerentes, $Gerente);
            }

            return $Gerentes;
        }
        catch(PDOException $e) {
            echo "Erro #2: " . $e->getMessage();
        }
    }

    public function find($id) {
        try {
            $query = BD::getConexao()->prepare("SELECT * FROM Gerente WHERE id_gerente = :i");
            $query->bindValue(':i',$id, PDO::PARAM_INT);

            if(!$query->execute())
                print_r($query->errorInfo());

            $linha = $query->fetch(PDO::FETCH_ASSOC);
            $Gerente = new Gerente();
            $Gerente->setIdGerente($linha['id_gerente']);
            $Gerente->setNivelAcesso($linha['nivel_acesso']);

            return $Gerente;
        }
        catch(PDOException $e) {
            echo "Erro #3: " . $e->getMessage();
        }
    }

    public function update($Gerente) {
        try {
            $query = BD::getConexao()->prepare(
                "UPDATE Gerente 
                 SET nivel_acesso = :na
                 WHERE id_gerente = :id"
            );
            $query->bindValue(':na',$Gerente->getNivelAcesso(), PDO::PARAM_STR);
            $query->bindValue(':id',$Gerente->getIdGerente(), PDO::PARAM_STR);

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
                "DELETE FROM gerente 
                 WHERE id_gerente = :id"
            );
            $query->bindValue(':i',$id, PDO::PARAM_INT);

            if(!$query->execute())
                print_r($query->errorInfo());
        }
        catch(PDOException $e) {
            echo "Erro #5: " . $e->getMessage();
        }
    }

     // Método específico para buscar nível de acesso
    public function findNivelAcesso($id) {
        try {
            $query = BD::getConexao()->prepare("SELECT nivel_acesso FROM gerente WHERE id_gerente = :id");
            $query->bindValue(':id', $id, PDO::PARAM_INT);

            if(!$query->execute())
                print_r($query->errorInfo());

            $result = $query->fetch(PDO::FETCH_ASSOC);
            return $result['nivel_acesso'];
        }
        catch(PDOException $e) {
            echo "Erro #6: " . $e->getMessage();
        }

    }
}
?>