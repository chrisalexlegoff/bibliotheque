<?php
require_once "../services/dao/BookDao.php";
require_once "../services/dto/Book.php";

if (!isset($_GET["id"])) {
    echo "<div> Erreur </div>";
} else {

    $idBook = intval($_GET["id"]);
    $bookDao = new BookDao();
    $book = $bookDao->getBookById($idBook);
    $_REQUEST["book"] = $book;
    require "../front/vues/AfficherBookVue.php";

}
