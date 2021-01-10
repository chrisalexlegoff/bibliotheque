<?php
require_once "../services/dao/StaffDao.php";
require_once "../services/dto/Staff.php";

if (!isset($_GET["id"])) {
    echo "<div> Erreur </div>";
} else {

    $idStaff = intval($_GET["id"]);
    $staffDao = new StaffDao();
    $staff = $staffDao->getByStaffId($idStaff);
    $_REQUEST["staff"] = $staff;
    require "../front/vues/AfficherStaffVue.php";

}
