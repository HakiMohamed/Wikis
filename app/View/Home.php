
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
                <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                </li>
                
              
                <li class="nav-item dropdown mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Categories 
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Web Development</a></li>
                        <li><a class="dropdown-item" href="#">Web Designing</a></li>
                        <li><a class="dropdown-item" href="#">Android Development</a></li>
                    </ul>
                </li>

                
                
            </ul>
            <div class="d-flex">
                
               
                <?php 
                if(!isset($_SESSION['first_name'])){
              echo"  <a class='btn btn-outline-light' href='?uri=login/index'>login</a>";
                }
                ?>
                <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
          data-bs-toggle="dropdown" aria-expanded="false">
          <img src="./asset/images/download.png" alt="" width="32" height="32" class="rounded-circle me-2 mx-1">
          <strong class="sidebarText"><?php if(isset($_SESSION['first_name'])){echo$_SESSION['first_name'];}?></strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
          <li><a class="dropdown-item" href="#">New Wikis...</a></li>
          <li><a class="dropdown-item" href="#">Settings</a></li>
          <li><a class="dropdown-item" href="#">Profile</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="?uri=logout/index">Sign out</a></li>
        </ul>
      </div>
            </div>
        </div>
    </div>
</nav>

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
              <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                <img src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" class="img-fluid" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title"><?= $wiki->title ?></h5>
                <p class="card-text">
                <?=$wiki->content?>
                </p>
                <p class="card-text">
                Auteur : <?=$wiki->first_name?>
                </p>
                <p class="card-text">
                date de creation : <?=$wiki->date_created?>
                </p>
                <a href="#!" class="btn btn-primary" data-mdb-ripple-init>Read</a>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          

          

        

          
          
      </section>

     
    </div>
  </main>
  <script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
</body>
</html>