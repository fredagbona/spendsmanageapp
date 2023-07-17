<?php
    if(!isset($_SESSION))
    {
        session_start();
    }

    if(isset($_SESSION['id'])){
        ?>
            <nav class="navbar  navbar-expand-lg " style="background-color: #FDD504;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">SpendsManage</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class=" collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../traitement.php?page=spends">Mes dépenses</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../traitement.php?page=newspend">Ajouter une dépense</a>
        </li>
        <li class="nav-item dropdown" >
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Profil
          </a>
          <ul class="dropdown-menu" style="background-color: #FDD504;">
            <li><a class="dropdown-item" href="../traitement.php?page=showuser">Mon profil</a></li>
            <li><a class="dropdown-item" href="../traitement.php?page=logout">Déconnexion</a></li>
          </ul>
        </li>
      
      </ul>
    </div>
  </div>
</nav>
        <?php
    }else{
        ?>
            <ul class="nav justify-content-center" style="background-color: #FDD504;">
                <li class="nav-item"><a class="nav-link text-dark" href="../traitement.php?page=register">S'inscrire</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="../traitement.php?page=login">Se connecter</a></li>
            </ul>
            <nav>
                <ul>
                   
                </ul>
            </nav>

        <?php
    }

?>