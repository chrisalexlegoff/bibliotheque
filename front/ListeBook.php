<html>

<head>
    <!-- Font Awesome -->
    <link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/2.2.1/mdb.min.css" rel="stylesheet" />
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/2.2.1/mdb.min.js"></script>
</head>

<body>

    <div>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Navbar brand -->
                <a class="navbar-brand" href="#">Brand</a>

                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left links -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <!-- Navbar dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <!-- Dropdown menu -->
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                    <!-- Left links -->

                    <!-- Search form -->
                    <form class="d-flex input-group w-auto">
                        <input type="search" class="form-control" placeholder="Type query" aria-label="Search" />
                        <button class="btn btn-outline-primary" type="button" data-mdb-ripple-color="dark">
                            Search
                        </button>
                    </form>
                </div>
                <!-- Collapsible wrapper -->
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
    </div>
    <?php
    require_once "../services/dao/BookDao.php";
    require_once "../services/dto/Book.php";
    $bookDao = new BookDao();
    $books = $bookDao->getAllBooks();
    print_r($books);
    ?>
    <div>
        <h2>Liste Book : </h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ISBN</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Disponible(s)</th>
                    <th scope="col">Réservé(s)</th>
                    <th scope="col">Emprunté(s)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book) { ?>
                    <tr>
                        <th scope="row"><a href="./AfficherBook.php?id=<?php echo  $book["id"]; ?>"><?php echo  $book["id"]; ?></a></th>
                        <td><?php echo $book["numeroLivre"]; ?></td>
                        <td><?php echo $book["titre"]; ?></td>
                        <td><?php echo $book["auteur"]; ?></td>
                        <td><?php echo $book["disponibles"]; ?></td>
                        <td><?php echo $book["reserves"]; ?></td>
                        <td><?php echo $book["empruntes"]; ?></td>
                    </tr>
                <?php
                }

                ?>
            </tbody>
        </table>

</body>

</html>