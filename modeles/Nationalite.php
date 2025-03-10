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
     * Set numero du nationalite
     *
     * @param  int  $num  numero du nationalite
     *
     * @return  self
     */ 
    public function setNum(int $num)
    {
        $this->num = $num;

        return $this;
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
     * renvoi l'objet continent associé
     * 
     * @return Continent
     */ 
    public function getNumContinent() : Continent
    {
        return Continent::findById($this->numContinent);
    }

    /**
     * ecrit le num continent
     *
     * @param Continent $continent
     * @return self
     */
    public function setNumContinent(Continent $continent) : self
    {
        $this->numContinent = $continent->getNum();

        return $this;
    }

            /**
         * renvoie l'objet continent associé
         *
         * @return Continent
         */
        public function getContinent() : Continent
        {
            return Continent::findById($this->numContinent);
        }

        /**
         * Set the value of numContinent
         *
         * @return  self
         */ 
        public function setContinent(Continent $continent) :self
        {
                $this->numContinent = $continent->getNum();
                return $this;
        }
    /**
     * Retourne l'ensemble des nationalite
     *
     * @return Nationalite[] tableau d'objet nationalite
     */
    public static function findAll(?string $libelle="", ?string $continent="Tous") :array{
        $texteReq= "select n.num as 'numero', n.libelle as 'libNation', c.libelle as 'libContinent'  from nationalite n, continent c where n.numContinent=c.num";
            if( $libelle != "") { 
                $texteReq.= " and n.libelle like '%" .$libelle."%'";
            }
            if( $continent != "Tous") {
                 $texteReq.= " and c.num =" .$continent;
            }
            $texteReq.=" order by n.libelle;";
        $req=MonPdo::getInstance()->prepare($texteReq);
        $req->setFetchMode(PDO::FETCH_OBJ);
        $req->execute();
        $lesResultats=$req->fetchAll();
        return $lesResultats;
    }

    /**
     * Trouve une nationalite par son nom
     *
     * @param integer $id numérode nationalite
     * @return Continent objet nationalite trouve
     */
    public static function findById(int $id) :Nationalite{

        $req=MonPdo::getInstance()->prepare("Select * from nationalite where num= :id");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Nationalite');
        $req->bindParam(':id',$id);
        $req->execute();
        $lesResultats=$req->fetch();
        return $lesResultats;
    }

    /**
     * Permet d'ajouter une nationalite
     *
     * @param Nationalite $nationalite nationalite à ajouter
     * @return integer resultat (1 si l'opération a réussi, 0 sinon)
     */
    public static function add(Nationalite $nationalite) :int{

        $req=MonPdo::getInstance()->prepare("insert into nationalite(libelle,numContinent) values(:libelle, :numContinent)");
        $req->bindParam(':libelle', $nationalite->getLibelle());
        $req->bindParam(':numContinent', $nationalite->numContinent);
        $nb=$req->execute();
        return $nb;
    }

    /**
     * permet de modifier une nationalite
     *
     * @param Nationalite $nationalite nationalite a modifier
     * @return integer resultat (1 si l'opération a réussi, 0 sinon)
     */
    public static function update(Nationalite $nationalite) :int{

        $req=MonPdo::getInstance()->prepare("update nationalite set libelle= :libelle, numContinent= :numContinent where num= :id");
        $req->bindParam(':id', $nationalite->getNum());
        $req->bindParam(':libelle', $nationalite->getLibelle());
        $req->bindParam(':numContinent', $nationalite->numContinent);
        $nb=$req->execute();
        return $nb;
    }

    /**
     * Permet de supprimer une nationalite
     *
     * @param Nationalite $nationalite
     * @return integer 
     */
    public static function delete(Nationalite $nationalite) :int{
        $req=MonPdo::getInstance()->prepare("delete from nationalite where num= :id");
        $req->bindParam(':id', $nationalite->getNum());
        $nb=$req->execute();
        return $nb;
    }
}
?>
