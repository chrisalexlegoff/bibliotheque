<?php 
require_once "../services/dao/BookDao.php";
require_once "../services/dao/CustomerDao.php";
require_once "../services/dto/Book.php";
require_once "../services/dto/Customer.php";
require_once "../helpers/DateHelper.php";


$livreaEmprunter = new Book();
    $touslesLivres = new BookDao();
    $emprunteur = new Customer();
    $adherents = new CustomerDao();
    // $nomLivre = $_POST['titre'];
    // $numeroAdherent = $_POST['numeroCustomer'];
    $nomLivre = 'Livre1';
    $numeroAdherent = 'ADH000003';

    $tousLesLivresActuels = $touslesLivres->getAllBooks();
    foreach ($tousLesLivresActuels as $Livre_en_cours) {
        if ($Livre_en_cours['titre'] == $nomLivre) {
            $livreaEmprunter->setTitle($Livre_en_cours['titre']);
            $livreaEmprunter->setAuthor($Livre_en_cours['auteur']);
            $livreaEmprunter->setCopyNumber(intval($Livre_en_cours['disponibles'] - 1));
            if ($livreaEmprunter->getCopyNumber() < 0) {
                echo ("Nombre d'exemplaires insuffisants " . PHP_EOL);
                break;
            }
            $livreaEmprunter->setTaken(intval($Livre_en_cours['empruntes'] + 1));
            $touslesLivres->modifyBookTaken($livreaEmprunter);
        }
    }
    $adherentEnCours = $adherents->getAllCustomers();
    foreach ($adherentEnCours as $index => $adherent) {
        if ($adherent['numeroCustomer'] == $numeroAdherent) {
            $adherentEnCours[$index]['empruntes'] = (intval($adherentEnCours[$index]['empruntes'] + 1));
        }
    }
    $adherents->saveAllCustomers($adherentEnCours);
    // header("location: ListeBook.php");
    header("location: AfficherBook.php?id=". $Livre_en_cours['id']);