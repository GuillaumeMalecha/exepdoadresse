<?php


class Adresse
{

    private $rue;
    private $numero;
    private $localite;
    private $codepostal;
    private $pays;

    /**
     * @return mixed
     */
    public function getRue()
    {
        return $this->rue;
    }

    /**
     * @param mixed $rue
     */
    public function setRue($rue)
    {
        $this->rue = $rue;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getLocalite()
    {
        return $this->localite;
    }

    /**
     * @param mixed $localite
     */
    public function setLocalite($localite)
    {
        $this->localite = $localite;
    }

    /**
     * @return mixed
     */
    public function getCodepostal()
    {
        return $this->codepostal;
    }

    /**
     * @param mixed $codepostal
     */
    public function setCodepostal($codepostal)
    {
        $this->codepostal = $codepostal;
    }

    /**
     * @return mixed
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * @param mixed $pays
     */
    public function setPays($pays)
    {
        $this->pays = $pays;
    }

    public function getAdresseComplete()
    {
        return  $this->rue . " " . $this->numero . ", " . $this->codepostal . " " . $this->localite . " " . $this->pays;
    }

}



?>