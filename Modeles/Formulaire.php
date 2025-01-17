<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'authentification</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link type="text/css" rel="stylesheet" href="../css/login.css">
</head>

<body>
    <div class="header" id="myHeader" style="margin-bottom: -565px;">
        <img style="height: 280px; padding-top: 0px; margin-right: 0px; border-top-width: 0px;" alt="" src="../img/pile-de-livres.jpg">
    </div>
    <img style="height: 280px; padding-top: 0px; margin-right: 0px; border-top-width: 0px;" alt="" src="../img/pile-de-livres.jpg">
    </div>

    <div id="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="./loginScript.php" method="post">
                            <h3 class="text text-info">Connexion</h3><br><br>
                            <div class="form-group">
                                <label for="identifiant" class="text-info">Identifiant:</label><br>
                                <input type="text" name="identifiant" id="identifiant" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Mot de passe:</label><br>
                                <input type="text" name="password" id="password" class="form-control">
                            </div>
                            <!-- <div class="form-group">
                                <label for="statut" class="text-info">Statut:</label><br>
                                <input type="text" name="statut" id="statut" class="form-control">
                                
                            </div> -->
                            <div class="form-group">
                                <label for="statut:" class="text-info"> Statut:</label><br>
                                <select name="statut" id="statut" class="form-control">
                                    <option value="customer">Adhérent
                                    <option>
                                    <option value="staff">Employé
                                    <option>
                                </select> <br /> <br /> <br />
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Envoyer">
                            </div>
                            <!-- <div id="register-link" class="text-right">
                                <a href="#" class="text-info">Inscription d'un nouvel utilisateur</a>
                            </div> -->

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>