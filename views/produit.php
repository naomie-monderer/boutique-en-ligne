<?php

//$route =  str_replace('views/produit.php','',$_SERVER['SCRIPT_FILENAME']);
require_once('../controllers/ProduitsController.php');
require_once('../controllers/CommentController.php');
require_once('include/header.php');


// Vérififier si le formulaire à bien été envoyé 
if(isset($_POST['submit']))
{
    require_once("../models/CommentModel.php");
    $id_utilisateur = $_SESSION['user'][0]['id'];

    //Vérifier si l'utilisateur est connecté 
    if(isset($id_utilisateur))
    {

        $commentaires = trim(htmlspecialchars($_POST['comment']));

        $commentaireModel = new CommentModel();
        $commentaireModel->insertCommentaire($commentaires, $id_utilisateur, $_GET['id']);

        header("Refresh:0");
    }
}

?>

<main>

    <section>
        <?php foreach($productById as $produit) : ?>

            <p>Titre :<?= $produit['nom'] ?></p>
            <p>Description :<?= $produit['description'] ?></p>
            
        <?php endforeach; ?>
    </section>

    <section>

        <h1>Commentaire</h1>
           
        <?php foreach($commentByIdProduit as $commentaire) : ?>

            <?php var_dump($commentaire['id_produit']); ?>

            <p>par <?= $commentaire['login'] ?> le <?=  date("d-m-Y à H:i", strtotime($commentaire['date'])) ?></p>
            <p><?= $commentaire['commentaire'] ?></p>

                <?php if((!empty($_SESSION)) && ($_SESSION['user'][0]['id'] == $commentaire['id_utilisateur'])) : ?>
                
                    <form action="../views/produit.php?id=<?= $commentaire['id_produit'] ?>" method="get">
                    
                        <input type="submit" name="delete" value="supprimer">
                        <input type="hidden" name="idHidden" value="<?=$commentaire['id'];?>">
                    </form>

                <?php endif; ?>

            <?php endforeach; ?>

            <form action="" method="post">
                <div>
                    <label for="textarea">Ecrivez votre commentaire :</label>
                    <input type="textarea" name="comment" id="comment">
                </div>

                <input type="submit" name="submit" value="valider">
            </form>
    </section>    
</main>

<?php
require_once("include/footer.php");
?> 