<?php

require '../Services/Dao/CustomerDao.php';
require '../services/dao/StaffDao.php';

if (!empty($_POST)) {
    if (!empty($_POST['identifiant']) && !empty($_POST['password'])) {
        if ($_POST['statut'] === 'staff') {
            $user = new StaffDao;
            $verifUserStaffs = $user->getAllStaff();
            foreach ($verifUserStaffs as $verifuserStaff) {
                if ($verifuserStaff['numeroStaff'] === $_POST['identifiant']) {
                    if ($verifuserStaff['password'] != md5($_POST['password'])) {
                        echo 'Mauvais password !';
                    } elseif ($verifuserStaff['password'] === md5($_POST['password'])) {
                        session_start();

                        $_SESSION['statut'] == 'staff';

                        header("location: accueilStaff.php");

                        exit();
                    } 
                } else {
                    echo 'identifiant ou mot de passe incorrect!';
                }
            }
        } elseif ($_POST['statut'] === 'customer') {

            $user = new CustomerDao;
            $verifUserCustomers = $user->getAllCustomers();
            foreach ($verifUserCustomers as $verifuserCustomer) {
                if ($verifuserCustomer['numeroCustomer'] === $_POST['identifiant']) {
                    if ($verifuserCustomer['password'] != md5($_POST['password'])) {
                        echo 'Mauvais password !';
                    } elseif ($verifuserCustomer['password'] === md5($_POST['password'])) {
                        session_start();
                        $_SESSION['statut'] = 'customer';

                        header('location: accueilCustomer.php');
                        exit();
                    }
                } else {
                    echo 'identifiant ou mot de passe incorrect!';
                }
            }
        } else {
            echo 'Veuillez choisir un statut !';
        }
    } else {
        echo 'Veuillez inscrire vos identifiants svp !';
    }
} else {
    echo 'Veuillez inscrire vos identifiants svp !';
}
