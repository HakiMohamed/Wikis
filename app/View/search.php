<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Results</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href=" ../../public/asset/bootstrap-icons-1.11.1/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

 
 <style>
    /* Ajout de quelques styles pour le tableau de bord */
    body {
      font-family: Arial, sans-serif;
      background-color: #222; /* Couleur de fond sombre */
      color: #fff; /* Couleur du texte */
    }
    .sidebar {
      height: 100vh;
    }
    .sidebar ul {
      list-style: none;
      padding: 0;
    }
    .sidebar li a {
      text-decoration: none;
      color: #ccc; /* Couleur du lien */
    }
    .sidebar li a.active {
      font-weight: bold;
      color: #007bff;
    }
    .main-content {
      padding-top: 20px;
    }
    .search-results {
      padding: 20px;
      margin-top: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #333; 
      color: #fff;
    }
  </style>
</head>
<body>

  <div class="container-fluid">
    <div class="row">
      <main class="col-md-10 col-lg-10  px-md-4 ">
        <h1 class="mt-4">Search Results</h1>
        <div class="search-results">
          <h3>Résultats de la recherche :</h3>
          <div id="searchResults">
            
  <div class="row">
  <?php foreach ($userfound as $user): ?>
    
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
      <div class="card bg-dark">
        <img src="../../public/asset/images/download.png" class=" card-img-top rounded-circle img-thumbnail mx-4 mt-2" alt="Image Utilisateur 1" style="width: 100px; height: 100px;">
        <div class="card-body">
          <h5 class="card-title text-white"><?= $user->first_name." ".$user->last_name; ?></h5>
  <hr>
         

          <table class="table table-dark">
  <thead>
    <tr>
     
      <th>Email</th>
      <th>Role</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      
      <td><?= $user->email; ?></td>
      <td><?= $user->role_name; ?></td>
      
    </tr>
   
  </tbody>
</table>



          <div class="d-flex">
          <form class="m-1" action="You-event/public/Dashboard/supprimerUtilisateur<?= $user->id; ?>" method="POST">
                <input type="hidden" name="user_id" value="<?= $user->id; ?>">
                <button type="submit" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
            </form>
            <form class="m-1" action="Your-event/public/Dashboard/modifierUtilisateur" method="POST">
        <input type="hidden" name="user_id" value="<?= $user->id; ?>">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $user->id; ?>">
        <i class="bi bi-pencil-fill"></i>
</button>      </form>
            </div>
          
        </div>
      </div>
    </div>

    <div class="modal fade " id="exampleModal<?= $user->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel<?= $user->id; ?>">Modifier Le role de : <?= $user->first_name." ".$user->last_name; ?> </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="mb-3">
            <label for="recipient-name<?= $user->id; ?>" class="col-form-label">Role:</label>
            <input type="text" class="form-control" value="<?= $user->role_name; ?>" id="recipient-name<?= $user->id; ?>" disabled>
            <form action="/You-event/public/Dashboard/updateUser" method="POST">
                    <input type="hidden" name="user_id" value="<?= $user->id?>">
                    <select class="btn btn-success btn-sm mt-1" name="new_role_id" >
                       <option disabled selected hidden >change role</option>
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                        <option value="3">Manager</option>
                        <option value="4">Guest</option>
                        <option value="5">Moderator</option>
                    </select>
                    <button  class="btn btn-primary btn-sm mt-1" type="submit">Update Role</button>
                </form>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>


          </div>
        </div>
      </main>
    </div>
  </div>

</body>
</html>
