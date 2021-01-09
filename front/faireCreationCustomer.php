<?php 
require_once "../services/dao/CustomerDao.php";
require_once "../services/dto/Customer.php";
require_once "../helpers/DateHelper.php";

$newCustomer = new Customer();
$newCustomer->setNom($_POST["nom"]);
$newCustomer->setPrenom($_POST["prenom"]);
$newCustomer->setEmail($_POST["email"]);

$customerDao = new CustomerDao();
$customer = $customerDao->saveCustomer($newCustomer);
header("location: http://localhost/Git\github\bibliotheque_germaine_remi_christophe/front/ListeCustomer.php");
?>
