<?php 
class Nationalite{

    /**
     * numero du nationalite
     *
     * @var int
     */
    private $num;

    /**
     * libelle du nationalite
     *
     * @var string
     */
    private $libelle;

    /**
     * numero du continent
     *
     * @var int
     */
    private $numContinent;


    /**
     * Get the value of num
     */ 
    public function getNum()
    {
    return $this->num;
    }

    /**
     * lit le libelle
     */ 
    public function getLibelle() : string
    {
    return $this->libelle;
    }

    /**
     * ecrit dans le libelle
     *
     * @return  self
     */ 
    public function setLibelle(string $libelle) : self
    {
    $this->libelle = $libelle;

    return $this;
    }

        /**
     * Get the value of numContinent
     */ 
    public function getNumContinent()
    {
        return $this->numContinent;
    }

    /**
     * Set the value of numContinent
     *
     * @return  self
     */ 
    public function setNumContinent($numContinent)
    {
        $this->numContinent = $numContinent;

        return $this;
    }

    /**
     * Retourne l'ensemble des continents
     *
     * @return continent[] tableau d'objet continent
     */
    public static function findAll() :array{

        $req=MonPdo::getInstance()->prepare("Select * from continent");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Continent');
        $req->execute();
        $lesResultats=$req->fetchAll();
        return $lesResultats;
    }

    /**
     * Trouve un continent par son nom
     *
     * @param integer $id numérode continent
     * @return Continent objet continent trouve
     */
    public static function findById(int $id) :Continent{

        $req=MonPdo::getInstance()->prepare("Select * from continent where num= :id");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Continent');
        $req->blindParam(':id',$id);
        $req->execute();
        $lesResultats=$req->fetch();
        return $lesResultats;
    }

    /**
     * Permet d'ajouter un continent
     *
     * @param Continent $continent continent à ajouter
     * @return integer resultat (1 si l'opération a réussi, 0 sinon)
     */
    public static function add(Continent $continent) :int{

        $req=MonPdo::getInstance()->prepare("insert into continent(libelle) values(:libelle)");
        $req->blindParam(':id', $continent->getLibelle());
        $nb=$req->execute();
        return $nb;
    }

    /**
     * permet de modifier un continent
     *
     * @param Continent $continent continent a modifier
     * @return integer resultat (1 si l'opération a réussi, 0 sinon)
     */
    public static function update(Continent $continent) :int{

        $req=MonPdo::getInstance()->prepare("update continent set libelle= :libelle where num= :id");
        $req->blindParam(':id', $continent->getNum());
        $req->blindParam(':libelle', $continent->getLibelle());
        $nb=$req->execute();
        return $nb;
    }

    /**
     * Permet de supprimer un continent
     *
     * @param Continent $continent
     * @return integer
     */
    public static function delete(Continent $continent) :int{
        $req=MonPdo::getInstance()->prepare("delete from continent where num= :id");
        $req->blindParam(':id', $continent->getNum());
        $nb=$req->execute();
        return $nb;
    }


}
?>