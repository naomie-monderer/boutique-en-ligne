<?php
require_once('../controllers/AdminController.php');
require_once('include/header.php');
?>
<main>
    <section>
        <h1>Espace Administratif</h1>
            <article>
                    <article>
                        <h2>Gestion des utilisateurs</h2>
                        <form action="" method="get">
                            <input type="submit" name="display_user" value="Afficher les utilisateurs">
                        </form>

                    </article>
                    <article>
                        <h2>Gestion des articles</h2>
                        <form action="" method="get">
                            <input type="submit" name="display_article" value="Ajouter des articles"></br>
                            <input type="submit" name="display_select_list" value="Générer des listes pour spécifier vos articles">
                            <input type="submit" name="manage_articles" value="Gérer les articles">
                            <input type="submit" name="manage_specificities" value="Gérer les specificités des articles">
                        </form>
                       
                    </article>    
            </article>
         
</main>
<?php
/* This button allow the admin to display modify and delete these users*/
if(isset($_GET['display_user']))
{ 
    header('location: admin_user.php');
} 
/* This button allow the admin to register articles*/
if(isset($_GET['display_article']))
{
    header('location: admin_article.php');
}
/* This button allow the admin to register articles*/
if(isset($_GET['display_select_list']))
{
    header('location: admin_other_forms.php');
}
if(isset($_GET['manage_articles']))
{
    header('location: admin_manage_articles.php');
}
if(isset($_GET['manage_specificities']))
{
    header('location: admin_manage_other_forms.php');
}

?>