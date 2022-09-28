<?php

class AdresseManager
{
    private $connexion;

    public function __construct($connexion)
    {
        $this->connexion = $connexion;
    }

    /*private function getConnexionDb()
    {
        $connexion =

        return $connexion;
    }
*/
    public function create(Adresse $adresse)
    {
        $stmt = $this->connexion->prepare(
            'INSERT INTO adresse (rue, numero, localite, codepostal, pays)
                VALUES (:rue, :numero, :localite, :codepostal, :pays)'
           );

        $stmt->bindValue(':rue', $adresse->getRue());
        $stmt->bindValue(':numero', $adresse->getNumero(), PDO::PARAM_INT);
        $stmt->bindValue(':localite', $adresse->getLocalite());
        $stmt->bindValue(':codepostal', $adresse->getCodepostal(), PDO::PARAM_INT);
        $stmt->bindValue(':pays', $adresse->getPays());
        //$stmt->bindValue(':id', $adresse->getId(), PDO::PARAM_INT);

        $stmt->execute();
    }

    public function read($id)
    {
        $id = (int)$id;

        $query = $this->getConnexionDb()->query(
            'SELECT rue, numero, localite, codepostal, pays ' .
            'FROM adresse WHERE id = ' . $id);

        $datas = $query->fetch(PDO :: FETCH_ASSOC);

        return new Adresse($datas);
    }

    public function readAll(Adresse $adresse)
    {
        $adresse = array();

        $query = $this->getConnexionDb()->query(
            'SELECT rue, numero, localite, codepostal, pays ' .
            'FROM adresse ORDER BY codepostal, localite');

        while ($datas = $query->fetch(PDO :: FETCH_ASSOC)) {
            $adresse [] = new Adresse($datas);
        }

        return $adresse;
    }

    public function update(Adresse $adresse)
    {
        $query = $this->getConnexionDb()->prepare(
            'UPDATE adresse SET ' .
            'rue=:rue,' .
            'numero=:numero,' .
            'localite=:localite,' .
            'codepostal=:codepostal, ' .
            'pays=:pays, ' .
            'WHERE id=:id'
        );

        $query->bindValue(':rue', $adresse->getRue());
        $query->bindValue(':numero', $adresse->getNumero(), PDO::PARAM_INT);
        $query->bindValue(':localite', $adresse->getLocalite());
        $query->bindValue(':codepostal', $adresse->getCodepostal(), PDO::PARAM_INT);
        $query->bindValue(':pays', $adresse->getPays());
        $query->bindValue(':id', $adresse->getId(), PDO::PARAM_INT);

        $query->execute();
    }

    public function delete(Adresse $adresse)
    {
        $this->getConnexionDb()->exec(
            'DELETE FROM adresse ' .
            'WHERE id = ' . $adresse->getId()
        );
    }

}

;
