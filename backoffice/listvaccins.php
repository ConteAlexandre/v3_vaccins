<?php include('../inc/fonction.php'); ?>
<?php include('../inc/pdo.php'); ?>

<!-- Requete pour appeler la table de la vaccination -->
<?php 
    $sql = "SELECT * FROM v3_vac_vaccins";
    $query = $pdo->prepare($sql);
    $query->execute();
    $listvaccins = $query->fetchAll();
    // debug($listvaccins);

?>

<?php include('inc/headerb.php'); ?>
<h1>Listing des vaccins</h1>
<p>Voici un listing de tout les vaccins figurant sur le site.</p>
<p>Si vous souhaitez ajouter un nouveau alors il vous suffit de <a href="newvaccins.php">Cliquez ici</a> </p>

<table>
    <tr>
        <td>Nom du vaccin</td>
        <td>Numéro de lot</td>
        <td>Catégorie</td>
        <td>Statuts</td>
        <td>Détail</td>
        <td>Modification</td>
    </tr>
    <?php 
        //boucle pour integrer nos données pour remplir notre liste 
        foreach ($listvaccins as $listvaccin) {
            echo('<tr><td>'.$listvaccin['nom'].'</td><td>'.$listvaccin['numerolot'].'</td><td>'.$listvaccin['categorie'].'</td><td>'.$listvaccin['statuts'].'</td><td><a href="detailvaccins.php?id='.$listvaccin['id'].'">Détail</a></td></tr>');
        }
    ?>
</table>





<?php include('inc/footerb.php'); ?>