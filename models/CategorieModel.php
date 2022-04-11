<?php
require_once("Model.php");
class CategorieModel extends Model {
    public function __construct(){

    }
    public function recuperationNoncategorie($id){
        $requette = $this->connect()->prepare("SELECT * FROM `categories` WHERE `id`=$id");
        $requette->execute();
        $resultat = $requette->fetch();
        return $resultat;

    }
    public function recuperationNonSouscategorie($id){
        $requette = $this->connect()->prepare("SELECT * FROM `souscategories` WHERE `id`=$id");
        $requette->execute();
        $resultat = $requette->fetch();
        return $resultat;

    }
    public function allcategorie(){
        $requette = $this->connect()->prepare("SELECT * FROM `categories`");
        $requette->execute();
        $resultat = $requette->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
        
    }

    public function insertCategorie($nom_categorie)
    {
        $requete = $this->connect()->prepare("INSERT INTO categories (nom_categorie) VALUES(:nom_categorie)");
        $resultat->execute(array(":nom_categorie" => $nom_categorie));
        return $resultat;
    }
    
        
    

}




?>