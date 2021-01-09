<?php
require_once "../services/dao/CustomerDao.php";
require_once "../services/dto/Customer.php";

if (!isset($_GET["id"])) {
    echo "<div> Erreur </div>";
} else {

    $idCustomer = intval($_GET["id"]);
    $customerDao = new CustomerDao();
    $customer = $customerDao->getCustomerById($idCustomer);
    $_REQUEST["customer"] = $customer;
    require "../front/vues/AfficherCustomerVue.php";

}
