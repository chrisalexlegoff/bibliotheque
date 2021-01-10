<?php 
require_once "../services/dao/StaffDao.php";
require_once "../services/dto/Staff.php";
require_once "../helpers/DateHelper.php";

$newStaff = new Staff();
$newStaff->setNom($_POST["nom"]);
$newStaff->setPrenom($_POST["prenom"]);
$newStaff->setEmail($_POST["email"]);
$newStaff->setStatut($_POST["statut"]);
$newStaff->setPassword(md5($_POST["password"]));

$staffDao = new StaffDao();
$staff = $staffDao->saveStaff($newStaff);
header("location: ListeStaff.php");
?>
