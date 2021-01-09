<?php 
require_once "../services/dao/StaffDao.php";
require_once "../services/dto/Staff.php";
require_once "../helpers/DateHelper.php";

$newStaff = new Staff();
$newStaff->setNom($_POST["nom"]);
$newStaff->setPrenom($_POST["prenom"]);
$newStaff->setEmail($_POST["email"]);

$staffDao = new StaffDao();
$staff = $staffDao->saveStaff($newStaff);
header("location: http://localhost/Git\github\bibliotheque_germaine_remi_christophe/front/ListeStaff.php");
?>
