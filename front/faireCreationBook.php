<?php 
require_once "../services/dao/BookDao.php";
require_once "../services/dto/Book.php";
require_once "../helpers/DateHelper.php";

$newBook = new Book();
$newBook->setTitle($_POST["titre"]);
$newBook->setAuthor($_POST["auteur"]);
$newBook->setCopyNumber($_POST["nombre"]);

$bookDao = new BookDao();
$book = $bookDao->saveBook($newBook);
header("location: ListeBook.php");
?>
