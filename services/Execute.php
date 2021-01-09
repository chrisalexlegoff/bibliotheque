<?php
require_once "dao/BookDao.php";
require_once "dto/Book.php";
require_once "dao/CustomerDao.php";
require_once "dto/Customer.php";
require_once "dao/TakeDao.php";
require_once "dto/Take.php";


function emprunterLivre()
{
    $livreaEmprunter = new Book();
    $touslesLivres = new BookDao();
    $emprunteur = new Customer();
    $adherents = new CustomerDao();
    $nomLivre = readline("Veuilez saisir le titre du livre");
    $numeroClient = readline("Veuillez le numéro client");

    $touslesLivres->getAllBooks();
    foreach ($touslesLivres as $Livre_en_cours) {
        if ($Livre_en_cours['Titre'] == $nomLivre) {
            $livreaEmprunter->setTitle($Livre_en_cours['Titre']);
            $livreaEmprunter->setAuthor($Livre_en_cours['auteur']);
            $livreaEmprunter->setCopyNumber(intval($Livre_en_cours['Disponibles'] - 1));
            if ($livreaEmprunter->copyNumber < 0) {
                echo ("Nombre d'exemplaires insuffisants " . PHP_EOL);
                break;
            }
            $livreaEmprunter->setTaken(intval($Livre_en_cours['Empruntés'] + 1));
            $touslesLivres->saveBook($livreaEmprunter);
        }
    }
    $adherents->getAllCustomers();
    foreach ($adherents as $adherent) {
        if ($adherent['numeroCustomer'] == $numeroClient) {
            $emprunteur->books[] = $livreaEmprunter;
        }
    }
    $adherents->saveAllCustomers($adherent);
}


function reserverLivre()
{
    $livreaEmprunter = new Book();
    $touslesLivres = new BookDao();
    $emprunteur = new Customer();
    $adherents = new CustomerDao();
    $nomLivre = readline("Veuilez saisir le titre du livre");
    $numeroClient = readline("Veuillez le numéro client");

    $touslesLivres->getAllBooks();
    foreach ($touslesLivres as $Livre_en_cours) {
        if ($Livre_en_cours['Titre'] == $nomLivre) {
            $livreaEmprunter->setTitle($Livre_en_cours['Titre']);
            $livreaEmprunter->setAuthor($Livre_en_cours['auteur']);
            $livreaEmprunter->setCopyNumber(intval($Livre_en_cours['Disponibles'] - 1));
            if ($livreaEmprunter->copyNumber < 0) {
                echo ("Nombre d'exemplaires insuffisants " . PHP_EOL);
                break;
            }
            $livreaEmprunter->setReserved(intval($Livre_en_cours['Réservés'] + 1));
            $touslesLivres->saveBook($livreaEmprunter);
        }
    }
    // $emprunteur->numeroCustomer->getById($numeroClient);
    // $emprunteur->reserved[] = $livreaEmprunter;  
}


function retourLivre()
{
    $livreaRetourner = new Book();
    $touslesLivres = new BookDao();
    $emprunteur = new Customer();
    $adherents = new CustomerDao();
    $nomLivre = readline("Veuilez saisir le titre du livre");
    $numeroClient = readline("Veuillez le numéro client");

    $touslesLivres->getAllBooks();
    foreach ($touslesLivres as $Livre_en_cours) {
        if ($Livre_en_cours['Titre'] == $nomLivre) {
            $livreaRetourner->setTitle($Livre_en_cours['Titre']);
            $livreaRetourner->setAuthor($Livre_en_cours['auteur']);
            $livreaRetourner->setCopyNumber(intval($Livre_en_cours['Disponibles'] + 1));
            $livreaRetourner->setTaken(intval($Livre_en_cours['Empruntés'] - 1));
            if ($livreaRetourner->taken < 0) {
                $livreaRetourner->taken->setTaken(0);
                $livreaRetourner->reserved->setReserved($livreaRetourner['Réservés'] - 1);
                if ($livreaRetourner->reserved < 0) {
                    echo ("Nombre d'exemplaires insuffisants " . PHP_EOL);
                    break;
                }
            }
            $touslesLivres->saveBook($livreaRetourner);
        }
    }
    $adherents->getAllCustomers();
    foreach ($adherents as $adherent) {
        if ($adherent['numeroCustomer'] == $numeroClient) {
            foreach ($emprunteur->books as $livre_en_cours) {
                if ($livre_en_cours == $livreaRetourner) {
                    array_splice($emprunteur->books, 1);
                }
            }
        }
    }
    $adherents->saveAllCustomers($adherent);
}
