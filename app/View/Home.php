
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        
        <i class="bi bi-lightning-charge"></i>
        <span class="fs-4 sidebarText mt-2">
          <h3><strong>Wi<span class="text-primary">kis</span> </strong></h3>

        </span>        
      </a>        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mx-auto">
                
                
              
                

                
                
            </ul>
            <div class="d-flex">
                
            <?php if(!isset($_SESSION['id'])): ?>
               
             <a class='btn btn-outline-light' href='http://localhost/wikis/Login'>login</a>
             <?php else: ?>

                
                <div class='dropdown'>
        <a href='#' class='d-flex align-items-center text-white text-decoration-none dropdown-toggle'
          data-bs-toggle='dropdown' aria-expanded='false'>
          <img src="./asset/images/<?=$_SESSION['profilPic']?>" alt='' width='32' height='32' class='rounded-circle me-2 mx-1'>
          <strong class='sidebarText'><?=$_SESSION['first_name']." ".$_SESSION['last_name']?></strong>
        </a>
        <ul class='dropdown-menu dropdown-menu-dark text-small shadow'>
          <li><button type="button" class="btn text-white  mt-5 col-lg-12 " data-bs-toggle="modal" data-bs-target="#addWikiModal">
    <i class="fa-solid fa-square-plus"></i> Ajouter Wiki
    
  </button></li>
          <li><a class='dropdown-item' href='#'>Settings</a></li>
          <li><a class='dropdown-item' href='#'>Profile</a></li>
          <li>
            <hr class='dropdown-divider'>
          </li>
          <li><a class='dropdown-item' href='http://localhost/wikis/logout/index'>Sign out</a></li>
        </ul>
      </div>
      <?php endif; ?>



            </div>
        </div>
    </div>
</nav>
<header class="bg-secondary text-white text-center py-5 ">

            
    <h1 class="display-4">Bienvenue sur Wi<span class="text-light">kis</span></h1>
    <p class="lead">Découvrez et partagez des connaissances avec notre communauté</p>
    <button type="button" class="btn btn-primary  mt-5 col-lg-1 " data-bs-toggle="modal" data-bs-target="#addWikiModal">
    <i class="fa-solid fa-square-plus"></i>  
  
  </button>
  </header>

  <main class="my-5">






    
    <div class="container">
      <section class="text-center">
      <form  action="/You-event/public/Dashboard/SearchUser" method="POST" class="d-flex" role="search">
            <input  class="form-control me-2" type="search" name="keySearch" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success mx-1" type="submit">Search</button>
          </form>

          

        <h4 class="mb-5 my-5"><strong>Latest Wikis</strong></h4>


       

        


        <div class="row">
        <?php foreach ($wikis as $wiki): ?>
          <div class="col-lg-4 col-md-12 mb-4">
           

          <div class="card">
    <span class="badge  mt-2 ml-2 text-primary"><?= $wiki->category_name ?></span>
    <img src="<?=$wiki->imagewiki?>" class="card-img-top" alt="Wiki Image" >
    <div class="card-body">
        <h5 class="card-title"><?= $wiki->title ?></h5>
        <p class="text-truncate"><?= $wiki->content ?></p>
        <p class="card-text">
            <small class="text-muted">Auteur: <?= $wiki->first_name ?><?= " ".$wiki->last_name ?></small>
        </p>
        <p class="card-text">
            <small class="text-muted">Créé le <?= $wiki->date_created ?> | Modifié le <?= $wiki->date_modified ?></small>
        </p>
    </div>
</div>


          </div>
        
          <?php endforeach; ?>


          

<div class="modal fade" id="addWikiModal" tabindex="-1" aria-labelledby="addWikiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <?php if(isset($_SESSION['id'])): ?>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='addWikiModalLabel'>Ajouter Noveau Wiki </h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <h6 class='modal-title text-center text-danger' id='addWikiModalLabel'>Votre wiki ne sera publié qu'après que l'administrateur l'ait accepté </h6>

                <div class='modal-body'>
                    <form action='?uri=home/index' class='text-start' method='post' enctype='multipart/form-data'>
                        <div class='mb-3'>
                            <label for='title' class='form-label text-label'>Titre</label>
                            <input type='text' id='title' name='title' class='form-control' required>
                        </div>
                        <div class='mb-3'>
                            <label for='content' class='form-label'>Contenu</label>
                            <textarea id='content' name='content' class='form-control' rows='6' required></textarea>
                        </div>
                        <div class='mb-3'>
                            <label for='image' class='form-label'>Image</label>
                            <input type='file' id='image' name='image' class='form-control' accept='image/*'>
                        </div>
                        <input type='hidden' value="<?= $_SESSION['id'] ?>" name='authorId' class='form-control' required>
                        <div class='mb-3'>
                            <label for='categoryId' class='form-label'>Categorie</label>
                            <select id='categoryId' name='categoryId' class='form-select' required>
                                <?php foreach($Categories as $category): ?>
                                    <option value='<?= $category->category_id ?>'><?= $category->category_name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class='mb-3'>
                        <hr>
                            <label class='form-label'>Ajoute des Tags pour votre Wiki</label>
                            

                            <div class='d-flex flex-wrap bg-secondary'>
                                <?php
                                
                                foreach ($tags as $tag) : ?>
                                    <div class='form-check me-3 px-5'>
                                            <input id="<?=$tag->tag_id?>" class='form-check-input' type='checkbox' name='tags[]' value='<?=$tag->tag_id?>'>
                                            <label for="<?=$tag->tag_id?>" class='form-check-label text-light'><?=$tag->tag_name?></label>
                                          </div>
                                          <?php endforeach; ?>
                            </div>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Fermer</button>
                            <button type='submit' class='btn btn-primary'>Publier</button>
                        </div>
                    </form>
                </div>
            </div>
        <?php else: ?>
            <div class='modal-dialog'>
                <div class='modal-content'> 
                    <div class='modal-header'>
                        <h5 class='modal-title ' id='addWikiModalLabel'>Pour ajouter des wikis, veuillez vous connecter <a class='btn btn-outline-primary ' href='http://localhost/wikis/Login'>Login</a>   <a class='btn btn-outline-primary ' href='http://localhost/wikis/Register'>Register</a>  </h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>


</div>
</div>



          

          

        

          
          
      </section>

     
    </div>
  </main>

  <footer class='bg-dark text-white text-center py-3'>
    <p>&copy; 2024 Wi<span class='text-primary'>kis</span>. Tous droits réservés.</p>
  </footer>















  <script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>