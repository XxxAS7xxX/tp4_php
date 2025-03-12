<?php

use PSpell\Config;

    class Auteur{
        /**
         * numero de l'auteur
         * @var int
         */
        private $num;

        /**
         * nom del'auteur
         * @var string
         */
        private $nom;


        /**
         *  prenom de l'auteur
         * @var string
         */
        private $prenom;


        /**
         * nationalite
         * @var string
         */
        private $numNationalite;



        //  GETSETTER DU NUM
        /**
         * Get numero de l'auteur
         *
         * @return  int
         */ 
        public function getNum()
        {
                return $this->num;
        }
        /**
         * Set numero de l'auteur
         *
         * @param  int  $num  numero de l'auteur
         *
         * @return  self
         */ 
        public function setNum(int $num)
        {
                $this->num = $num;

                return $this;
        }




        // GETSETTER DU NOM 
        /**
         * Get nom del'auteur
         *
         * @return  string
         */ 
        public function getNom()
        {
                return $this->nom;
        }
        /**
         * Set nom del'auteur
         *
         * @param  string  $nom  nom del'auteur
         *
         * @return  self
         */ 
        public function setNom(string $nom)
        {
                $this->nom = $nom;

                return $this;
        }

        //  GETSETTER DU PRENOM
        /**
         * Get prenom de l'auteur
         *
         * @return  string
         */ 
        public function getPrenom()
        {
                return $this->prenom;
        }
        /**
         * Set prenom de l'auteur
         *
         * @param  string  $prenom  prenom de l'auteur
         *
         * @return  self
         */ 
        public function setPrenom(string $prenom)
        {
                $this->prenom = $prenom;

                return $this;
        }




        // GETSETTER NATIONALITE
        /**
         * Get nationalite
         *
         * @return Nationalite
         */ 
        public function getNationalite(): Nationalite
        {       
                return Nationalite::findById($this->numNationalite); 
        }
        /**
         * Set nationalite
         *
         * @return  self
         */ 
        public function setNationalite(Nationalite $nationalite) :self
        {
                $this->numNationalite = $nationalite->getNum();
                return $this;
        }

                /**
         * Get nationalite
         *
         * @return  string
         */ 
        public function getNumNationalite()
        {
                return $this->numNationalite;
        }

        /**
         * Set nationalite
         *
         * @param  string  $numNationalite  nationalite
         *
         * @return  self
         */ 
        public function setNumNationalite(string $numNationalite)
        {
                $this->numNationalite = $numNationalite;

                return $this;
        }

        /**
         * retourne l'ensemble des auteurs
         *
         * @return Auteur[] tab d'objet auteur
         */
        public static function findAll() :array
        {
            $req=MonPdo::getInstance()->prepare("Select auteur.*, nationalite.libelle as libnation from auteur join nationalite on auteur.numNationalite=nationalite.num");
            $req->setFetchMode(PDO::FETCH_OBJ);
            $req->execute();
            $lesResultats=$req->fetchAll();
            return $lesResultats;
        }

        /**
         * Trouve un auteur par son nom
         *
         * @param integer $id numero du auteur
         * @return Auteur objet auteur trouvé
         */
        public static function findById(int $id) :Auteur
        {
            $req=MonPdo::getInstance()->prepare("Select * from auteur where num= :id");
            $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Auteur');
            $req->bindParam(':id',$id);
            $req->execute();
            $leResultat=$req->fetch();
            return $leResultat;
        }


        /**
         * Ajout d'un auteur
         *
         * @param Auteur $auteur auteur à ajouter
         * @return integer resultat (1 si l'operation a reussi, 0 sinon)
         */
        public static function add(Auteur $auteur): int
        {
            $req=MonPdo::getInstance()->prepare("insert into auteur(nom,prenom,numNationalite) values(:nom,:prenom,:numNationalite)");
            $nom=$auteur->getNom();
            $prenom=$auteur->getPrenom();
            $nationalite=$auteur->getNationalite()->getNum();
            $req->bindParam(':nom',$nom);
            $req->bindParam(':prenom', $prenom);
            $req->bindParam(':numNationalite', $nationalite);
            $nb=$req->execute();
            return $nb;
        }



        /**
         * modifier un auteur
         *
         * @param Auteur $auteur auteur à modifier
         * @return integer resultat (1 si l'operation a reussi, 0 sinon)
         */
        public static function update(Auteur $auteur): int
        {
                $req = MonPdo::getInstance()->prepare("UPDATE auteur SET nom = :nom, prenom = :prenom, numNationalite = :nationalite WHERE num = :num");

                $num = $auteur->getNum(); // ID de l'auteur
                $nom = $auteur->getNom();
                $prenom = $auteur->getPrenom();
                $nationalite = $auteur->getNationalite()->getNum(); // ID de la nationalité

                $req->bindParam(':num', $num);
                $req->bindParam(':nom', $nom);
                $req->bindParam(':prenom', $prenom);
                $req->bindParam(':nationalite', $nationalite);

                return $req->execute();
        }


        /**
         * Supprimer un auteur
         *
         * @param Auteur $auteur
         * @return integer
         */
        public static function delete(Auteur $auteur) :int
        {
            $req=MonPdo::getInstance()->prepare("delete from auteur where num= :id");
            $num=$auteur->getNum();
            $req->bindParam(':id',$num);
            $nb=$req->execute();
            return $nb;
        }
    }