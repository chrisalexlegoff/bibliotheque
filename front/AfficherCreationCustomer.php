<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Formulaire d'inscription</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="../css/login.css" rel="stylesheet">
  </head>
    <header> 
      <div class="image" style="background-image:url('../../img/pile-de-livres.jpg')">
    <header>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">Accueil
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Connexion</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Déconnexion</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <form class="form-signin2" method="POST" action="./faireCreationCustomer.php"></h1><br><br><br>
      <h1 class="jumbotron-heading">formulaire d'inscription</h1><br>
      </div>
      <div class="form-label-group">
        <input type="text" name="nom" id="inputName" class="form-control" placeholder="Name" required autofocus>
        <label for="inputName">Nom</label>
      </div>
      <div class="form-label-group">
        <input type="text" name="prenom" id="inputfirstName" class="form-control" placeholder="FirstName" required autofocus>
        <label for="inputfirstName">Prénom</label>
      </div>
	  <div class="form-label-group">
        <input type="text" name="password" id="inputPassword" class="form-control" placeholder="Password" required autofocus>
        <label for="inputPassword">Mot de passe</label>
      </div>
      <div class="form-label-group">
        <input type="text" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputEmail">Email</label>
      </div>
      <div class="form-group">
        <label for="statut:" class="text-info">Statut:</label><br>
            <select name="statut" id="statut" class="form-control">
                <option value="customer">Adhérent<option>    
                <option value="staff">Employé<option>           
            </select> <br/> 
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit"></button>
    </form>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
