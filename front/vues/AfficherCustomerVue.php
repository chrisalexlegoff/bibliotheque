<?php
require_once "../services/dto/Customer.php";
var_dump($_REQUEST);
if (!isset($_REQUEST["customer"])) {
    echo "<div> Erreur </div>";
} else {
    $customer = $_REQUEST["customer"];

?>
    <div>
        <h2>Customer : </h2>
        <ul>
            <li> id : <?php echo $customer["id"]; ?></li>
            <li> Numéro : <?php echo $customer["numeroCustomer"]; ?></li>
            <li> Nom : <?php echo  $customer["nom"]; ?></li>
            <li> Prenom : <?php echo  $customer["prenom"]; ?></li>
            <li> Email : <?php echo $customer["email"]; ?></li>
        </ul>
    </div>
<?php } ?>