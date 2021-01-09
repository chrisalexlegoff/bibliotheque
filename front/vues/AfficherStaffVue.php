<?php
require_once "../services/dto/Staff.php";
var_dump($_REQUEST);
if (!isset($_REQUEST["staff"])) {
    echo "<div> Erreur </div>";
} else {
    $staff = $_REQUEST["staff"];

?>
    <div>
        <h2>Satff : </h2>
        <ul>
            <li> id : <?php echo $staff["id"]; ?></li>
            <li> Numéro : <?php echo $staff["numeroStaff"]; ?></li>
            <li> Nom : <?php echo  $staff["nom"]; ?></li>
            <li> Prenom : <?php echo  $staff["prenom"]; ?></li>
            <li> Email : <?php echo $staff["email"]; ?></li>
        </ul>
    </div>
<?php } ?>