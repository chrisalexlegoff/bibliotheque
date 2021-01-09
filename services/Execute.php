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
    $emprunteur = new Customer();
    $nomLivre = readline("Veuilez saisir le titre du livre");
    $numeroClient = readline("Veuillez le numéro client");

    $touslesLivres[] = getAllBooks();
    foreach ($touslesLivres as $Livre_en_cours) {
        if ($Livre_en_cours['Titre'] == $nomLivre) {
            $livreaEmprunter->setTitle($Livre_en_cours['Titre']);
            $livreaEmprunter->setAuthor($Livre_en_cours['auteur']);
            $livreaEmprunter->setCopyNumber(intval($Livre_en_cours['Disponibles'] - 1));
            $livreaEmprunter->setTaken(intval($Livre_en_cours['Empruntés'] - 1));
            saveBook($livreaEmprunter);
        }
    }
    $emprunteur->numeroCustomer->getById($numeroClient);
    $emprunteur->books[] = $livreaEmprunter;
    }

emprunterLivre();
