<?php
require_once "../services/dao/BookDao.php";
require_once "../services/dto/Book.php";
var_dump($_GET);
if (!isset($_GET["id"])) {
    echo "<div> Erreur </div>";
} else {

    $idBook = intval($_GET["id"]);
    $bookDao = new BookDao();
    $book = $bookDao->getBookById($idBook);
    $_REQUEST["book"] = $book;
    require "../front/vues/AfficherBookVue.php";
//     var_dump($_REQUEST);
// var_dump($_GET);
//     header("location: AfficherBook.php?id". $book['id']);

}
