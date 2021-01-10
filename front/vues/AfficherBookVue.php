<?php
require_once "../services/dto/Book.php";
var_dump($_REQUEST);
if (!isset($_REQUEST["book"])) {
    echo "<div> Erreur </div>";
} else {
    $book = $_REQUEST["book"];

?>
    <div>
        <h2>Book : </h2>
        <ul>
            <li> id : <?php echo $book["id"]; ?></li>
            <li> Numéro : <?php echo $book["numeroLivre"]; ?></li>
            <li> Titre : <?php echo  $book["titre"]; ?></li>
            <li> Auteur : <?php echo  $book["auteur"]; ?></li>
            <li> Disponible(s) : <?php echo $book["disponibles"]; ?></li>
            <li> Réservé(s) : <?php echo $book["reserves"]; ?></li>
            <li> Emprunté(s) : <?php echo $book["empruntes"]; ?></li>
        </ul>
    </div>
<?php } ?>